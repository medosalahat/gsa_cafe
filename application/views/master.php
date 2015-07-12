<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?=site_url('include/ico/favicon.ico')?>">
    <title><?= $title ?></title>
    <link href="<?=site_url('include/css/bootstrap.css')?>" rel="stylesheet">
    <link href="<?=site_url('include/css/style.css')?>" rel="stylesheet">
    <link href="<?=site_url('include/css/font-awesome.min.css')?>" rel="stylesheet">
    <script src="<?=site_url('include/js/jquery-1.8.3.min.js')?>"></script>
    <link href="<?=site_url('include/css/bootstrapValidator.min.css')?>" rel="stylesheet">
    <script src="<?=site_url('include/js/bootstrap.min.js')?>"></script>
    <script src="<?=site_url('include/js/bootstrapValidator.js')?>"></script>
    <script src="<?=site_url('include/js/retina-1.1.0.js')?>"></script>
    <script src="<?=site_url('include/js/jquery.hoverdir.js')?>"></script>
    <script src="<?=site_url('include/js/jquery.hoverex.min.js')?>"></script>
    <script src="<?=site_url('include/js/jquery.prettyPhoto.js')?>"></script>
    <script src="<?=site_url('include/js/jquery.isotope.min.js')?>"></script>
    <script src="<?=site_url('include/js/custom.js')?>"></script>
    <!--[if lt IE 9]>

    <script src="<?php echo  site_url('include\libs\respond.min.js') ?>"></script>
    <script src="<?php echo  site_url('include\libs\html5shiv.js') ?>"></script>
    <![endif]-->
</head>
<body>
<?=$header?>
<?=$slider?>
<?=$service?>
<?=$portfolio?>
<?=$column?>
<?= $tab ?>
<?=$info?>
<?= $footer ?>

<script>
    // Portfolio
    (function($) {
        "use strict";
        var $container = $('.portfolio'),
            $items = $container.find('.portfolio-item'),
            portfolioLayout = 'fitRows';

        if( $container.hasClass('portfolio-centered') ) {
            portfolioLayout = 'masonry';
        }

        $container.isotope({
            filter: '*',
            animationEngine: 'best-available',
            layoutMode: portfolioLayout,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            },
            masonry: {
            }
        }, refreshWaypoints());

        function refreshWaypoints() {
            setTimeout(function() {
            }, 1000);
        }

        $('nav.portfolio-filter ul a').on('click', function() {
            var selector = $(this).attr('data-filter');
            $container.isotope({ filter: selector }, refreshWaypoints());
            $('nav.portfolio-filter ul a').removeClass('active');
            $(this).addClass('active');
            return false;
        });

        function getColumnNumber() {
            var winWidth = $(window).width(),
                columnNumber = 1;

            if (winWidth > 1200) {
                columnNumber = 5;
            } else if (winWidth > 950) {
                columnNumber = 4;
            } else if (winWidth > 600) {
                columnNumber = 3;
            } else if (winWidth > 400) {
                columnNumber = 2;
            } else if (winWidth > 250) {
                columnNumber = 1;
            }
            return columnNumber;
        }

        function setColumns() {
            var winWidth = $(window).width(),
                columnNumber = getColumnNumber(),
                itemWidth = Math.floor(winWidth / columnNumber);

            $container.find('.portfolio-item').each(function() {
                $(this).css( {
                    width : itemWidth + 'px'
                });
            });
        }

        function setPortfolio() {
            setColumns();
            $container.isotope('reLayout');
        }

        $container.imagesLoaded(function () {
            setPortfolio();
        });

        $(window).on('resize', function () {
            setPortfolio();
        });
    })(jQuery);
</script>
</body>
</html>

