<?php include ('public_header.php')  ?>


 <form class="form-horizontal"  id="" <?php echo form_open('login/admin_login');?> >

    <h1 style="text-align: center">Admin Login</h1>
     <hr>
     <?php if ($error=$this->session->flashdata('login_failed')): ?>
     <div class="row">

         <div class="col-lg-6">
             <div class="alert alert-danger">
                 <?= $error ?>
             </div>
         </div>
     </div>

  <?php endif; ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="userName">UserName:</label>
        <div class="col-sm-10">

            <?php echo form_input(['name'=>'userName','type'=>'text','id'=>'userName','class'=>'form-control','placeholder'=>'Enter Your User Name','value'=>set_value('userName')]);
           /* echo form_error('userName',"<p class='text-danger'>","</p>"); */
             echo form_error('userName');

            ?>
     <!--       <input type="text" class="form-control" id="userName" name="userName" placeholder="Enter Your User Name"> -->
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="password">Password:</label>
        <div class="col-sm-10">
           <!-- <?php echo form_error('password',"<p class='text-danger'>","</p>"); ?> -->
            <?php echo form_error('password'); ?>
            <?php echo form_password(['type'=>'password','class'=>'form-control','name'=>'password','id'=>'password','placeholder'=>'Enter Your Password']);?>
          <!--  <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your password"> -->
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo form_submit(['type'=>'submit','value'=>'Login','name'=>'Login','class'=>'btn btn-success']);?>
          <!--  <button type="submit" class="btn btn-default">Submit</button> -->
        </div>
    </div>
</form>




<?php include ('public_footer.php')  ?>



