<?php
$type="item";
$master="Items";
$page="Item";
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
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="name" value="<?php echo (isset($editData['name']))?$editData['name']:''; ?>">
                  </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                    
                 <textarea id="summernote" name="description">
                 <?php echo (isset($editData['description']))?$editData['description']:''; ?>
              </textarea>
                   </div>
                   <div class="form-group">
                   <div class="row">
                  <div class="col-6">
                  <label for="exampleInputEmail1">Price</label>
                 
                    <input type="number" class="form-control" name="price" value="<?php echo (isset($editData['price']))?$editData['price']:''; ?>">
                  </div>
                  <div class="col-6">
                  <label for="exampleInputEmail1">Avl Price</label>
                 
                    <input type="number" class="form-control" name="avl_price" value="<?php echo (isset($editData['avl_price']))?$editData['avl_price']:''; ?>">
                  </div>
                  
                </div></div>
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image" required>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                      </div>
                    <?php
        if(isset($editData)){  
			if(file_exists($imgPath.$editData['image']) && !empty($editData['image'])){
				?>
				<img src="<?php echo $imgPath.$editData['image']; ?>" width="100"/>
				<?php
				}else echo "No Image found.";
				?>
                <input type="hidden" name="oldImage" value="<?php echo $editData['image'];?>" />
                <?php
			}
		?>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="stock_flag" value="1" <?php echo (isset($editData) && $editData['stock_flag']==1)?'checked':'' ?>>
                    <label class="form-check-label" for="exampleCheck1" >In Stock</label>
                  </div><div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status" value="1" <?php echo (isset($editData) && $editData['status']==1)?'checked':'' ?>>
                    <label class="form-check-label" for="exampleCheck1" >Visible</label>
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <?php
    if(isset($editData)){
	?>
                  <button type="submit" class="btn btn-success" name="u_<?php echo $type; ?>">Update Item</button>

   <input type="hidden" name="id" value="<?php echo $editData['id'];?>" />
                  <?php
	}else{
	  ?>
                  <button type="submit" class="btn btn-primary" name="c_<?php echo $type; ?>">Add Item</button>

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
                  <th>Id</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Price</th>
                  <th>Stock Flag</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                   $fetchmaster="select * from tbl_".$type;
                   $getdata=mysqli_query($con,$fetchmaster);
                   $i=0;
                  while($row=mysqli_fetch_array($getdata)){
                    $i=$i+1;
                  ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo substr($row['description'],0,10).'...'; ?>
                  </td>
                  <td><img src='<?php echo $imgPath.$row['image']; ?>' style='width:90px;' /></td>
                  <td><?php echo $row['price']; ?></td>
                  <td><?php echo ($row['stock_flag']==1)?'<span class="badge bg-danger">In Stock</span>':'<span class="badge bg-success">Out of Stock</span>'; ?></td>
                  <td><a href="?status=<?php echo $row['id']; ?>"><?php echo ($row['status']==1)?'<span class="badge bg-primary">Visible</span>':'<span class="badge bg-warning">In-Visible</span>'; ?></td>
                  <td><?php echo substr($row['action_date'],0,10); ?></td>
                  <td>
                  <a class="btn btn-primary" href="?edit=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i> </a>
                  <a class="btn btn-warning" href="?del=<?php echo $row['id']; ?>"><i class="fa fa-trash"></i> </a>

                  </td>
                </tr>
               <?php
                  }
               ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                <th>Name</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Price</th>
                  <th>Stock Flag</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Action</th>
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