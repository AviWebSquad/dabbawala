<?php
include 'engine.php';

if(@$_SESSION['newKitchenLogin']=='' && $type!='user'){
	header('Location:login.php');
}
if(isset($_POST['login'])){
    $a= login('tbl_user', $_POST['Email'], $_POST['Password'],2);
     switch($a){
         case 1: 
     //for rember me
     if(isset($_POST['rem'])){
         $time = time()+60*60; // for one hour
         setcookie("newKitchenLogin",$_POST['Email'],$time);
         }
     $_SESSION['newKitchenLogin']= getval('tbl_user','id','role=2 and email="'.$_POST['Email'].'"');
     setcookie('email','', time() - 3600);
     setcookie('password','', time() - 3600);
     header('location:index.php');
     break;
         default:
         echo "<script>alert('invalid Email or Password. please try later')</script>";
     
 
 }
 }
 if(isset($_POST['sign'])){
    if(getco('tbl_user','role=2 and email='.$_POST['email'])==1){
        echo "<script>alert('Email is already registered')</script>";
    }else if(getco('tbl_user','role=2 and phone_no="'.$_POST['phno'].'"')==1){
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
            array('role',2),
            array('creation_date',date('Y-m-d H:i:s')),
            array('otp','123'),
            
        );
        insert(9);
        header('location:login.php');
    }
     
}
if(isset($_GET['token']) && $_GET['step']){
    if($_GET['step']=="basic"){
        if(getval('tbl_kitchen','count(*)' ,"user_id=".$_SESSION['newKitchenLogin'])==0){
        $type="kitchen";
        $a=array(
            array('user_id',$_SESSION['newKitchenLogin'])
        );
        insert(1);
        }
        $_SESSION['kid']=getval('tbl_kitchen','max(id)',"status=0");
    }
    
}

if(isset($_POST['basic'])){
  
    @$image=$_FILES['image'];
    
    @$imageName='';
    @$temp = explode(".", $_FILES["image"]["name"]);
               
     @ $extension = end($temp);
               @ $fileName = $temp[0] . "." . $temp[1];
               @ $temp[0] = rand(0, 3000); //Set to random number
              @  $temp = explode(".", $_FILES["image"]["name"]);
               @ $newfilename = round(microtime(true)) . '.' . $extension;
      
    $type="kitchen";
    $id=$_SESSION['kid'];
    $a=array(
        array('kitchen_title',$_POST['title']),
        array('description',$_POST['description']),
        array('kitchen_type',$_POST['ftype']),
        array('image',$newfilename)
    );
    compressImage($_FILES['image']['tmp_name'],$imgPath.$newfilename,60);

    update(4);

    header("location:setup.php?step=media&token=".$_SESSION['newKitchenLogin']);
}
if(isset($_POST['uploadadd'])){
    
    // header("location:setup.php?step=media&token=".$_SESSION['newKitchenLogin']);
   extract($_POST);
   $error=array();
   $extension=array("jpeg","jpg","png","gif");
   foreach($_FILES["media"]["tmp_name"] as $key=>$tmp_name) {
       $file_name=$_FILES["media"]["name"][$key];
       $file_tmp=$_FILES["media"]["tmp_name"][$key];
       $ext=pathinfo($file_name,PATHINFO_EXTENSION);
   
       if(in_array($ext,$extension)) {
           if(!file_exists($imgPath.$file_name)) {
            $type="kitchen_media";
            $a=array(
                array('kitchen_id',$_SESSION['kid']),
                array('user_id',$_SESSION['newKitchenLogin']),
                array('media',$file_name),
                array('creation_date',date('Y-m-d'))
            );
            insert(4);
               move_uploaded_file($file_tmp=$_FILES["media"]["tmp_name"][$key],$imgPath.$file_name);
           }
           else {
               $filename=basename($file_name,$ext);
               $newFileName=$filename.time().".".$ext;
               $type="kitchen_media";
               $a=array(
                   array('kitchen_id',$_SESSION['kid']),
                   array('user_id',$_SESSION['newKitchenLogin']),
                   array('media',$newFileName),
                array('creation_date',date('Y-m-d'))

               );
               insert(4);
              move_uploaded_file($file_tmp=$_FILES["media"]["tmp_name"][$key],$imgPath.$newFileName);
           }
       }
       else {
           array_push($error,"$file_name, ");
       }
   }
}
if(isset($_POST['media'])){
  
  header("location:setup.php?step=location&token=".$_SESSION['newKitchenLogin']);
}
if(isset($_POST['location'])){

    $type="kitchen";
    $id=$_SESSION['kid'];
    $a=array(
        array('address',$_POST['address']),
        array('state',$_POST['state']),
        array('city',$_POST['city']),
        array('pin_code',$_POST['pincode']),
    );
   
    update(4);


    header("location:setup.php?step=final&token=".$_SESSION['newKitchenLogin']);
}
if(isset($_POST['final'])){
    $type="kitchen";
    $id=$_SESSION['kid'];
    $a=array(
        array('status',1)
        
    );
   
    update(1);


    header("location:index.php");
}

?>