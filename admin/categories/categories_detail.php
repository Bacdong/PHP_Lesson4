<?php
    require_once('../../connection.php');
    $id = $_GET['id'];
    $query = "SELECT * FROM categories WHERE id = ".$id;
    $result = $connection->query($query)->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Duong Bac Dong - My Blogs</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <h3 align="center">Duong Bac Dong - My Blogs</h3>
    <h3 align="center">Category Detail</h3>
    <hr>
    <h4>ID:&nbsp;&nbsp;&nbsp;<?=$result['id'];?></h4>
    <h4>Theme:&nbsp;&nbsp;&nbsp;<?=$result['theme'];?></h4>
    <h4>Title:&nbsp;&nbsp;&nbsp;<?=$result['title'];?></h4>
    <h4>Description:&nbsp;&nbsp;&nbsp;<?=$result['description'];?></h4>
</body>
</html>