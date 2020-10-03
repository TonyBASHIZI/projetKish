<?php 
 $p = \App\App::getInstance()->getTable('user')->all();
  if(isset($_POST['submit']))
  {
  
       $add = \App\App::getInstance()->getTable('user')
       ->save([
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'niveau' => $_POST['choix']
                 
            
       ]);

       if($add){
          
        header("location:index.php?p=user");
       }

     


  }



?>

                <div class="panel">
                    <div class="records--header">
                        <div class="title fa-shopping-bag">
                            <h3 class="h3">Les utilisateurs </h3>
                            
                        </div>
                        <div class="actions">
                            <form action="" method ="POST" class="search flex-wrap flex-md-nowrap"> 
                               <input type="text" name="email" value="" class="form-control"
                                    placeholder="Email" required> 
                                <input type="text" name="password" class="form-control"
                                    placeholder="Password" required> 
                                    <select name="choix" id="choix" class="form-control">
                                    <option value=""  selected>Selectionner niveau</option>
                                    <option  value="Super Admin" >Super Admin</option>
                                    <option  value="Admin simple" >Admin simple</option>
                                    
                                </select> 

                                
                                <button  type="submit" name="submit" class="addProduct btn btn-lg btn-rounded btn-warning">Ajouter</button></a>
                            </form> 

                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="records--list" data-title="Les administrateurs">
                        <table id="recordsListView">
                            <thead>
                                <tr>
                                   
                                   
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Niveau</th>
                                    
                                    <th class="not-sortable">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($p as $v): ?>
                                <tr>
                                    <td><a href="#" class="btn-link"><?=$v->id ?></td>
                                    <td><a href="#" class="btn-link"><?=$v->email ?></td>
                                    <td><a href="#" class="btn-link"><?=$v->password ?></td>
                                    <td><a href="#" class="btn-link"><?=$v->niveau ?></td>
                                    <td><a href="#" class="btn-link">::</td>
                                </tr>
                                
                               <?php endforeach ?> 
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>