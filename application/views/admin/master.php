<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$name ?></title>
    <link href="<?= site_url('include/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?= site_url('include/admin/bower_components/metisMenu/dist/metisMenu.min.css')?>" rel="stylesheet">
    <link href="<?= site_url('include/admin/dist/css/sb-admin-2.css')?>" rel="stylesheet">
    <link href="<?= site_url('include/admin/dist/css/timeline.css')?>" rel="stylesheet">
    <link href="<?= site_url('include/admin/bower_components/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <script src="<?=site_url('include/js/jquery-1.8.3.min.js')?>"></script>
    <link href="<?=site_url('include/css/bootstrapValidator.min.css')?>" rel="stylesheet">
    <link href="<?=site_url('include/admin/me.css')?>" rel="stylesheet">
    <link href="<?=site_url('include/admin/bower_components/morrisjs/morris.css')?>" rel="stylesheet">
    <script src="<?=site_url('include/js/bootstrap.min.js')?>"></script>
    <script src="<?=site_url('include/js/bootstrapValidator.js')?>"></script>
    <script src="<?=site_url('include/js/jquery.bsAlerts.min.js')?>"></script>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?=$headers?>
<?=$columns?>
<?=$contents?>
<?=$footers?>
</body>
</html>