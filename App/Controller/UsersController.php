<?php
namespace App\Controller;

use App\Controller\PagesController;
use App\Repository\UsersRepository;
use App\Repository\ServicesRepository;
use App\Repository\PrestationsRepository;



class UsersController extends Controller
{
    public function route(): void
    {
        if(isset($_GET['action'])) {

            switch($_GET['action']) {

                case 'register':
                    $this->register();
                    break;

                 case 'login':
                    $this->login();
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
                

                 default:
                    throw new \Exception('Action non reconnue');
                }
        } 
}



protected function register(): void
 {
        $servicesRepository = new UsersRepository();
        $servicesRepository->addRegister();
        $servicesRepository->login();
        
        $this->render('/Admin/Users/register', [

        ] );
        
    }

    protected function login(): void
 {
        $servicesRepository = new UsersRepository();
        $sessions = $servicesRepository->login();
        
        
        $this->render('/Admin/Users/login', [
            'sessions' => $sessions
        ] );
        
    }

    /* protected function session(): void
 {
        $servicesRepository = new UsersRepository();
        $servicesRepository->login();
        
        
        $this->render('/partial/_partial-header.php', [

        ] );
        
    }*/

 protected function read(): void
 {
        $servicesRepository = new ServicesRepository();
        $services = $servicesRepository->read();
        $this->render('/Admin/Services/read', [
            'services' => $services
        ]);
    }
    protected function update()
 {
        $id = $_GET['id'];
        $servicesRepository = new ServicesRepository();
        $findoneby = $servicesRepository->findOneBy($id);
        $servicesRepository->update($id);

        $this->render('/Admin/Services/create', [
            
            'findone' => $findoneby
        ] );
         
    }

    protected function delete()
 {
        $id = $_GET['id'];
        $servicesRepository = new ServicesRepository();
        $servicesRepository->delete($id);

        //$this->render('/Admin/Services/read' );
        
    }

        protected function show() : void 

 {      
            $id = $_GET['id'] ?? null;
        $servicesRepository = new ServicesRepository();
         $service = $servicesRepository->findOneBy($id);

        $this->render('/Admin/Services/show', [

            'service' => $service

        ] );
 }

 
}