<!DOCTYPE html>
<html lang="en">
<head>
    <title>Website Administration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css(array('/admin/assets/admin/css/bootstrap.min', '/admin/assets/admin/css/bootstrap-theme.min', '/admin/assets/admin/css/styles', '/admin/fancybox/css/jquery.fancybox', '/admin/css/bootstrapValidator.min','/admin/strength_password/strength', '/admin/css/custom'));
    echo $this->Html->script(array('/admin/js/jquery-2.1.4.min', '/admin/assets/admin/js/bootstrap.min','/admin/assets/admin/js/main','/admin/fancybox/js/jquery.fancybox', '/admin/js/bootstrapValidator.min', '/admin/js/validator','/admin/js/tock.min.js','/admin/js/main.js','/admin/strength_password/strength','/admin/js/tinymce/tinymce.js'));
    $jsVars = array(
        'webroot' => $this->request->webroot,
        'webroot_admin' => $this->request->webroot."admin/",
    );
    echo $this->Html->scriptBlock('var window_app = ' . json_encode($jsVars) . ';');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');

    //echo $this->Js->writeBuffer();
    ?>

    <!--HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
<?php if (!empty($current_user)) { ?>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $this->request->webroot; ?>">Administration</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php
                    foreach ($menu_items as $key => $menu_item) {
                        if (empty($menu_item['allow_access']) || in_array($current_user['role'], $menu_item['allow_access']))
                        {
                            echo '<li '. ($key == $active_menu_item ? 'class="active"' : '') .'><a href="'. $menu_item['link'] .'">'. $menu_item['text'] .'</a></li>';
                        }
                    }
                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'logout']) ?>">Log out</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>

    </div>
<?php } ?>
<div class="container">
    <?php echo $this->Flash->render(); ?>
    <?php echo $this->fetch('content'); ?>

</div><!-- /.container -->
<?php
echo $this->element('logoutCountDown');
?>

<script>
    $(document).ready(function(){
        $('.fancybox').fancybox();
    });
    var SessionExprieIn = '<?php echo $SessionExprieIn ?>';
</script>
</body>
</html>