<?php
namespace App\Controller;

use App\Controller\PagesController;
use App\Repository\ServicesRepository;



class ServicesController extends Controller
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

                    case 'show':
                    $this->show();
                    break;

                 default:
                    throw new \Exception('Action non reconnue');
                }
        } 
}



protected function create(): void
 {
        $servicesRepository = new ServicesRepository();
        $servicesRepository->create();

        $this->render('/Admin/Services/create' );
        
    }

 protected function read(): void
 {
        $servicesRepository = new ServicesRepository();
        $services = $servicesRepository->read();
        $this->render('/Admin/Services/read', [
            'services' => $services
        ]);
    }


        protected function show(): void
 {          if(!isset($_GET['id'])) {

            $id = $_GET['id'];
        $servicesRepository = new ServicesRepository();
        $servicesRepository->findOneBy( $id);

        $this->render('/Admin/Services/show', [

            'services' => $servicesRepository

        ] );
 }
    }

    
    
}