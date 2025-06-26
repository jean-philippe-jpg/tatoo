<?php
namespace App\Repository;

use App\Bdd\MySql;

class PrestationsRepository
{


public function create(){

        try{
           

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();

               if(empty($_POST['titre'])){
                    
                            $titre = null;
                            $description = null;
                            $tarif = null;
                            

                   } else {
                    
                   
                    $titre = $_POST['titre']  ;
                    $description = $_POST['description'] ;
                    $tarif = $_POST['tarif']  ;

                    $sanitized_titre = htmlspecialchars($titre, ENT_QUOTES | ENT_HTML5, 'UTF-8');   
                    $sanitized_description = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    $sanitized_tarif = htmlspecialchars($tarif, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                       
            
                     $stmt = $pdo->prepare('INSERT INTO tarifs (titre, description, tarif ) VALUES (:titre, :description, :tarif )');
                $stmt->bindParam(':titre',  $sanitized_titre, $pdo::PARAM_STR);
                $stmt->bindParam(':description', $sanitized_description , $pdo::PARAM_STR);
                $stmt->bindParam(':tarif', $sanitized_tarif , $pdo::PARAM_INT);
                
        
               
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

                $stmt = $pdo->prepare( "SELECT * FROM tarifs where id = :id" );
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

                $stmt = $pdo->prepare( "SELECT * FROM tarifs" );
               
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
                             $tarif = null;   

                   } else {
                    
                   
                   
                    $description = $_POST['description'] ;  
                    $tarif = $_POST['tarif'] ; 
                    $sanitized_description = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    $sanitized_tarif = htmlspecialchars($tarif, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                       
            
                    $stmt = $pdo->prepare('UPDATE tarifs set description = :description, tarif = :tarif where id = :id');
                    $stmt->bindParam(':id', $id, $pdo::PARAM_INT);

                    $stmt->bindParam(':description', $sanitized_description , $pdo::PARAM_STR);
                    $stmt->bindParam(':tarif', $sanitized_tarif , $pdo::PARAM_STR);
                
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
            
                     $stmt = $pdo->prepare('DELETE FROM tarifs where id = :id');
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