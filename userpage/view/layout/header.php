<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>TuManh</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="../view/assets/img/favicon.ico">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- CSS 
========================= -->
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- Plugins CSS -->
<link rel="stylesheet" href="../view/assets/css/plugins.css">

<!-- Main Style CSS -->
<link rel="stylesheet" href="../view/assets/css/style.css">
<?php
include_once '../model/Product.php';
if(empty($_SESSION)){
    session_start();
}
?>