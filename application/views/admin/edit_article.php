<?php include ('admin_header.php')  ?>



<form class="form-horizontal"  id="" <?php echo form_open('admin/update_article');?>

        <?php echo form_hidden('articleId',$getarticle->id);?>

>








    <h1 style="text-align: center">EDIT Article</h1>
    <hr>


    <div class="form-group">
        <label class="control-label col-sm-2" for="article">Article Title:</label>
        <div class="col-sm-6">

            <?php echo form_input(['name'=>'title','type'=>'text','id'=>'title','class'=>'form-control','placeholder'=>'Enter Your Article Title','value'=>set_value('title',$getarticle->title)]); ?>

            <!--  <?php echo form_error('title',"<p class='text-danger'>","</p>"); ?> -->

            <?php echo form_error('title'); ?>


            <!--       <input type="text" class="form-control" id="userName" name="userName" placeholder="Enter Your User Name"> -->
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="article">Article Body:</label>
        <div class="col-sm-6">
            <!-- <?php echo form_error('body',"<p class='text-danger'>","</p>"); ?> -->
            <?php echo form_error('body'); ?>
            <?php echo form_textarea(['type'=>'text','class'=>'form-control','name'=>'body','id'=>'body','placeholder'=>'Details Here','value'=>set_value('body',$getarticle->body)]);?>
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
            <?php echo form_submit(['type'=>'submit','value'=>'EDIT','name'=>'EDIT','class'=>'btn btn-warning']);?>
            <!--  <button type="submit" class="btn btn-default">Submit</button> -->
        </div>
    </div>
</form>




<?php include ('admin_footer.php')  ?>



