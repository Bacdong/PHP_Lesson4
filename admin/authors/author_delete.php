<?php
    require_once('../../connection.php');
    $id = $_GET['id'];
    $query = "DELETE FROM author WHERE id =".$id;
    $status = $connection->query($query);
    if($status == true) {
        setcookie('msg','Xoá thành công!',time()+3);
        header('Location: authors.php');
    } else {
        setcookie('msg','Xoá không thành công!',time()+3);
        header('Location: authors.php');
    }
?>