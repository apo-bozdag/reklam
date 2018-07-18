<?php include "get.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Reklam Ekleme Paneli - RadKod</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">
        <a href="<?php echo $homeUrl; ?>">Reklam Paneli</a>
    </h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="<?php echo $homeUrl."/add_ad"; ?>">Reklam Ekle</a>
        <a class="p-2 text-dark" href="<?php echo $homeUrl."/slot"; ?>">Reklam Alanları</a>
    </nav>
    <!--<a class="btn btn-outline-primary" href="#">Sign up</a>-->
</div>
<div class="container">