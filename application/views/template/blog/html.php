<?PHP $tbl = new tbl_blog(); ?>
<div class="container mtb">
    <div class="row">

        <div class="col-lg-12">
            <?PHP foreach($blog as $row): ?>
            <p><img class="img-responsive" src="<?= site_url($row[$tbl->get_image()])?>"></p>

                <a href="<?= site_url('site/get_blog/?id='.$row[$tbl->get_id()])?>">
                    <h3 class="ctitle">
                        <?= $row[$tbl->get_title()]?>
                    </h3>
                </a>
                <p><?PHP
                    $sys = new method_array($row[$tbl->get_text()],400);
                    echo $sys->split_on();
                    ?></p>
            <p><a href="<?= site_url('site/get_blog/?id='.$row[$tbl->get_id()])?>" class="btn btn-primary btn-sm">[Read More]</a></p>
            <div class="hline"></div>
            <div class="spacing"></div>
            <?PHP endforeach; ?>
        </div>

    </div>
</div>