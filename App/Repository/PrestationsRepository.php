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
                             $service = null;
                            

                   } else {
                    
                   
                    $titre = $_POST['titre']  ;
                    $description = $_POST['description'] ;
                    $tarif = $_POST['tarif']  ;
                    $service = $_POST['services']  ; 
                    $sanitized_service = htmlspecialchars($service, ENT_QUOTES | ENT_HTML5, 'UTF-8');   
                    $sanitized_titre = htmlspecialchars($titre, ENT_QUOTES | ENT_HTML5, 'UTF-8');   
                    $sanitized_description = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    $sanitized_tarif = htmlspecialchars($tarif, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                       
            
                     $stmt = $pdo->prepare('INSERT INTO tarifs (titre, description, tarif, service_id ) VALUES (:titre, :description, :tarif, :service_id )');
                     $stmt->bindParam(':titre',  $sanitized_titre, $pdo::PARAM_STR);
                     $stmt->bindParam(':description', $sanitized_description , $pdo::PARAM_STR);
                     $stmt->bindParam(':tarif', $sanitized_tarif , $pdo::PARAM_INT);
                     $stmt->bindParam(':service_id', $sanitized_service , $pdo::PARAM_INT);
                
                   
                if($stmt->execute()){

                    echo 'enregistrement reussi';
                    
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

                $stmt = $pdo->prepare( "SELECT  t.id as id, /*s.id,*/ t.description as description, t.titre as titre, t.tarif as tarif from tarifs t
                                        /*INNER JOIN services s  on s.id = t.service_id*/ where t.id = :id" );
                 $stmt->bindParam(':id',  $id, $pdo::PARAM_STR);

               
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

        public function servicesList($id){

        try{
           

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();

                $stmt = $pdo->prepare( "SELECT t.id as presta_id, t.titre, s.id from services s
                                        INNER JOIN tarifs t  on s.id = t.service_id where s.id = :id" );
                 $stmt->bindParam(':id',  $id, $pdo::PARAM_STR);


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

         public function modelsList($id){

        try{
           

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();

                $stmt = $pdo->prepare( "SELECT t.id as presta_id, t.titre, p.name as name, p.prix as prix, p.libele as libele from tarifs t
                                        INNER JOIN pics_presta p  on p.presta_id = t.id where t.id = :id" );
                 $stmt->bindParam(':id',  $id, $pdo::PARAM_STR);


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
                    
                   
                    $titre = $_POST['titre'] ;  
                    $description = $_POST['description'] ;  
                    $tarif = $_POST['tarif']  ; 
                    $services = $_POST['services'] ; 
                    $sanitized_titre = htmlspecialchars($titre, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    $sanitized_description = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    $sanitized_tarif = htmlspecialchars($tarif, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    $sanitized_services = htmlspecialchars($services, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                       
            
                    $stmt = $pdo->prepare('UPDATE tarifs set titre = :titre, description = :description, tarif = :tarif, service_id = :service_id where id = :id');

                    $stmt->bindParam(':id', $id, $pdo::PARAM_INT);
                    $stmt->bindParam(':titre', $sanitized_titre , $pdo::PARAM_STR);
                    $stmt->bindParam(':description', $sanitized_description , $pdo::PARAM_STR);
                    $stmt->bindParam(':tarif', $sanitized_tarif , $pdo::PARAM_STR);
                    $stmt->bindParam(':service_id', $sanitized_services , $pdo::PARAM_INT);
                   
                
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

 public function images(){

        try {
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
        
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (empty($_FILES['images']['tmp_name'])) {
                    
                    echo 'Veuillez sélectionner un fichier.';
                } else {
                    $file_basename = pathinfo($_FILES['images']['name'], PATHINFO_FILENAME);
                    $file_ext = pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);
        
                    $new_name = $file_basename . '_' . date("Ymd_His") . '.' . $file_ext;
                        
                     $name = $_POST['name']  ;
                    $sanitized_name = htmlspecialchars($name, ENT_QUOTES | ENT_HTML5, 'UTF-8');   

                    $images = $pdo->prepare('INSERT INTO picspresta (name, libele, presta_id) VALUES (:name, :libele, :presta_id)');
                    $images->bindParam(':name', $new_name, $pdo::PARAM_STR);
                      $images->bindParam(':libele', $sanitized_name, $pdo::PARAM_STR);
                    $images->bindParam(':presta_id', $_POST['habitat_id'], $pdo::PARAM_INT);
        
                    if ($images->execute()) {
                        $target_dir = "../uploads/";
                        $target_path = $target_dir . $new_name;
        
                        if (move_uploaded_file($_FILES['images']['tmp_name'], $target_path)) {
                            echo 'Téléchargement réussi : ' . htmlspecialchars($new_name);
                        } else {
                            echo 'Erreur lors du déplacement du fichier.';
                        }
                    } else {
                        echo 'Erreur lors de l\'insertion dans la base de données.';
                    }
                }
            }
        } catch (\Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }

    }

} 