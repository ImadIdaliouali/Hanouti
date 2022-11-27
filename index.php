<?php
session_start();
if (isset($_GET["logout"]))
    unset($_SESSION["username"]);
if (!array_key_exists("username", $_SESSION))
    header("location:logIn.php");
require "data.php";
require "header.php";
echo "<div class=\"container\">";
echo "<div class=\"products\">";
foreach ($products as $p) {
    echo "<div class=\"sous-prod\">"
        . "<img class=\"plus\" id=\"" . $p["id"] . "\" src =\"./imgs/plus.png\">"
        . "<img class=\"prod-img\" src=\"./imgs/" . $p["img"] . "\">"
        . "<p>" . $p["name"] . " : " . $p["price"] . "DH</p>"
        . "<button class=\"detail\" id=\"detail" . $p["id"] . "\">Deatil</button>"
        . "</div>";
}
echo "</div>";
echo "<div class=\"panier\">";
echo "<input class=\"chercher\" type=\"text\" placeholder=\"chercher un produit ...\">";
echo "<div class=\"total\">Total: 0DH</div>";
echo "<div class=\"articles-liste\"></div>";
echo "</div>";
echo "</div>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hanouti</title>
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
</head>

<body>
    <script>
        var products = <?php echo json_encode($products); ?>;
    </script>
    <script src="./js/index.js?v=<?php echo time() ?>"></script>
</body>

</html>