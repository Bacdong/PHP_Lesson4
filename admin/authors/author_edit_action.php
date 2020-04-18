<?php
    require_once('../../connection.php');
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $birthday = $_POST['birthday'];
    $status = $_POST['status'];

    if($fullname == '' || $email == '' || $password == '') {
        setcookie('msg','Cập nhật không thành công!',time()+3);
        header('Location: author_edit.php?id='.$id);
    } else {
        $query = "UPDATE author SET fullname = '".$fullname."', email = '".$email."', password = '".$password."', birthday = '".$birthday."' , status = '".$status."' WHERE id = ".$id;
        $status = $connection->query($query);
        if($status == true) {
            setcookie('msg','Cập nhật thành công!',time()+3);
            header('Location: authors.php');
        } else {
            setcookie('msg','Cập nhật không thành công!',time()+3);
            header('Location: author_edit.php?id='.$id);
        }
    }
?>