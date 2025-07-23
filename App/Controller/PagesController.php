<?php
namespace App\Controller;

use App\Repository\BoutiqueRepository;
use App\Repository\CategoriesRepository;
use App\Repository\ServicesRepository;
use App\Repository\CreationsRepository;
use App\Repository\PrestationsRepository;
use App\Repository\UsersRepository;

class PagesController extends Controller
{


    public function route(): void
    {
        try {

            if(isset($_GET['action'])){


                switch($_GET['action']){

                      
                    case 'home':
                        $this->home();
                        break;
                    
                default:
                    throw new \Exception('Action non reconnue');
            }
               } else {

            echo 'erreur de controller';
        }
            
}catch(\Exception $e){
        echo $e->getMessage();
        $this->render('errors/errors', [
            'errors' => $e->getMessage()
        ]);

      };

    }

 

    protected function home(): void
    {
        $servicesRepository = new ServicesRepository();
        $services = $servicesRepository->read();
         $creationsRepository = new CreationsRepository();
        $creations = $creationsRepository->read();
         $boutiqueRepository = new BoutiqueRepository();
        $boutique = $boutiqueRepository->read();
        $boutiqueRepository = new CategoriesRepository();
        $categorie = $boutiqueRepository->read();
        //$categorie = $boutiqueRepository->showCategories();

        
        $this->render('/home', [
            'service' => $services,
            'creation' => $creations,
            'categorie' => $categorie,
            'article' => $boutique,
            
        
            
        ]);
    }

    protected function prestations(): void
    {
        $prestationsRepository = new PrestationsRepository();
        $prestations = $prestationsRepository->read();

        $this->render('/prestation', [
            'services' => $prestations
        ]);
    }

    

    }
