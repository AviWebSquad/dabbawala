<?php
include 'dbconfig.php';
session_start();
if(@$_SESSION['adminLogin']==''){
	header('Location:login.php');
}

function login($tbl,$id,$pwd,$role){
	global $con;
	$enc=md5($pwd);
	try{
$sql="select count(*) from $tbl where username='$id' and password='$enc' and role=$role";
echo $sql;
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
 
            $query=mysqli_query($con,"select count(*) from $tblName where $cond");
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
              }
      
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
      
?>