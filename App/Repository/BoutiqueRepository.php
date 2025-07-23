<?php
namespace App\Repository;

use App\Bdd\MySql;
use App\Entity\Boutique;

//require_once './App/Bdd/MySql.php';
//require_once './App/Repository/ServicesRepository.php';
//use App\Repository\ServicesRepository;
//use App\Bdd\MySql;

class BoutiqueRepository
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
                        
                     $titre = $_POST['titre'] ;
                     $description = $_POST['description'] ;
                     $prix = $_POST['prix'] ;
                     $presta_id = $_POST['categorie_id'];
                    $sanitized_titre = htmlspecialchars($titre, ENT_QUOTES | ENT_HTML5, 'UTF-8');   
                    $sanitized_description = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');  
                    $sanitized_prix = htmlspecialchars($prix, ENT_QUOTES | ENT_HTML5, 'UTF-8');      
                    $sanitized_presta = htmlspecialchars($presta_id, ENT_QUOTES | ENT_HTML5, 'UTF-8'); 

                    $images = $pdo->prepare('INSERT INTO boutique (titre, description, prix, libele,categorie_id) VALUES (:titre, :description, :prix, :libele, :categorie_id)');
                    $images->bindParam(':titre',$sanitized_titre, $pdo::PARAM_STR);
                    $images->bindParam(':description', $sanitized_description, $pdo::PARAM_INT);
                    $images->bindParam(':prix',  $sanitized_prix, $pdo::PARAM_STR);
                     $images->bindParam(':libele',  $new_name, $pdo::PARAM_STR);
                    $images->bindParam(':categorie_id', $sanitized_presta, $pdo::PARAM_INT);
       
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

                $stmt = $pdo->prepare( "SELECT * FROM boutique where id = :id" );
                $stmt->bindParam(':id', $id, $pdo::PARAM_INT);

                if($stmt->execute()){

                    $stmt->setFetchMode($pdo::FETCH_CLASS, Boutique::class);
                    
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

                $stmt = $pdo->prepare( "SELECT * FROM boutique" );
                 //$stmt = $pdo->prepare( "SELECT  b.titre as titre, b.id as id, b.description as description, b.prix as prix, b.libele as libele, ct.titre as titre_ct FROM boutique b
                //INNER JOIN categorie ct ON ct.id = b.categorie_id " );
               
                if($stmt->execute()){

                    $stmt->setFetchMode($pdo::FETCH_CLASS, Boutique::class);

                   return $stmt->fetchAll();
                  
                } else {
                    echo 'erreur ';
                }
              
               
        } catch(\Exception $e){
            echo 'erreur de lecture'. $e->getMessage();
           

        }
       
        }
   
        public function filtreArticles($id){

        try{
           

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();

                $stmt = $pdo->prepare( "SELECT b.id as id, b.titre as titre, b.description as description, b.prix as prix, b.libele as libele, ct.titre as titre_ct FROM boutique b
                INNER JOIN categorie ct ON b.categorie_id=ct.id where ct.id = :id" );
                $stmt->bindParam(':id', $id, $pdo::PARAM_INT);
               
                if($stmt->execute()){

                    $stmt->setFetchMode($pdo::FETCH_CLASS, Boutique::class);
                    
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
                       $prix = $_POST['prix'] ;
                      $prestation = $_POST['categorie_id'] ;

                    $sanitized_titre = htmlspecialchars($titre, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    $sanitized_description = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    $sanitized_prix = htmlspecialchars($prix, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                     $sanitized_prestations = htmlspecialchars($prestation, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    
            
                     $stmt = $pdo->prepare('UPDATE boutique set description = :description, titre = :titre, categorie_id = :categorie_id, prix = :prix where id = :id ');
                     $stmt->bindParam(':id', $id, $pdo::PARAM_INT);
                     $stmt->bindParam(':titre', $sanitized_titre , $pdo::PARAM_STR);
                      $stmt->bindParam(':description', $sanitized_description , $pdo::PARAM_STR);
                         $stmt->bindParam(':prix', $sanitized_prix , $pdo::PARAM_INT);
                      $stmt->bindParam(':categorie_id', $sanitized_prestations , $pdo::PARAM_INT);
                    
                     
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
            
                     $stmt = $pdo->prepare('DELETE FROM boutique where id = :id');
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