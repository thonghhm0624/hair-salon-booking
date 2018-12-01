<html>
<head>
    <title>Asset Management</title>
    <link href="assets/all.css" media="all" rel="stylesheet" />
</head>
<body>

<?php
include ('modules/header.php');
include ('modules/navbar.php');
include ('modules/home/block1.php');
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


<?php
    include ('modules/popup/popuplogin.php');
    include ('modules/popup/popup_reservation.php');
?>

<script src="assets/js/commons.bundle.js"></script>
<script src="assets/js/index.bundle.js"></script>

</body>
</html>
