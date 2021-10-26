<?php
session_start();
include ('../connect.php');

    if(isset($_POST["login"]) && $_POST["username"] !='' && $_POST["password"]!=''){

        $username= $_POST["username"];
        $password=$_POST["password"];

        $sql= "SELECT * FROM member WHERE username='$username' AND password='$password'";
        $user = mysqli_query($dbc,$sql);
        if(mysqli_num_rows($user)>0){
           $_SESSION["user"]=$username;
           header("location: index.php");   
        }else{
            echo "Nhap sai";
        }
    }else{
        header("location:login.php");
    }
?>