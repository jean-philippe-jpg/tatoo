<?php
namespace App\Controller;

use App\Controller\PagesController;
use App\Repository\ServicesRepository;
use App\Repository\PrestationsRepository;



class PrestationsController extends Controller
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

                 case 'detail':
                    $this->show();
                    break;
                

                 default:
                    throw new \Exception('Action non reconnue');
                }
        } 
}



protected function create(): void
 {
        $prestationsRepository = new PrestationsRepository();
        $prestationsRepository->create();
        $servicesRepository = new ServicesRepository();
        $services = $servicesRepository->read();
        
        $this->render('/Admin/Prestations/create',[

            'service' => $services
            
        ]
    );
            
    }

 protected function read(): void
 {
        $prestationsRepository = new PrestationsRepository();
        $prestations = $prestationsRepository->read();
        $this->render('/Admin/Prestations/read', [
            'prestation' => $prestations
        ]);
    }

   
    protected function update()
 {
        $id = $_GET['id'];
        $prestationsRepository = new PrestationsRepository();
         $findoneby = $prestationsRepository->findOneBy($id);
        $prestationsRepository->update($id);
        $prestations = $prestationsRepository->read();
         $servicesRepository = new ServicesRepository();
        $services = $servicesRepository->read();
        
        $this->render('/Admin/Prestations/create', [
            'prestation' => $prestations,
            'service' => $services,
            'findone' => $findoneby
        ] );
        
    }

    protected function delete()
 {
        $id = $_GET['id'];
        $prestationsRepository = new PrestationsRepository();
        $prestationsRepository->delete($id);

        $this->render('/Admin/Prestations/read' );
        
    }

        protected function show() : void 

 {      
            $id = $_GET['id'] ?? null;
        $prestationsRepository = new PrestationsRepository();
         $findoneby = $prestationsRepository->findOneBy($id);

        $this->render('/Admin/Prestations/show', [

            'findone' => $findoneby

        ] );

      

       
 }
       

  protected function list(): void
 {

        $id=$_GET['id'];

        $prestationsRepository = new PrestationsRepository();
        $prestations = $prestationsRepository->servicesList( $id);
        $this->render('/prestation', [
            'prestation' => $prestations
        ]);
    }

 
}