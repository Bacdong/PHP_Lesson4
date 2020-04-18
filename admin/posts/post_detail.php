<?php
    require_once('../../connection.php');
    $id = $_GET['id'];
    $query = "SELECT * FROM posts WHERE id = ".$id;
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
    <h3 align="center">Post Detail</h3>
    <hr>
    <h4>ID:&nbsp;&nbsp;&nbsp; <span style="font-size: 14px; font-weight: normail"><?=$result['id'];?></span></h4>
    <h4>Title:&nbsp;&nbsp;&nbsp; <span style="font-size: 14px; font-weight: normail"><?=$result['title'];?></span></h4>
    <h4>Description:&nbsp;&nbsp;&nbsp; <span style="font-size: 14px; font-weight: normail"><?=$result['description'];?></span></h4>
    <img src="<?=$result['image'];?>" alt="" width="400px">
    <h4>Content:&nbsp;&nbsp;&nbsp; <span style="font-size: 14px; font-weight: normail"><?=$result['content'];?></span></h4>
</body>
</html>