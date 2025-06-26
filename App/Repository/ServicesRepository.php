<?php
namespace App\Repository;

use App\Bdd\MySql;

//require_once './App/Bdd/MySql.php';
//require_once './App/Repository/ServicesRepository.php';
//use App\Repository\ServicesRepository;
//use App\Bdd\MySql;

class ServicesRepository
{


public function create(){

        try{
           

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();

               if(empty($_POST['titre'])){
                    
                            $titre = null;
                            $description = null;
                            

                   } else {
                    
                   
                    $titre = $_POST['titre']  ;
                    $description = $_POST['description']  ;
                    $sanitized_titre = htmlspecialchars($titre, ENT_QUOTES | ENT_HTML5, 'UTF-8');   
                    $sanitized_description = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                       
            
                     $stmt = $pdo->prepare('INSERT INTO services (titre, description ) VALUES (:titre, :description )');
                $stmt->bindParam(':titre',  $sanitized_titre, $pdo::PARAM_STR);
                $stmt->bindParam(':description', $sanitized_description , $pdo::PARAM_STR);
                
        
               
                if($stmt->execute()){

                    echo 'enregistrement reussi';
                    //$stmt->setFetchMode($pdo::FETCH_ASSOC);
                    
                   //return $stmt->fetchAll();
                  
                } else {
                    echo 'erreur ';
                }
            }
               
        } catch(\Exception $e){
            echo 'erreur de lecture'. $e->getMessage();
           

        }
       
    }

public function findOneBy(int $id){

        try{
           

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();

                $stmt = $pdo->prepare( "SELECT id, titre, description FROM services s where s.id = :id");
                $stmt->bindParam(':id', $id, $pdo::PARAM_INT);

                if($stmt->execute()){

                    $stmt->setFetchMode($pdo::FETCH_ASSOC);
                    
                   return $stmt->fetch();
                  
                } else {
                    echo 'erreur ';
                }
              
               
        } catch(\Exception $e){
            echo 'erreur de lecture'. $e->getMessage();
           

        }
       
        }


 public function read(){

        try{
           

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();

                $stmt = $pdo->prepare( "SELECT * FROM services" );
               
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

 
 }