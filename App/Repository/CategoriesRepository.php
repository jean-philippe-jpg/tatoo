<?php
namespace App\Repository;

use App\Bdd\MySql;
use App\Entity\Categories;

class CategoriesRepository
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
                       
            
                     $stmt = $pdo->prepare('INSERT INTO categorie (titre, description ) VALUES (:titre, :description )');
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

public function findOneBy( $id){

        try{
           
                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();

                $stmt = $pdo->prepare( "SELECT * FROM categorie where id = :id" );
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

                $stmt = $pdo->prepare( "SELECT * FROM categorie" );
               
                if($stmt->execute()){

                    $stmt->setFetchMode($pdo::FETCH_CLASS, Categories::class );
                    
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
                    
            
                     $stmt = $pdo->prepare('UPDATE categorie set description = :description, titre = :titre where id = :id ');
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
            
                     $stmt = $pdo->prepare('DELETE FROM categorie where id = :id');
               $stmt->bindParam(':id', $id, $pdo::PARAM_INT);
                
                
                $stmt->fetch($pdo::FETCH_ASSOC);
        
               
                if($stmt->execute()){

                    echo 'suppression effectuée ';
                    
                  
                } else {
                    echo 'erreur ';
                }
            
        
               
        } catch(\Exception $e){
            echo 'erreur de lecture'. $e->getMessage();
           

        }
       
}

} 