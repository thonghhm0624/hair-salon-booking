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

//    echo $this->Html->css(array('/admin/assets/admin/css/bootstrap.min', '/admin/assets/admin/css/bootstrap-theme.min', '/admin/assets/admin/css/styles', '/admin/fancybox/css/jquery.fancybox', '/admin/css/bootstrapValidator.min','/admin/strength_password/strength', '/admin/css/custom'));
//    echo $this->Html->script(array('/admin/js/jquery-2.1.4.min', '/admin/assets/admin/js/bootstrap.min','/admin/assets/admin/js/main','/admin/fancybox/js/jquery.fancybox', '/admin/js/bootstrapValidator.min', '/admin/js/validator','/admin/js/tock.min.js','/admin/js/main.js','/admin/strength_password/strength','/admin/js/tinymce/tinymce.js'));
    $jsVars = array(
        'webroot' => $this->request->webroot,
        'webroot_admin' => $this->request->webroot."admin/",
    );
    echo $this->Html->scriptBlock('var window_app = ' . json_encode($jsVars) . ';');
    echo $this->fetch('meta');
//    echo $this->fetch('css');
//    echo $this->fetch('script');

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=kbm6zdz1xlqa37vz25yyozh32xzv8sjr7elt081wluft8e6f"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/todc-bootstrap/3.3.7-3.3.13/css/bootstrap-theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/todc-bootstrap/3.3.7-3.3.13/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/todc-bootstrap/3.3.7-3.3.13/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/todc-bootstrap/3.3.7-3.3.13/css/bootstrap.min.css">

    <style>
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #eee;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }
        .form-signin .checkbox {
            font-weight: normal;
        }
        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            /*  margin-bottom: -1px;
              border-bottom-right-radius: 0;
              border-bottom-left-radius: 0;*/
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            /*  border-top-left-radius: 0;
              border-top-right-radius: 0;*/
        }

        div.input {
            margin-top: 10px;
        }

        body{ padding: 70px 0px; }

        .form-group .input.checkbox input[type="checkbox"] {
            display: inline-block;
            width: 15px !important;
            margin-top: -6px;
            webkit-box-shadow:none;
            box-shadow:none;
        }

        .form-group .input.file input[type="file"] {
            width: auto;
        }

        .form-group .input.number input[type="number"] {
            width: auto;
        }

        .form-group img.thumbnail, .form-group video.thumbnail {
            margin-top: 5px;
            max-height: 250px;
        }

        .form-group select.form-control {
            width: auto;
        }


        td img.thumbnail {
            margin-bottom: 0px;
        }

        .word-wrap-on {
            white-space: pre-wrap; /* css-3 */
            white-space: -moz-pre-wrap; /* Mozilla, since 1999 */
            white-space: -pre-wrap; /* Opera 4-6 */
            white-space: -o-pre-wrap; /* Opera 7 */
            word-wrap: break-word; /* Internet Explorer 5.5+ */
            word-break: break-all;
        }

        .form-group .input.datetime label, .form-group .input.date label {
            display: block;
        }
        .form-group .input.datetime select, .form-group .input.date select {
            display: inline;
            margin-left:2px;
            margin-right:2px;
        }
        #files img{box-shadow: 1px 1px 3px #555; height: 100px;}
        #files{display: inline-block; position: relative;}
        #files a.delete{margin: 3px; padding: 2px 3px 0 2px; position: absolute; right:0px}
        #files p{float: left; margin: 5px 10px 5px 0; position: relative;}
        .center-middle{text-align: center; vertical-align: middle !important;}
        .center{text-align: center;}
        .middle{vertical-align: middle !important;}
        .pointer{cursor:pointer}
    </style>
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

    $(document).ready(function() {
        $('#authMessage[class="message"]').wrap('<div class="alert alert-danger"></div>');
        // $('#flashMessage').wrap('<div class="alert alert-info"></div>');

        $('.form-control[required]').each(function() {
            $(this).prev().html($(this).prev().html() + ' *');
        });
    });

    var SessionExprieIn = '<?php echo $SessionExprieIn ?>';
</script>
</body>
</html>