<?php
ob_start();
session_start();
include "config.php";
function __autoload($className) {
    if (file_exists("./class/$className.php")) {
        require_once "./class/$className.php";
        return true;
    }
    return false;
}

$database = new DatabaseHelper();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
    <script src="./trumbowyg/trumbowyg.min.js"></script>
    <link rel="stylesheet" href="./trumbowyg/ui/trumbowyg.min.css">
    <title>Honzovo | Web developer</title>
</head>
<body>

<?php
include "./page/header.php";


$pageFile = "./page/" . $_GET["page"] . ".php";
if (!file_exists($pageFile)) {
    $pageFile = './page/home.php';
}
include $pageFile;


include "./page/footer.php";
?>

</body>
</html>