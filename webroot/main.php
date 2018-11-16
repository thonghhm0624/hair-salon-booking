<html>
<head>
    <title>Asset Management</title>
    <link href="assets/all.css" media="all" rel="stylesheet" />
</head>
<body>

<?php
include ('modules/header.php');
include ('modules/navbar.php');
?>
<main role="main" class="container-fluid">
    <?php
    $page = isset($_REQUEST['page']) ? $_REQUEST['page']: 'home';
    include ('modules/'.$page.'.php');
    ?>
</main><!-- /.container -->
<?php
include ('modules/footer.php');
?>


<script src="assets/js/commons.bundle.js"></script>
<script src="assets/js/index.bundle.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>

</body>
</html>
