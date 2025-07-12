<?php

error_reporting(0);

$host="localhost";

$user="root";

$password="";

$db="schoolproject";

$data=mysqli_connect($host,$user,$password,$db);

if($data===false){
    die("connetion error");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $sql="select * FROM user where username='".$name."'AND password='".$pass."'";

    $result=mysqli_query($data,$sql);

    $row=mysqli_fetch_array($result);

    if($row["usertype"]=="student"){
        header("location:studenthome.php");
    }
    elseif($row["usertype"]=="admin")
    {
        header("location:adminhome.php");
    }
}
else{
    $massage= "username or password do not match";
    $_SESSION['loginMassage']=$massage;
}

