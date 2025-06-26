<?php
namespace App\Controller;

use App\Repository\ServicesRepository;




class PagesController extends Controller
{


    public function route(): void
    {
        try {

            if(isset($_GET['action'])){


                switch($_GET['action']){

                       case 'admin':
                        $this->access();
                        break;

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

 protected function access(): void
    {
       /* $servicesRepository = new ServicesRepository();
        $services = $servicesRepository->read();*/

        $this->render('/Admin/admin', [
            //'services' => $services
        ]);
    }

    protected function home(): void
    {
        $servicesRepository = new ServicesRepository();
        $services = $servicesRepository->read();

        $this->render('/home', [
            'services' => $services
        ]);
    }

    }
