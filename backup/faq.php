<?php
include 'include/header.php';
?>
 <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">FAQ</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                <div id="accordion">
                  <?php 
                   $fetchmaster="select * from tbl_faq where status=1 and role='buyer' or role='both'";
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
                        </a>
                      </h4>
                    </div>
                    <div id="collapse<?php echo $row['id']; ?>" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                       <?php
                       echo $row['answer'];
                       ?>
                       
                      </div>
                    </div>
                  </div>
                 
                  
                </td>
                
                 
                  
                </tr>
               <?php
                  }
               ?>
                </div> 
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
         
        </div>
<?php
include 'include/footer.php';
?>