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
            <a class="navbar-brand" href="#">Admin Panel</a>
        </div>
        <ul class="nav navbar-nav">
            <!--
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
            -->
            <li>
                <a href="<?= base_url('login/logout') ?>"  ><span class="glyphicon glyphicon-log-in"></span> Logout</a>
            </li>

        </ul>
        <form class="navbar-form navbar-left" action="/action_page.php">


           <!-- <button type="submit" class="btn btn-default">Submit</button> -->


        </form>
    </div>
</nav>
