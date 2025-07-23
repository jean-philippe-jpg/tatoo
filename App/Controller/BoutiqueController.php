<?php
namespace App\Controller;

use App\Repository\BoutiqueRepository;
use App\Repository\CategoriesRepository;
use App\Repository\PrestationsRepository;

class BoutiqueController extends Controller
{
    public function route(): void
    {
        if(isset($_GET['action'])) {

            switch($_GET['action']) {

                case 'create':
                    $this->create();
                    break;

                
                case 'read':
                    $this->read();
                    break;

                case 'update':
                    $this->update();
                    break;

                case 'delete':
                    $this->delete();
                    break;


                case 'show':
                    $this->show();
                    break;

                 case 'categories':
                    $this->categories();
                    break;
                

                 default:
                    throw new \Exception('Action non reconnue');
                }
        } 
}



protected function create(): void
 {
        $servicesRepository = new BoutiqueRepository();
        $servicesRepository->create();
         $servicesRepository = new CategoriesRepository();
        $presta = $servicesRepository->read();
        
        $this->render('/Admin/Boutique/create', [
                'categorie' => $presta
        ] );
        
    }

    

protected function categories(): void
 {

    $id = $_GET['id'] ?? null;
        $boutiqueRepository = new BoutiqueRepository();
        $filtreproduits = $boutiqueRepository->filtreArticles($id);
    
        $this->render('/filtre_prod', [
                //'categorie' => $categories,
                'article' => $filtreproduits,
        ] );
        
    }

 protected function read(): void
 {
        $boutiqueRepository = new BoutiqueRepository();
        $boutique = $boutiqueRepository->read();
        $this->render('/Admin/Boutique/read', [
            'boutique' => $boutique
        ]);
    }
    protected function update()
 {
        $id = $_GET['id'];
        $servicesRepository = new BoutiqueRepository();
        $findoneby = $servicesRepository->findOneBy($id);
        $servicesRepository->update($id);

         $servicesRepository = new CategoriesRepository();
         $categorie = $servicesRepository->read();

        $this->render('/Admin/Boutique/create', [
            'categorie' => $categorie,
            'findone' => $findoneby
        ] );
         
    }

    protected function delete()
 {
        $id = $_GET['id'];
        $servicesRepository = new BoutiqueRepository();
        $servicesRepository->delete($id);
        
        $this->render('/Admin/admin' );
    }

        protected function show() : void 

 {      
            $id = $_GET['id'] ?? null;
        $servicesRepository = new BoutiqueRepository();
         $findoneby = $servicesRepository->findOneBy($id);

        $this->render('/Admin/Boutique/show', [

            'findone' => $findoneby

        ] );
 }

 
}