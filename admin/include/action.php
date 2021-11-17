<?php
include 'engine.php';

//check for login
if(isset($_POST['login'])){
	

    $username = mysqli_real_escape_string($con,$_POST['username']);
    $ms = mysqli_real_escape_string($con,$_POST['password']);
    //login from database
    $a=login("tbl_".$type,$username,$ms,3);
    switch($a){
        case 1: 
    //for rember me
    if(isset($_POST['rem'])){
        $time = time()+60*60; // for one hour
        setcookie("adminLogin",$username,$time);
        }
    $_SESSION['adminLogin']=$username;
    header ("location: index.php");
    break;
        default:
        echo "<script>alert('invalid username and password. please try later')</script>";
    


    }
}

if(isset($_POST['c_'.@$type])){
            
    @$image=$_FILES['image'];
    
    @$imageName='';
    @$temp = explode(".", $_FILES["image"]["name"]);
               
     @ $extension = end($temp);
               @ $fileName = $temp[0] . "." . $temp[1];
               @ $temp[0] = rand(0, 3000); //Set to random number
              @  $temp = explode(".", $_FILES["image"]["name"]);
               @ $newfilename = round(microtime(true)) . '.' . $extension;
      
            if($type=="item"){
                $a=array(
                    array("name",$_POST['name']),
                    array("description",$_POST['description']),
                    array("price",$_POST['price']),
                    array("avl_price",$_POST['avl_price']),
                    array("stock_flag",@$_POST['stock_flag']),
                    array("status",@$_POST['status']),
                    array("image",$newfilename),
                    array("creation_date",date("Y-m-d H:i:s"))
                );
                insert(8);
                compressImage($_FILES['image']['tmp_name'],$imgPath.$newfilename,60);

            }
            if($type=="faq"){
                $a=array(
                    array('question',$_POST['question']),
                    array('answer',$_POST['answer']),
                    array('status',(isset($_POST['status']))?$_POST['status']:0),
                    array('role',$_POST['role'])
                );
                insert(4);
            }
        }


       if(isset($_POST['u_'.@$type])){
        $id=$_POST['id'];
    @$image=$_FILES['image'];
    
    @$imageName='';
    @$temp = explode(".", $_FILES["image"]["name"]);
               
     @ $extension = end($temp);
               @ $fileName = $temp[0] . "." . $temp[1];
               @ $temp[0] = rand(0, 3000); //Set to random number
              @  $temp = explode(".", $_FILES["image"]["name"]);
               @ $newfilename = round(microtime(true)) . '.' . $extension;
      
            if($type="item"){
                $a=array(
                    array("name",$_POST['name']),
                    array("description",$_POST['description']),
                    array("price",$_POST['price']),
                    array("avl_price",$_POST['avl_price']),
                    array("stock_flag",@$_POST['stock_flag']),
                    array("status",@$_POST['status']),
                    array("image",$newfilename)
                );
                update(7);
                compressImage($_FILES['image']['tmp_name'],$imgPath.$newfilename,60);

            }
       }

?>