<?php
$type="kitchen_media";
$page="Setup Kitchen";
$title="Kitchen";
$description="My Kitchen";
$master="";
$imgPath = "image/";

include 'include/header.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
       
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
      <div class="container-fluid">
    <!-- Content Header (Page header) -->
      <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Setup your kitchen</h3>
              </div>
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step <?php echo ($_GET['step']=='basic')?'active':''; ?>" data-target="#logins-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Basic Details</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step <?php echo ($_GET['step']=='media')?'active':''; ?>" data-target="#information-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Media</span>
                      </button>
                    </div>

                    <div class="line"></div>
                   
                    <div class="step <?php echo ($_GET['step']=='location')?'active':''; ?>" data-target="#location-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="location-part" id="location-part-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Location & Contact</span>
                      </button>
                    </div>
                    <div class="line"></div>
                   
                    <div class="step <?php echo ($_GET['step']=='final')?'active':''; ?>" data-target="#final-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="final-part" id="final-part-trigger">
                        <span class="bs-stepper-circle">4</span>
                        <span class="bs-stepper-label">Finish</span>
                      </button>
                    </div>
                  </div>
                  <form class="bs-stepper-content" action="<?php echo "setup.php?step=".$_GET['step']."&token=".$_GET['token']; ?>" method="post" enctype="multipart/form-data">
                    <!-- your steps content here -->
                    <div id="logins-part" class="content <?php echo ($_GET['step']=='basic')?'active dstepper-block':''; ?>" role="tabpanel" aria-labelledby="logins-part-trigger">
                    <div class="custom-file">

                        <input type="file" class="custom-file-input" id="exampleInputEmail1" name="image" placeholder="Enter Name">
                        <label class="custom-file-label" for="exampleInputFile">Choose Kitchen Icon</label>
                        
                      </div>
                      
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kitchen Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="title">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Kitchen description</label>
                        <textarea class="form-control" name="description"></textarea>
                      </div>
                      <div class="form-group" >
                        <label for="exampleInputEmail1">Food Type</label>
                        <select class="form-control" name="ftype">
                        <option value="Veg">Veg</option>
                        <option value="Non-Veg">Non-Veg</option>
                        <option value="Both">Both</option>
                          
                        </select>
                      </div>
                    
                      <button class="btn btn-warning" type="submit" name="basic">Save & Next</button>
                    </div>
                    <!--Media part-->
                    <div id="information-part" class="content <?php echo ($_GET['step']=='media')?'active dstepper-block':''; ?>" role="tabpanel" aria-labelledby="information-part-trigger">
                    <?php
                    if(isset($error)){

                    }else{
                      include 'include/alert.php';

                    }
                    ?> 
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="media[]" multiple>
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div> 
                          <div class="input-group-append">
                            <button type="submit" name="uploadadd" class="input-group-text">Upload</button>
                          </div>
                        </div>

                      <br>
                        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Media List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Image</th>
                      <th>Visible</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $qrk="select * from tbl_kitchen_media where user_id=$userid and kitchen_id=".$_SESSION['kid'];
                    $sqlk=mysqli_query($con,$qrk);
                    $k=0;
                    while ($row = mysqli_fetch_array($sqlk)) {

                    $k=$k+1;
                    ?>
                    <tr>
                      <td><?php echo $k; ?></td>
                      <td><img src="image/<?php echo $row['media'] ?>" width="100px" ></td>
                      <td>
                      <a href="?step=media&token=<?php echo $_GET['token']; ?>&status=<?php echo $row['id']; ?>" class="badge <?php echo ($row['status']==1)?'bg-primary':'bg-warning'; ?>"><?php echo ($row['status']==1)?'Visible':'In-visible'; ?></a>
                      </td>
                      <td>
                      <a href="?step=media&token=<?php echo $_GET['token']; ?>&del=<?php echo $row['id']; ?>" class="btn btn-warning"><i class="fa fa-trash"></i></a>
                      
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
                      </div>
                      <a href="?token=<?php echo $_GET['token']; ?>&step=basic" class="btn btn-warning" >Previous</a>
                     
                      <button class="btn btn-warning" type="submit" name="media">Save & Next</button>
                     </div>
                    <!--Location part-->
                    <div id="location-part" class="content <?php echo ($_GET['step']=='location')?'active dstepper-block':''; ?>" role="tabpanel" aria-labelledby="location-part-trigger">
                    <?php
                    include 'include/alert.php';
                    ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Area Code</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Code" name="pincode">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Kitchen Address</label>
                        <textarea class="form-control" name="address"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">State</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter State" name="state">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">City</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter City" name="city">
                      </div>
                      <a href="?token=<?php echo $_GET['token']; ?>&step=media" class="btn btn-warning" >Previous</a>
                     
                      <button class="btn btn-warning" type="submit" name="location">Save & Next</button>
                   
                    </div>
                    <!--Final part-->
                    <div id="final-part" class="content <?php echo ($_GET['step']=='final')?'active dstepper-block':''; ?>" role="tabpanel" aria-labelledby="final-part-trigger">
                   
                    <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Terms of Service</h3>
              </div>
              <div class="card-body">
                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
              </div>
              <div class="card-footer">
               
              <input type="checkbox"  id="acpt"/> I agree with terms of service.
            
            </div> 
            </div>
          </div>
          </div>
                    
                    
                      <a href="?token=<?php echo $_GET['token']; ?>&step=location" class="btn btn-warning" >Previous</a>
                     <button type="submit" class="btn btn-warning" name="final" id="go" disabled>Go to your kitchen</button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
               </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
</div>
</section>
</div>
<?php
include 'include/footer.php';
?>