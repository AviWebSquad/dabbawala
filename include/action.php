<?php
include 'engine.php';


if(isset($_POST['login'])){
    $a= login('tbl_user', $_POST['Email'], $_POST['Password'],1);
     switch($a){
         case 1: 
     //for rember me
     if(isset($_POST['rem'])){
         $time = time()+60*60; // for one hour
         setcookie("newBuyerLogin",$_POST['Email'],$time);
         }
     $_SESSION['newBuyerLogin']=$_POST['Email'];
     setcookie('email','', time() - 3600);
     setcookie('password','', time() - 3600);
     header('location:index.php');
     break;
         default:
         echo "<script>alert('invalid Email or Password. please try later')</script>";
     
 
 }
 }
 if(isset($_POST['sign'])){
    if(getco('tbl_user','role=1 and email='.$_POST['email'])==1){
        echo "<script>alert('Email is already registered')</script>";
    }else if(getco('tbl_user','role=1 and phone_no="'.$_POST['phno'].'"')==1){
       echo "<script>alert('Phone number is already registered')</script>";

    }else{
        $type="user";
        $a=array(
            array('f_name',$_POST['f_name']),
            array('l_name',$_POST['l_name']),
            array('email',$_POST['email']),
            array('phone_no',$_POST['phno']),
            array('username',$_POST['f_name'].$_POST['l_name']),
            array('password',md5($_POST['pass'])),
            array('role',1),
            array('creation_date',date('Y-m-d H:i:s')),
            array('otp','123'),
            
        );
        insert(9);
        header('location:login.php');
    }
    
}
?>