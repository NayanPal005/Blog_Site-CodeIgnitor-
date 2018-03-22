<?php include('admin_header.php') ?>


<form class="form-horizontal" id="" action="<?php echo base_url('admin/store_article') ?>"
      enctype="multipart/form-data" method="post">
    <?php echo form_hidden('user_id', $this->session->userData('user_id')) ?>


    <h1 style="text-align: center">Add Article</h1>
    <hr>


    <div class="form-group">
        <label class="control-label col-sm-2" for="article">Article Title:</label>
        <div class="col-sm-6">

            <?php echo form_input(['name' => 'title', 'type' => 'text', 'id' => 'title', 'class' => 'form-control', 'placeholder' => 'Enter Your Article Title', 'value' => set_value('title')]); ?>

            <!--  <?php echo form_error('title', "<p class='text-danger'>", "</p>"); ?> -->

            <?php echo form_error('title'); ?>


            <!--       <input type="text" class="form-control" id="userName" name="userName" placeholder="Enter Your User Name"> -->
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="article">Article Body:</label>
        <div class="col-sm-6">
            <!-- <?php echo form_error('body', "<p class='text-danger'>", "</p>"); ?> -->
            <?php echo form_error('body'); ?>
            <?php echo form_textarea(['type' => 'text', 'class' => 'form-control', 'name' => 'body', 'id' => 'body', 'placeholder' => 'Details Here', 'value' => set_value('body')]); ?>
            <!--  <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your password"> -->
        </div>
    </div>
    <!--===================================for image====================================================================-->

    <div class="form-group">
        <label class="control-label col-sm-2" for="article">Article Body:</label>
        <div class="col-sm-6">
            <!-- <?php echo form_error('userFile', "<p class='text-danger'>", "</p>"); ?> -->
            <?php echo form_error('userFile'); ?>
            <?php /*echo form_upload(['type' => 'file', 'class' => 'form-control', 'name' => 'userFile', 'id' => 'userFile']); */ ?>
            <input type="file" name="userFile" class="form-control">
            <!--  <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your password"> -->
        </div>
    </div>


    <!--===================================for image==================================================================-->

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo form_submit(['type' => 'submit', 'value' => 'ADD', 'name' => 'ADD', 'class' => 'btn btn-success']); ?>
            <!--  <button type="submit" class="btn btn-default">Submit</button> -->
        </div>
    </div>
</form>


<?php include('admin_footer.php') ?>



