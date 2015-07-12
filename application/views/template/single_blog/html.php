<?PHP
$table = new tbl_blog();
?>
<div class="container mtb">
    <div class="row">
        <div class="col-lg-12">
            <p><img class="img-responsive image_blog" src="<?=site_url($blog[$table->get_image()])?>"></p>
            <h3 class="ctitle"><?=$blog[$table->get_title()]?></h3>
            <blockquote>
                <?=$blog[$table->get_text()]?>
            </blockquote>
            <div class="spacing"></div>
            <h6>SHARE:</h6>
            <p class="share">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
            </p>

        </div>
    </div>
</div>
