<?php
namespace App\Controller;

use App\Controller\PagesController;
use App\Repository\ServicesRepository;
use App\Repository\CreationsRepository;
use App\Repository\PrestationsRepository;



class CreationsController extends Controller
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
                  case 'list':
                    $this->list();
                    break;
                

                 default:
                    throw new \Exception('Action non reconnue');
                }
        } 
}



protected function create(): void
 {
        $servicesRepository = new CreationsRepository();
        $servicesRepository->create();

        $this->render('/Admin/Creations/create' );
        
    }

 protected function read(): void
 {
        $creationsRepository = new CreationsRepository();
        $creations = $creationsRepository->read();
        $this->render('/Admin/Creations/read', [
            'creation' => $creations
        ]);
    }

   
    protected function update()
 {
        $id = $_GET['id'];
        $prestationsRepository = new CreationsRepository();
         $findoneby = $prestationsRepository->findOneBy($id);
        $prestationsRepository->update($id);

        $this->render('/Admin/Creations/create', [

            'findone' => $findoneby
        ] );
        
    }

    protected function delete()
 {
        $id = $_GET['id'];
        $servicesRepository = new CreationsRepository();
        $servicesRepository->delete($id);

        $this->render('/Admin/Creations/read' );
        
    }

        protected function show() : void 

 {      
            $id = $_GET['id'] ?? null;
        $creationsRepository = new CreationsRepository();
         $findoneby = $creationsRepository->findOneBy($id);

        $this->render('/Admin/Creations/show', [

            'findone' => $findoneby

        ] );
 }

  protected function list(): void
 {
        $prestationsRepository = new PrestationsRepository();
        $prestations = $prestationsRepository->read();
       
        $this->render('/prestation', [
            'prestation' => $prestations,
            
        ]);
    }

 
}