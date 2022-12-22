
<form method="GET" action="receptionduget.php?latitude=12">

    <!-- saisir la donnee a envoyer via le submit -->
    <label for="">Soummettre un form en GET, regarde l'URL</label>
    <input name="latitude">

    <!-- soumettre le champ que tu as rempli -> PHP $_GET[''] -->
    <input type="submit" value="Subscribe!">

</form>

<form method="POST" action="receptiondupost.php">

    <!-- saisir la donnee a envoyer via le submit -->
    <label for="">Soummettre un form en POST, regarde l'URL</label>
    <input name="latitude">

    <!-- soumettre le champ que tu as rempli -> PHP $_GET[''] -->
    <input type="submit" value="Subscribe!">

</form>

