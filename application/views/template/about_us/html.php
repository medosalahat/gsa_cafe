<?PHP $tbl = new tbl_system(); ?>
<div class="container mtb">
    <div class="row">
        <div class="col-lg-6">
            <img class="img-responsive" src="<?= site_url('include\img\about_us\logo.jpg')?>" alt="">
        </div>
        <div class="col-lg-6">
            <h4><?= $Name_site[$tbl->get_value()] ?></h4>
            <?=$about_us ?>
            <p><br/><a href="<?= site_url('site/contact')?>" class="btn btn-theme">Contact Us</a></p>
        </div>
    </div>
</div>
