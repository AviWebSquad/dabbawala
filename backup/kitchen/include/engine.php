<?php
include 'dbconfig.php';

function login($tbl,$id,$pwd,$role){
	global $con;
	$enc=md5($pwd);
	try{
$sql="select count(*) from $tbl where email='$id' and password='$enc' and role=$role";
//echo $sql;
}catch (Exception $e) {
echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
$qry=mysqli_query($con,$sql);
$result=mysqli_fetch_array($qry);
return $result[0];

}
 //changing name
 @$temp = explode(".", $_FILES["image"]["name"]);
               
 @ $extension = end($temp);
           @ $fileName = $temp[0] . "." . $temp[1];
           @ $temp[0] = rand(0, 3000); //Set to random number
          @  $temp = explode(".", $_FILES["image"]["name"]);
           @ $newfilename = round(microtime(true)) . '.' . $extension;
           @$image=$_FILES['image'];
           @	$imageName=$_POST['oldImage'];

           function getco($tblName,$cond){
            $con = new mysqli(hostname,username,password,database);
            $akl="select count(*) from $tblName where $cond";
            //echo $akl;
            $query=mysqli_query($con,$akl);
            $result=[];
            if($query){
        
                $result=mysqli_fetch_array($query);
            }else{
                $result=mysqli_error($con);
            }
            return $result[0];
        }
//########################Show Count#######################
function getval($tblName,$val,$cond){
    $con = new mysqli(hostname,username,password,database);

    $a="select $val from $tblName where $cond";
    
    $query=mysqli_query($con,$a);
    $result=[];
    if($query){

        $result=mysqli_fetch_array($query);
    }else{
        $result=mysqli_error($con);
    }
    return @$result[0];
}
           //##############COMPRESS ENGINE########################
function compressImage($source, $destination, $quality) {

    $info = getimagesize($source);
  
    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source);
    }
    elseif ($info['mime'] == 'image/gif'){ 
        $image = imagecreatefromgif($source);
    }
    elseif ($info['mime'] == 'image/png'){ 
        $image = imagecreatefrompng($source);
    }
   @ imagejpeg($image, $destination, $quality);
  
  }
  
   //##############INSERT ENGINE######################## 
  @$a;
  function insert($b){
  global $a,$type,$con,$success,$error,$select;
  $c=$b-1;
 
      $p="INSERT INTO tbl_".$type." (";
  
  
  for($i=0;$i<$b;$i++){	
  $p=$p."`".$a[$i][0]."`";
  if($i==$c){}else{$p=$p.",";}
  }
  $p=$p.") VALUES (";
  for($i=0;$i<$b;$i++){	
  $p=$p."'".$a[$i][1]."'";
  if($i==$c){}else{$p=$p.",";}
  }
  $sql= $p.");";
  $con = new mysqli(hostname,username,password,database);

          if ($con->query($sql) === TRUE) {
         
              $success=$type." created success";
             // $qry=$select;
              } else {
              $error="Error: " . $sql . "<br>" . $con->error;
              }$con->close();
      
          return 0;	
  }
  
  //##############DELETE ENGINE###################################
  function del(){
    global $con,$error,$select,$type,$info;
      $id1=$_GET['del'];
      $sql="delete from `tbl_$type` WHERE id='$id1'";
      $query=mysqli_query($con,$sql);
      if($query){
      $info=ucfirst($type) . "Deleted Success";
    $sql=$select;
    
    }
    else{
    $error=ucfirst($type) ." is not deleted". Mysqli_error($con);
    $sql=$select;
    }
  }
    //####################UPDATE ENGINE#############################
    if(isset($_GET['edit']) || isset($_GET['view'])){
       $id1='';
       if(isset($_GET['edit'])){

           @$id1=$_GET['edit'];
       }else{

           @$id1=$_GET['view'];
       }
    
    
      $sql="SELECT * FROM tbl_$type WHERE id='$id1'";
     
        $query=mysqli_query($con,$sql);
      $editData=mysqli_fetch_assoc($query);
       
      }
        if(isset($_GET['del'])){
            del();
        }
   
//to change the status of a record
if(isset($_GET['status'])){
    $id1=$_GET['status'];
 
    $sql="update tbl_$type set status=!status WHERE id='$id1'";
    if ($con->query($sql) === TRUE) {
            $success=$type." Detail Updated success";
            @$qry=$select;
            
        } else {
        $error="Error: " . $sql . "<br>" . $con->error;
        }//$con->close();
}

      function update($b){
        global $error,$select,$type,$success,$id,$a;
        $c=$b-1;
        $p="UPDATE tbl_".$type." SET ";
        for($i=0;$i<$b;$i++){	
        $p=$p."`".$a[$i][0]."`='".$a[$i][1]."'";
        if($i==$c){}else{$p=$p.",";}
        }
        $p=$p." WHERE `tbl_".$type."`.`id`='".@$id."' ";
        
        $sql= $p.";";
        $con = new mysqli(hostname,username,password,database);

        $qry=mysqli_query($con,$sql);
        if($qry){
          $success=ucfirst($type). " Details Updated Success";
          
          $sql=$select;
      
       //$p="c_".$type;
        }else{
           $error=ucfirst($type). " Details Not Updated".mysqli_error($con);
           $sql=$select;
        }
            return 0;
      
           // $success=$sql;
        }
      



        if(isset($_POST['sign'])){
            if(getco('tbl_user','role=2 and email='.$_POST['email'])==1){
                $error="Email is already registered";
            }else if(getco('tbl_user','role=2 and phone_no="'.$_POST['phno'].'"')==1){
                $error="Phone number is already registered";

            }else{
                $type="user";
                $a=array(
                    array('f_name',$_POST['fname']),
                    array('l_name',$_POST['lname']),
                    array('email',$_POST['email']),
                    array('phone_no',$_POST['phno']),
                    array('username',$_POST['fname'].$_POST['lname']),
                    array('password',md5($_POST['password'])),
                    array('role',2),
                    array('creation_date',date('Y-m-d H:i:s')),
                    array('otp','123'),
                    
                );
                insert(9);
                setcookie('kemail',$_POST['email']);
                setcookie('kpassword',$_POST['password']);
                
                $success='Thanks for registration. <a id="custom-tabs-four-profile-tab1" data-toggle="pill" href="#custom-tabs-four-profile1" role="tab" aria-controls="custom-tabs-four-profile1" aria-selected="false">Click Here</a> for login';
                
            }
            
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
		$_SESSION['newKitchenLogin']=$_POST['Email'];
        setcookie('kemail','', time() - 3600);
        setcookie('kpassword','', time() - 3600);
		header ("location: index.php");
		break;
			default:
			echo "<script>alert('invalid Email or Password. please try later')</script>";
		
	
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
      
            if($type="item"){
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