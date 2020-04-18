<?php
    require_once('../../connection.php');
    $id = $_GET['id'];
    $query = "DELETE FROM categories WHERE id =".$id;
    $status = $connection->query($query);
    if($status == true) {
        setcookie('msg','Xoá thành công!',time()+3);
        header('Location: categories.php');
    } else {
        setcookie('msg','Xoá không thành công!',time()+3);
        header('Location: categories.php');
    }
?>