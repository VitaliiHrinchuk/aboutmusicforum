<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Панель адміністратора</title>

    <!-- Page level plugin CSS-->
    <link href="<?php echo PUBLIC_DIR?>/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->

    <link href="<?php echo PUBLIC_DIR?>/css/trumbowyg.min.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_DIR?>/css/admin.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_DIR?>/css/admin-own.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_DIR?>/css/datepicker.min.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_DIR?>/css/dropzone.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="<?php echo PUBLIC_DIR."/"?>js/jquery.min.js"></script>
    <script src="<?php echo PUBLIC_DIR?>/js/trumbowyg.min.js"></script>
    <script src="<?php echo PUBLIC_DIR?>/js/ua.min.js"></script>

</head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<body id="page-top" >

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Панель Адміністратора</a>
    <a class="nav-link ml-auto text-light" href="<?php echo WEBROOT."admin/logout"?>">Вихід</a>

</nav>
<div id="wrapper">

    <ul class="sidebar navbar-nav">

        <li class="nav-item">
            <a class="nav-link" href="<?php echo WEBROOT."admin/categories"?>">Категорії</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo WEBROOT."admin/users"?>">Список Користувачів</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo WEBROOT."admin/postList"?>">Список Публікацій</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo WEBROOT."admin/compositions"?>">Відомі композиції</a>
        </li>
        <span class="w-100 d-block border-bottom border-dark" style="height: 1px"></span>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo WEBROOT."admin/postCreate"?>">Створити Публікацію</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo WEBROOT."admin/compositionCreate"?>">Додати Композицію</a>
        </li>
    </ul>

    <div id="content-wrapper">
<?php

echo $content_for_layout;
?>
    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->
<!-- Bootstrap core JavaScript-->
<!--<script src="vendor/jquery/jquery.min.js"></script>-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Core plugin JavaScript-->

<!-- Page level plugin JavaScript-->
<script src="<?php echo PUBLIC_DIR?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo PUBLIC_DIR?>/js/dataTables.bootstrap4.min.js"></script>

<script>
    // function openNav() {
    //     document.getElementById("mySidenav").style.width = "250px";
    // }
    //
    // /* Set the width of the side navigation to 0 */
    // function closeNav() {
    //     document.getElementById("mySidenav").style.width = "0";
    // }
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });

</script>
</body>

</html>
