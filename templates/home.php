


<?php

require_once './templates/partial/_partial-header.php';
//require_once './template/partial/_services.php';



if(isset($_GET['services'])) {

require_once './templates/partial/_services.php';

} else {
echo '<h1>Page Accueil</h1>';

}

require_once './templates/partial/_partial-footer.php';