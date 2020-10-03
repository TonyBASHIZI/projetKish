<?php
namespace App\Table;

use Core\Database\Database;
use Core\Table\Table;
use Illuminate\Support\Facades\DB;


class ProvisionTable extends Table
{
     protected $table = ' t_approvision';

     public function __construct(Database $database)
     {
         parent::__construct($database);
     }
     public function alert()
     {
         return $this->query('SELECT * FROM'. $this->table .' WHERE qte < 20 ');
     }

    public function all()
     {
         return $this->query('SELECT * FROM '. $this->table .' order by  id desc limit 7');
     }
     public function allnext()
     {
        return $this->query('SELECT * FROM '. $this->table .' order by id asc ');

     	return $n;
     }
}