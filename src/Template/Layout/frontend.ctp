<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="<?php echo $language ?>"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="<?php echo $language ?>"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="<?php echo $language ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="<?php echo $language ?>">
<!--<![endif]-->
<head>
<!-- Basic Page Needs
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<?php echo $this->Html->charset(); ?>



    <?php
  	echo $this->element('includes/meta_tags');
?>
<?php
	echo $this->Html->meta('icon');
	//echo $this->Html->css('all');
	echo $this->fetch('meta');
	echo $this->fetch('css');
?>
<?php 
    $jsVars = array(
        'webroot' => $this->request->webroot,
		'webroot_full' => $webroot_full,
        'language' => $language, 
        'device_info' => $device_info,
		'device_info_type'=>$device_info_type,
        'web_browser' => $web_browser,
		'environment'=> $environment,
    );
    echo $this->Html->scriptBlock('var window_app = ' . json_encode($jsVars) . ';'); 
	echo $this->element('includes/all_js_css');
?>
<!--    <script src="--?//= $this->request->webroot ?><!--js/lib/recaptcha_api.js" async defer></script>-->

</head>
<body class="<?= $action ?> <?php echo $device_info ?> <?php echo $device_info_type ?> <?php echo 'language_'.$language ?>">
<div class="super_container">

<?php echo $this->element('modules/header_footer/header');?>
<?php echo $this->element('modules/components/navbar');?>
<?php echo $this->element('modules/components/home/block1');?>

	<?php echo $this->fetch('content'); ?>
<?php echo $this->element('modules/header_footer/footer');?>
<?php echo $this->element('modules/components/popup/popuplogin');?>
<?php echo $this->element('modules/components/popup/popup_reservation');?>

</div>

<script src="<?php echo $this->request->webroot ?>assets/js/commons.bundle.js"></script>
<script src="<?php echo $this->request->webroot ?>assets/js/index.bundle.js"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>-->

</html>