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
    <h3 align="center">Update Post Information</h3>
    <hr>
        <?php if(isset($_COOKIE['msg'])) { ?>
        <div class="alert alert-warning">
          <strong>Thông báo</strong> <?php echo $_COOKIE['msg'];?>;
        </div>
        <?php } ?>
        <form action="post_edit_action.php" method="POST" role="form" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$result['id'];?>">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" id="" placeholder="" name="title" value="<?=$result['title'];?>">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" id="" placeholder="" name="description" value="<?=$result['description'];?>">
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <input type="textarea" class="form-control" id="" placeholder="" name="content" value="<?=$result['content'];?>">
            </div>
            <div class="form-group">
                <label for="">Thumbnail</label>
                <input type="file" class="form-control" id="" placeholder="" name="image" value="<?=$result['image'];?>">
            </div>
            <label for="">Cho phép hiển thị </label>
            <input type="checkbox" id="" placeholder="" name="status" value="<?=$result['status'];?>"> <br/>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>