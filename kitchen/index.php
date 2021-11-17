<?php
$type="";
$page="Home";
$title="Home";
$description="Welcome to Spicizz";
$master="";
include 'include/header.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
<?php 

if(getval('tbl_kitchen','count(*)' ,"status=1 and user_id=$userid")==0){
    ?>

<a href="setup.php?token=<?php echo $userid; ?>&step=basic" class="float">
<i class="fa fa-plus my-float"></i>
</a>
    <?php
}else{
    ?>

<a href="food.php" class="float">
<i class="fa fa-plus my-float"></i>
</a>
    <?php
}
?>


</div>
<?php
include 'include/footer.php';
?>