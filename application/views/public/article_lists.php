<?php include ('public_header.php')  ?>


<div class="container">

    <h1 style="text-align: center">Article Lists</h1>
    <hr>

    <table class="table table-striped">


        <thead>
        <tr>
            <th>Serial No</th>
            <th>Article Title</th>
            <th>Published Date</th>

        </tr>
        </thead>
        <tbody>
        <?php
        if (count($articles)):
            $count=$this->uri->segment(3,0);
        foreach ($articles as $article):
        ?>
            <tr>
                <td><?= ++$count ?></td>
                <td><?=$article->title?></td>
                <td><?= "date"?></td>


            </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td class="col-lg-3">No Record are available.</td>
            </tr>
        <?php  endif; ?>
        </tbody>
    </table>

   <?=$this->pagination->create_links(); ?>
   <!--
    <ul class="pagination">
        <li><a href="#">1</a></li>
        <li class="active"><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
    </ul>

    -->




</div>
<?php include ('public_footer.php')  ?>



