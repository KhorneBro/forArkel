<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<header>

</header>
<div id="content">
    <?php include 'connect.php' ?>
    <?php include 'functions.php' ?>
    <?php
    $id = $_GET['user_id'];
    $user = deleteMessage($db, $id);
    ?>
    <a href="index.php">Back</a>
</div>
<footer>

</footer>
</body>
</html>