<?php
                if(isset($info)){
                    ?>
                <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> Alert!</h5>
                  <?php echo $info; ?>
                </div>
                <?php
                }
                if(isset($error)){
                ?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                  <?php
                  echo $error;
                  ?>
                </div>
                <?php
                }
                if(isset($success)){
                ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  <?php
                  echo $success;
                  ?>
                </div>
                <?php
                }
                ?>