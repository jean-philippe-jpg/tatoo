<?php
namespace App\Controller;

use App\Repository\CategoriesRepository;



class CategoriesController extends Controller
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
                

                 default:
                    throw new \Exception('Action non reconnue');
                }
        } 
}



protected function create(): void
 {
        $categoriesRepository = new CategoriesRepository();
        $categoriesRepository->create();
        
        $this->render('/Admin/Categories/create', [

        ] );
        
    }

 protected function read(): void
 {
        $categoriesRepository = new CategoriesRepository();
        $categories = $categoriesRepository->read();
        $this->render('/Admin/Categories/read', [
            'categorie' => $categories
        ]);
    }
    protected function update()
 {
        $id = $_GET['id'];
        $categoriesRepository = new CategoriesRepository();
        $findoneby = $categoriesRepository->findOneBy($id);
        $categoriesRepository->update($id);

        $this->render('/Admin/Categories/create', [
            
            'findone' => $findoneby
        ] );
         
    }

    protected function delete()
 {
        $id = $_GET['id'];
        $categoriesRepository = new CategoriesRepository();
        $categoriesRepository->delete($id);

        
    }

        protected function show() : void 

 {      
            $id = $_GET['id'] ?? null;
        $categoriesRepository = new CategoriesRepository();
         $findoneby = $categoriesRepository->findOneBy($id);

        $this->render('/Admin/Categories/show', [

            'findone' => $findoneby

        ] );
 }

 
}