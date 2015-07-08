<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="<?=base_url()?>assets/image/system-images/favicon.ico">
    <title><?= $title ?></title>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-114.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-144.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link href="<?= base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/bootstrapValidator.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/style.css" rel="stylesheet">
    <script src="<?= base_url()?>assets/js/jquery-1.8.3.min.js"></script>
    <script src="<?= base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>assets/js/bootstrapValidator.js"></script>
    <script src="<?= base_url()?>assets/js/ie10-viewport-bug-workaround.js"></script>
    <!--[if lt IE 9]><script src="<?= base_url()?>assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?= base_url()?>assets/js/ie-emulation-modes-warning.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?= $header?>
<div class="container">
    <div class="row">
        <?=$column?>
        <?= $contant ?>
    </div>
</div>

</body>
</html>