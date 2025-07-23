


   <?php


define('_ROOTPATH_',__DIR__);
define('_ROOTPATHADMIN_',__DIR__);

spl_autoload_register();


use App\Controller\Controller;



//require_once './templates/partial/_partial-footer.php';
$pages = new Controller();
$pages->route();


    
    




