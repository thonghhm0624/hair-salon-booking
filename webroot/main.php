<html>
<head>
    <title>Asset Management</title>
    <link href="assets/all.css" media="all" rel="stylesheet" />
</head>
<body>

<?php
include ('modules/header.php');
?>
<main role="main" class="container">
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

</body>
</html>
