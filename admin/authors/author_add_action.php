<?php
    require_once('../../connection.php');
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $birthday = $_POST['birthday'];
    $status = $_POST['status'];

    if($fullname == '' || $email == '' || $password = '' || $birthday == '') {
        setcookie('msg','Thêm mới user không thành công! Dữ liệu không được để trống!',time()+3);
        header('Location: author_add.php');
    } else {
        $query = "INSERT INTO author(fullname,email,password,birthday,status) VALUES('".$fullname."','".$email."','".$password."','".$birthday."','".$status."');";
        $status = $connection->query($query);
        if($status == true) {
            setcookie('msg','Thêm mới user thành công!',time()+3);
            header('Location: authors.php');
        } else {
            setcookie('msg','Thêm mới user không thành công!',time()+3);
            header('Location: author_add.php');
        }
    }
?>