<!DOCTYPE html>
<html>
<head>
    <title>Codeignitor blog site project</title>
    <!-- Static Linking local;host bole diye jeta uchit na :)
    <link rel="stylesheet" type="text/css" href="http://localhost:63342/CodeIgnitor-Project/Assets/css/bootstrap.min.css"> -->
    <!-- using base_url
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ;?>">
    -->
    <!-- using html_tag -->
    <?= link_tag('assets/bootstrap/css/bootstrap.min.css') ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?= base_url('Assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <!--
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    -->
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Nayan's Blog</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <!--
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            -->
        </ul>

      <!--  <form class="navbar-form navbar-left" action="/action_page.php"> -->
             <!--
            <div class="form-group">
               <input type="text" class="form-control" placeholder="Search">

            </div>
            -->
            <?= form_open('user/search',['class'=>'navbar-form navbar-text','role'=>'search'])?>
        <div class="form-group">
            <input type="text" name="query"  class="form-control" placeholder="Search">

        </div>

            <button type="submit" class="btn btn-default">Search</button>

    <?=  form_close();?>
        <?= form_error('query','<p class="navbar-text" style="color: #ff0000">','</p>') ?>
    </div>
</nav>
