<?php
$type="faq";
$master="Platform";
$page="FAQ";
$imgPath = "image/item/";

include 'include/header.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $page; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo $master; ?></a></li>
              <li class="breadcrumb-item active"><?php echo $page; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-12">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Manage <?php echo $type; ?></h3>
              </div>
              
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <?php
             
              include 'include/alert.php';
              ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Question</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Question" name="question" value="<?php echo (isset($editData['question']))?$editData['question']:''; ?>">
                  </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                    
                 <textarea id="summernote" name="answer">
                 <?php echo (isset($editData['answer']))?$editData['answer']:''; ?>
              </textarea>
                   </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">For</label>
                    <select class="form-control" name="role">
                    <option value="buyer">Buyer</option>
                    <option value="spicer">Spicer</option>
                    <option value="both">Both</option>
                        
                    </select>   
                </div>
                 <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status" value="1" <?php echo (isset($editData) && $editData['status']==1)?'checked':'' ?>>
                    <label class="form-check-label" for="exampleCheck1" >Visible</label>
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <?php
    if(isset($editData)){
	?>
                  <button type="submit" class="btn btn-success" name="u_<?php echo $type; ?>">Update <?php echo $type; ?></button>

   <input type="hidden" name="id" value="<?php echo $editData['id'];?>" />
                  <?php
	}else{
	  ?>
                  <button type="submit" class="btn btn-primary" name="c_<?php echo $type; ?>">Add <?php echo $type; ?></button>

<?php
	}
	  ?>
                </div>
              </form>
            </div>
        </div>
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $type; ?> List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                
                </tr>
                </thead>
                <tbody>
                <div id="accordion">
                  <?php 
                   $fetchmaster="select * from tbl_".$type;
                   $getdata=mysqli_query($con,$fetchmaster);
                   $i=0;
                  while($row=mysqli_fetch_array($getdata)){
                    $i=$i+1;
                  ?>
                <tr>
                  <td>
                 
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapse<?php echo $row['id']; ?>">
                          <?php echo $row['question']; ?>
                          <strong class="float-right"><?php echo $row['role']; ?></strong>
                        </a>
                       
                      </h4>
                    </div>
                    <div id="collapse<?php echo $row['id']; ?>" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                       <?php
                       echo $row['answer'];
                       ?>
                        <a class="btn btn-primary" href="?edit=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i> </a>
                  <a class="btn btn-warning" href="?del=<?php echo $row['id']; ?>"><i class="fa fa-trash"></i> </a>

                      </div>
                    </div>
                  </div>
                 
                  
                </td>
                
                 
                  
                </tr>
               <?php
                  }
               ?>
                </div> 
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
               
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
    </div>
   
      </div>
    </section>

</div>
<?php
include 'include/footer.php';
?>