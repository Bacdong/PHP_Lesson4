<?php
    require_once('../../connection.php');
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    //upload file
    $target = '../img/'; //thư mục chứa file upload
    $thumbnail = '';

    $target_file = $target.basename($_FILES['image']['name']); //link sẽ upload file lên

    // echo "<pre>";
    //     print_r($_FILES);
    // echo "<pre>";
    // echo $_FILES['image']['type'];
    // die;


    // if($_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == 'image/jpeg') 
    $status = move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
    if($status) {
        $image = '../img/'.basename($_FILES['image']['name']);
    }

    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];

    $status = 0;
    if(isset($_POST['status'])) {
        $status = $_POST['status'];
    }

    $category_id = $_POST['category_id'];
    $author_id = 1;

    $created_at = date('Y-m-d H:i:s');

    $query = "INSERT INTO posts(title,description,content,author_id,category_id,status,created_at,image) VALUES ('".$title."','".$description."','".$content."','".$author_id."','".$category_id."','".$status."','".$created_at."','".$image."');";
    $status_post = $connection->query($query);
    if($status_post == true) {
        setcookie('msg','Thêm mới bài viết thành công!',time()+3);
        header('Location: posts.php');
    } else {
        setcookie('msg','Thêm mới bài viết không thành công!',time()+3);
        header('Location: post_add.php');
    }
?>