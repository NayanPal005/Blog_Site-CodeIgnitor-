<?php include_once ('admin_header.php'); ?>


    <div class="container">
        <div class="col-lg-6 col-lg-3 col-lg-offset-2 ">

            <a href="<?= base_url('admin/add_article') ?>"  class="btn btn-success" ><span class="glyphicon glyphicon-plus"></span> Article</a>

        </div>


        <?php if ($feedback=$this->session->flashdata('feedback')): ?>
            <div class="row">

                <div class="col-lg-6">
                    <div class="alert alert-danger">
                        <?= $feedback ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Serial No</th>
                <th>Article</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

             <?php if (count($articles)) :
                 $count=$this->uri->segment(3,0);
          foreach($articles as $article) :
                 ?>


            <tr>
                <td><?= ++$count ?></td>
                <td><?= $article->title ?></td>
                <td>
                    <div class="row">
                        <div class="col-lg-2">
                    <?php echo anchor("admin/edit_article/{$article->id}","Edit",['class'=>'btn btn-warning'])?>
                        </div>
                        <div class="col-lg-2">
                  <!--  <button class="btn btn-warning">Edit</button> -->
                <!--
                amar nijer eta,,ar porere ta delete k ekta form create kore form er moddho diye patano
                    <?php echo anchor("admin/delete_article/{$article->id}","Delete",['class'=>'btn btn-danger'])?>
                    -->
                    <?=

                    form_open('admin/delete_article'),
                    form_hidden('articleId',$article->id),
                    form_submit(['name'=>'delete','type'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
                    form_close();

                    ?>
                        </div>
                    </div>
                </td>
            </tr>

          <?php endforeach; ?>
          <?php else: ?>
                <tr>
                    <td class="col-lg-3">No Record are available.</td>
                </tr>



           <?php  endif; ?>

            </tbody>
        </table>


        <?= $this->pagination->create_links(); ?>
        <!--
        <ul class="pagination">
            <li><a href="#"><</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li class="active"><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#"></a></li>
        </ul>
        -->
    </div>














<?php include_once ('admin_footer.php'); ?>