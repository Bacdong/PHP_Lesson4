<?php
    require_once('../../connection.php');
    $theme = $_POST['theme'];
    $description = $_POST['description'];
    if($theme == '') {
        setcookie('msg','Thêm mới không thành công!',time()+3);
        header('Location: categories_add.php');
    } else {
        $query = "INSERT INTO categories(theme,description) VALUES('".$theme."','".$description."');";
        $status = $connection->query($query);
        if($status == true) {
            setcookie('msg','Thêm mới thành công!',time()+3);
            header('Location: categories.php');
        } else {
            setcookie('msg','Thêm mới không thành công!',time()+3);
            header('Location: categories_add.php');
        }
    }
?>