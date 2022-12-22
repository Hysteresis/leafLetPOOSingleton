<?php
if (isset($_GET['latitude'])){
    $latitude = $_GET['latitude'];

    echo "je recupère les parametres d'URL : " . $latitude;
}

?>