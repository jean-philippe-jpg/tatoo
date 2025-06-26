<?php
namespace App\Controller;


use App\Controller\PagesController;

use App\Repository\ServicesRepository;


class Controller{
   
    public function route(): void {

try { 
    
    if (isset($_GET['controller'])){

    switch($_GET['controller']){

          case 'access':

            $pagecontroller = new PagesController();
            $pagecontroller->route();
            break; 


        case 'home':

            $pagecontroller = new PagesController();
            $pagecontroller->route();
            break;

        case 'services':

            $pagecontroller = new ServicesController();
            $pagecontroller->route();
            break;
                           
        default:
            throw new \Exception('erreur de controller');
            
          break;
  }
}  else {

    $pagecontroller = new PagesController();
    $pagecontroller->home();
}
} catch(\Exception $e){
$this->render('errors/errors', [
    'errors' => $e->getMessage()
]);

}

                }

                protected function render(string $path, array $params = []): void
                 {
                    $filePath = _ROOTPATH_.'/templates/'.$path.'.php';
                  


                    try{
                        if(!file_exists($filePath)){

                        throw new \Exception('fichier introuvable');
                            } else {
                                extract($params);
                                require_once $filePath;
                            }

                    } catch(\Exception $e) {

                        echo $e->getMessage();
                    }
                          /*require _ROOTPATH_ . '/templates/showanimals.php';*/            
    }
}

                