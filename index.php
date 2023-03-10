<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeafletPOOSingleton</title> 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
    crossorigin=""/>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
    integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
    crossorigin=""></script>
    <script defer src="script.js"></script>
    <link rel="stylesheet" href="newstyle.css">
    


</head>
<body>
    <div id="map"></div>

    <?php 
        require_once('Address.php');
        require_once('Config.php');
        // instancie la classe Config
        $config = Config::getInstance();
        // recupère le tableau d'objets du select de la BDD
        $lesAddresses = $config->getLesAdresses();

        // echo '<pre>';
        // print_r($config->getLesAdresses());
        // echo '</pre>';

echo "<table id='table' style=\"display: none\">";

    foreach($lesAddresses as $lesAddresse){
        echo "<tr>" ;
            echo "<td class='Id'>" . $lesAddresse['Id'] . "</td>";
            echo "<td class='ville'>" . $lesAddresse['ville'] . "</td>";
            echo "<td class='description'>" . $lesAddresse['description'] . "</td>";
            echo "<td class='longitude'>" . $lesAddresse['longitude'] . "</td>";
            echo "<td class='latitude'>" . $lesAddresse['latitude'] . "</td>";
        echo "</tr>" ;

    }

echo "</table>";

require('formulaire.php');
?>

<!-- L'utilisateur saisit la latitude et la longitude puis inserer un marker dans la map -->


<!-- html -->
<!-- mettre un id a table -->
<!-- mettre une class a chaque balise td -->

<!-- JS -->
<!-- recuperer les enfants de table tr td -->
<!-- afficher nos var dans marker en js-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
       let ligne = $("table").children().children().each(function(){
        console.log(this.getElementsByClassName("latitude"))
            var lat = this.getElementsByClassName("latitude")[0].innerHTML;
            var long = this.getElementsByClassName("longitude")[0].innerHTML;
            var ville = this.getElementsByClassName("ville")[0].innerHTML;
            var description = this.getElementsByClassName("description")[0].innerHTML;
            var marker = L.marker([Number(lat), Number(long)]).addTo(map);
            marker.bindPopup(`${ville} </br> ${description}`).openPopup();


        });
  });
</script>
</body>
</html>