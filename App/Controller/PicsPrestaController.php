<?php

namespace App\Controller;



use App\Repository\PicsPrestaRepository;
use App\Repository\PrestationsRepository;
use App\Repository\ServicesRepository;

class PicsPrestaController extends Controller
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
                  /*case 'list':
                    $this->list();
                    break;*/
                

                 default:
                    throw new \Exception('Action non reconnue');
                }
        } 
}



protected function create(): void
 {
        $picsPrestaRepository = new PicsPrestaRepository();
        $picsPrestaRepository->create();
      
        $picsPrestaRepository = new PrestationsRepository();
         $pics = $picsPrestaRepository->read();

        $this->render('/Admin/PicsPresta/create', [

            'prestation' => $pics,
            
        ] );
        
    }

 protected function read(): void
 {
        $picsPrestaRepository = new PicsPrestaRepository();
        $pics = $picsPrestaRepository->read();
        $this->render('/Admin/PicsPresta/read', [
            'model' => $pics
        ]);
    }

   
    protected function update()
 {
        $id = $_GET['id'];
        $picsPrestaRepository = new PicsPrestaRepository();
        $findoneby = $picsPrestaRepository->findOneBy($id);
        $picsPrestaRepository->update($id);
         $prestationsRepository = new PrestationsRepository();
         $prestations = $prestationsRepository->read();

        $this->render('/Admin/PicsPresta/create', [
            'prestation' => $prestations,
            'findone' => $findoneby
        ] );
        
    }

    protected function delete()
 {
        $id = $_GET['id'];
        $picsPrestaRepository = new PicsPrestaRepository();
        $picsPrestaRepository->delete($id);

        //$this->render('/Admin/PicsPresta/read' );
        
    }

        protected function show() : void 

 {      
            $id = $_GET['id'] ?? null;
         $picsPrestaRepository = new PicsPrestaRepository();
         $findoneby = $picsPrestaRepository->findOneBy($id);

        $this->render('/Admin/PicsPresta/show', [

            'findone' => $findoneby

        ] );
 }

  

 
}