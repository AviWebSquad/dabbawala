
            <?php
include 'include/header.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
         
<div class="card-body row">
          <div class="col-5 text-center d-flex align-items-center justify-content-center">
            <div class="">
              <h2>Spicizz<strong> Feedback</strong></h2>
              
              
            </div>
          </div>
          <div class="col-7">
            <div class="form-group">
              <label for="inputName">Name</label>
              <input type="text" id="inputName" class="form-control" />
            </div>
            <div class="form-group">
              <label for="inputEmail">E-Mail</label>
              <input type="email" id="inputEmail" class="form-control" />
            </div>
            <div class="form-group">
              <label for="inputSubject">Ratings</label>
              <select name="ratings" class="form-control">
              <option value="1">&bigstar;</option>
              <option value="2">&bigstar;&bigstar;</option>
              <option value="3">&bigstar;&bigstar;&bigstar;</option>
              <option value="4">&bigstar;&bigstar;&bigstar;&bigstar;</option>
              <option value="5">&bigstar;&bigstar;&bigstar;&bigstar;&bigstar;</option>
                

              </select>
            </div>

             <div class="form-group">
              <label for="inputMessage">Feedback/Suggestion</label>
              <textarea id="inputMessage" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Send message">
            </div>
          </div>
        </div>
</section>
</div>
<?php
include 'include/footer.php';
?>