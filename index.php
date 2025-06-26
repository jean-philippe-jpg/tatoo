


   <?php


define('_ROOTPATH_',__DIR__);
define('_ROOTPATHADMIN_',__DIR__);

spl_autoload_register();


use App\Controller\Controller;

require_once './templates/partial/_partial-header.php';
require_once './templates/partial/_partial-footer.php';
$pages = new Controller();
$pages->route();


    // Include the header partial
    /*require_once './App/Bdd/MySql.php';
    require_once 'template/partial/_partial-header.php';
 require_once 'template/partial/_listproduits.php';
 require_once './template/partial/_creation.php';
 require_once './template/partial/_services.php';
 require_once './template/partial/_contact.php';
 require_once './template/partial/_connexion.php';
 require_once './template/Admin/Services/read.php';
     // Include the footer partial
     require_once 'template/partial/_partial-footer.php';*/



  
    




