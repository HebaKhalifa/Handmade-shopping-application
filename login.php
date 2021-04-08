<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    require 'connection.php';
    require 'formValidations.php';
    if (validateMail($_POST['mail']) && validatePassword($_POST['pass'])) {
        $mail = $_POST['mail'];
        $password = md5($_POST['pass']);

        $query = "select * from users where mail = '$mail' and  password = '$password' ";
        $search =  mysqli_query($con,$query);
        if(mysqli_num_rows($search)>0 ){
            $data = mysqli_fetch_assoc($search);

            $_SESSION['user_id']   = $data['ID'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['mail'] = $data['mail'];
            $_SESSION['gender'] = $data['gender'];
            $_SESSION['address'] = $data['address'];
            $_SESSION['img'] = $data['img'];

            header('Location: home.php');
        }else{
            $_SESSION['authMessage']="Mail or passssword doesn't match!<br>Please try again.";
            
            header('Location: index.php');
        }


    }else{
        echo $_SESSION['passMessage'];
        header('Location: index.php');
        
    }
}
