<?php
namespace App\Repository;

use App\Bdd\MySql;

//require_once './App/Bdd/MySql.php';
//require_once './App/Repository/ServicesRepository.php';
//use App\Repository\ServicesRepository;
//use App\Bdd\MySql;

class UsersRepository
{


 public function addRegister( ){

                try{
                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();

           
                $statement = $pdo->prepare('INSERT INTO users(username, email, password) VALUES (:username, :email, :password)');
                $statement->bindParam(':username',  $sanitized_username, $pdo::PARAM_STR);
                 $statement->bindParam(':email',  $sanitized_email, $pdo::PARAM_STR);

            if(!isset($_POST['email'])) {

               
                
            } else {
           $username = $_POST['username'];
            $sanitized_username = htmlspecialchars($username, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $email = $_POST['email'];
            $sanitized_email = htmlspecialchars($email, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $password = $_POST['password'];
            $sanitized_password = htmlspecialchars($password, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                
            // Hash du mot de passe en utilisant BCRYPT //
            $statement->bindParam(':password', password_hash( $sanitized_password, PASSWORD_BCRYPT));

            if ($statement->execute()) {

                echo 'L\'utilisateur a bien été créé';

              
            } else {

                  echo 'creation impossible';//throw new Exception('Impossible de créer l\'utilisateur') ;
            }
        }
            } catch(\Exception $e){
                echo  $e->getMessage();
            }
    }
       

     public function login(){

        //session_start();
            try {
                    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
                        $mysql = Mysql::getInstance();
                        $pdo = $mysql->getPDO();

                        $username = $_POST['username'];
                        $sanitized_username = htmlspecialchars($username, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                        $email = $_POST['email'];
                        $sanitized_email = htmlspecialchars($email, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                        $password = $_POST['password'];
                        $sanitized_password = htmlspecialchars($password, ENT_QUOTES | ENT_HTML5, 'UTF-8');

                        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
                         $stmt->bindParam(':email', $sanitized_email, $pdo::PARAM_STR);
                        
                         
                        if ($stmt->execute()) {
                            $user = $stmt->fetch($pdo::FETCH_ASSOC);
                           

                            if ($user && password_verify($sanitized_password, $user['password'])) {
                                echo 'Connexion réussie'.'<br>';
                                    
                               
                                // Redirection ou autre action après la connexion réussie
                                header('Location: /?services' ); // Exemple de redirection vers le tableau de bord
                            } else {
                                echo 'Identifiants incorrects';
                            }
                        } else {
                            echo 'Erreur lors de l\'exécution de la requête';
                        }
                    } else {
                        echo 'Veuillez remplir tous les champs requis';
                    }



            } catch(\Exception $e){
                echo  $e->getMessage();
            }
        }

          

   
                               

     

   
    

 public function read(){

        try{
           

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();

                $stmt = $pdo->prepare( "SELECT * FROM users" );
               
                if($stmt->execute()){

                    $stmt->setFetchMode($pdo::FETCH_ASSOC);
                    
                   return $stmt->fetchAll();
                  
                } else {
                    echo 'erreur ';
                }
              
               
        } catch(\Exception $e){
            echo 'erreur de lecture'. $e->getMessage();
           

        }
       
        }

        public function update($id){

        try{
           

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();

               if(empty($_POST['description'])){
                    
                            $description = null;  

                   } else {
                    
                      $titre = $_POST['titre'] ;  
                      $description = $_POST['description'] ;
                    $sanitized_titre = htmlspecialchars($titre, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    $sanitized_description = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    
            
                     $stmt = $pdo->prepare('UPDATE services set description = :description, titre = :titre where id = :id ');
                     $stmt->bindParam(':id', $id, $pdo::PARAM_INT);
                     $stmt->bindParam(':titre', $sanitized_titre , $pdo::PARAM_STR);
                      $stmt->bindParam(':description', $sanitized_description , $pdo::PARAM_STR);
                    
                     
                     $stmt->fetch($pdo::FETCH_ASSOC);
        
               
                if($stmt->execute()){

                    echo 'enregistrement effectuée ';
                    
                  
                } else {
                    echo 'erreur ';
                }
            }
               
        } catch(\Exception $e){
            echo 'erreur de lecture'. $e->getMessage();
           

        }
       
    }

public function delete($id){

        try{
           

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();

              
                   $id = $_GET['id'] ?? null;
            
                     $stmt = $pdo->prepare('DELETE FROM users where id = :id');
               $stmt->bindParam(':id', $id, $pdo::PARAM_INT);
                
                
                $stmt->fetch($pdo::FETCH_ASSOC);
        
               
                if($stmt->execute()){

                    echo 'suppression effectuée ';
                    header('Location: ?controller=users&action=read');
                    
                  
                } else {
                    echo 'erreur ';
                }
            
        
               
        } catch(\Exception $e){
            echo 'erreur de lecture'. $e->getMessage();
           

        }
       
}

} 