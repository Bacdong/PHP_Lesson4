<?php
    require_once('../../connection.php');
    $id = $_GET['id'];
    $query = "SELECT * FROM author WHERE id = ".$id;
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
    <h3 align="center">Author Detail</h3>
    <hr>
    <h4>ID:&nbsp;&nbsp;&nbsp;<?=$result['id'];?></h4>
    <h4>Fullname:&nbsp;&nbsp;&nbsp;<?=$result['fullname'];?></h4>
    <h4>Email:&nbsp;&nbsp;&nbsp;<?=$result['email'];?></h4>
    <h4>Password:&nbsp;&nbsp;&nbsp;<?=md5($result['password']);?></h4>
    <h4>Birthday:&nbsp;&nbsp;&nbsp;<?=$result['birthday'];?></h4>
    <h4>Status:&nbsp;&nbsp;&nbsp;<?=$result['status'];?></h4>
</body>
</html>