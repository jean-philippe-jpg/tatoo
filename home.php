


<?php


require_once './templates/partial/_partial-header.php';

if(isset($_GET['services'])) {

require_once './templates/partial/_services.php';

}  elseif (isset($_GET['creations'])){

    require_once './templates/partial/_creations.php';

} elseif (isset($_GET['boutique'])) {

     require_once './templates/partial/_categories.php';
    require_once './templates/partial/_boutique.php';


} elseif (isset($_GET['contact'])) {

     require_once './templates/partial/_contact.php';
}
require_once './templates/partial/_partial-footer.php';