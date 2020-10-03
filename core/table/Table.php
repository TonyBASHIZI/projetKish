<?php

namespace Core\Table;

use Core\Database\Database;


class Table
{
    protected $_dbinstance;

    protected $table;

    public function __construct(Database $database)
    {
        $this->_dbinstance = $database;
    }

    public function extract($key, $value)
    {
        $records = $this->all();
         $return = [];
        foreach ($records as $v)
        {
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

    public function all()
    {
        return $this->query("SELECT * FROM " . $this->table);
    }
    public function alert()
     {
         return $this->query('SELECT * FROM'. $this->table .' WHERE qte < 20 ');
     }

    public function findById($id, $champ = 'id')
    {
       return $this->query("SELECT * FROM ". $this->table ." WHERE ". $champ ." = ? ", [$id], get_called_class(), true);
    }

    public function delete($id)
    {
        return $this->query(" DELETE FROM " . $this->table ." WHERE id = ?", $id, false);
    }

    public function update($id, $fields, $champ = 'id')
    {
       $sql_parts = [];
       $attributes = [];
       foreach ($fields as $key => $v)
       {
           $sql_parts[] = "$key = ?";
           $attributes[] = $v;
       }
       $sql_part = implode(',',$sql_parts);
       $attributes[] = $id;
       return $this->query("UPDATE ". $this->table ." SET $sql_part WHERE $champ = ?", $attributes, true);
    }

    public function save($fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $key => $v)
        {
            $sql_parts[] = "$key = ?";
            $attributes[] = $v;
        }
        $sql_part = implode(',',$sql_parts);

        return $this->query("INSERT INTO ". $this->table ." SET $sql_part ", $attributes , true);
    }

    public function query($statement, $attributes = null, $one = false)
    {
        if($attributes)
        {
            return $this->_dbinstance->prepare(
                $statement, 
                $attributes,
                str_replace('Table', 'Entity', get_class($this)),
                $one);
        }else {
            return $this->_dbinstance->query(
                $statement,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }
    }
}
