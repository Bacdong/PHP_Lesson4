<?php
    require_once('../../connection.php');
    $query = "SELECT * FROM posts;";
    $result = $connection->query($query);
    $posts = array();
    while($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
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
    <h3 align="center">Post List</h3>
    <a href="post_add.php" type="button" class="btn btn-primary">Thêm mới</a>
    <?php if(isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-success">
      <strong>Thành công! </strong> <?php echo $_COOKIE['msg'];?>;
    </div>
    <?php } ?>
    <hr>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Content</th>
          <th scope="col">Thumbnail</th>
          <th scope="col">Active</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($posts as $post) { ?>
        <tr>
          <th scope="row"><?php echo $post['id'];?></th>
          <td><?php echo $post['title'];?></td>
          <td><?php echo $post['description'];?></td>
          <td><?php echo $post['content'];?></td>
          <td><img src="<?php echo $post['image'];?>" alt="" width="300px"></td>
          <td>
            <a href="post_detail.php?id=<?= $post['id'];?>" type="button" class="btn btn-default">Xem</a>
            <a href="post_edit.php?id=<?= $post['id'];?>" type="button" class="btn btn-success">Sửa</a>
            <a href="post_delete.php?id=<?= $post['id'];?>" type="button" class="btn btn-warning">Xóa</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    </div>
</body>
</html>