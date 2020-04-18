<?php
    require_once('../../connection.php');
    //upload file
    $target = '../img/'; //thư mục chứa file upload
    $thumbnail = '';

    $target_file = $target.basename($_FILES['image']['name']); //link sẽ upload file lên

    // if($_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == 'image/jpeg') 
    $status = move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    if($status) {
        $image = '../img/'.basename($_FILES['image']['name']);
    }

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];

    $status = 0;
    if(isset($_POST['status'])) {
        $status = $_POST['status'];
    }

    $category_id = 1;
    $author_id = 1;

    echo $image;


    $query = "UPDATE posts SET title = '".$title."', description = '".$description."', content = '".$content."', author_id = '".$author_id."', category_id = '".$category_id."', status = '".$status."', image = '".$image."' WHERE id=".$id;
    $status_post = $connection->query($query);
    if($status_post == true) {
        setcookie('msg','Cập nhật bài viết thành công!',time()+3);
        header('Location: posts.php');
    } else {
        setcookie('msg','Cập nhật bài viết không thành công!',time()+3);
        header('Location: post_add.php');
    }
?>