<?php
namespace App\Repository;

use App\Bdd\MySql;


class PicsPrestaRepository
{


 public function create(){

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
                        
                     $name = $_POST['name'] ;
                     $prix = $_POST['prix'] ;
                     $presta_id = $_POST['presta_id'];
                    $sanitized_name = htmlspecialchars($name, ENT_QUOTES | ENT_HTML5, 'UTF-8');   
                    $sanitized_prix = htmlspecialchars($prix, ENT_QUOTES | ENT_HTML5, 'UTF-8');  
                    $sanitized_presta = htmlspecialchars($presta_id, ENT_QUOTES | ENT_HTML5, 'UTF-8');   
 

                    $images = $pdo->prepare('INSERT INTO pics_presta (name, libele, prix, presta_id) VALUES (:name, :libele, :prix, :presta_id)');
                    $images->bindParam(':name',$sanitized_name, $pdo::PARAM_STR);
                    $images->bindParam(':prix', $sanitized_prix, $pdo::PARAM_INT);
                    $images->bindParam(':libele',  $new_name, $pdo::PARAM_STR);
                    $images->bindParam(':presta_id', $sanitized_presta, $pdo::PARAM_INT);
       
                    if ($images->execute()) {
                        $target_dir = "./templates/Admin/PicsPresta/Uploads/";
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

public function findOneBy( $id){

        try{
           
                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();

                $stmt = $pdo->prepare( "SELECT * FROM pics_presta where id = :id" );
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

                $stmt = $pdo->prepare( "SELECT * FROM pics_presta" );
               
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

               if(empty($_POST['name'])){
                    
                            $name  = null;  

                   } else {
                    
                      $name = $_POST['name'];  
                      $prix = $_POST['prix'];
                      $presta_id = $_POST['presta_id'];
        
                    $sanitized_name = htmlspecialchars($name, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    $sanitized_prix = htmlspecialchars($prix, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    $sanitized_presta_id = htmlspecialchars($presta_id, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    
            
                     $stmt = $pdo->prepare('UPDATE pics_presta set name = :name, prix = :prix, presta_id = :presta_id where id = :id ');
                     $stmt->bindParam(':id', $id, $pdo::PARAM_INT);
                     $stmt->bindParam(':name', $sanitized_name , $pdo::PARAM_STR);
                      $stmt->bindParam(':prix', $sanitized_prix , $pdo::PARAM_STR);
                      $stmt->bindParam(':presta_id', $sanitized_presta_id , $pdo::PARAM_STR);
                    
                     
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
            
                     $stmt = $pdo->prepare('DELETE FROM pics_presta where id = :id');
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