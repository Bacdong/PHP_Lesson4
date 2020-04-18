<?php
    require_once('../../connection.php');
    $id = $_POST['id'];
    $theme = $_POST['theme'];
    $description = $_POST['description'];
    if($theme == '') {
        setcookie('msg','Cập nhật không thành công!',time()+3);
        header('Location: categories_edit.php?id='.$id);
    } else {
        $query = "UPDATE categories SET theme = '".$theme."', description = '".$description."' WHERE id = ".$id;
        $status = $connection->query($query);
        if($status == true) {
            setcookie('msg','Cập nhật thành công!',time()+3);
            header('Location: categories.php');
        } else {
            setcookie('msg','Cập nhật không thành công!',time()+3);
            header('Location: categories_edit.php?id='.$id);
        }
    }
?>