<?PHP $table = new tbl_cafe(); ?>
<div id="service">
    <div class="container">
        <div class="row centered">
            <?PHP foreach ($cafe as $row): ?>
                <div class="col-md-4">
                    <img src="<?= $row[$table->get_logo()] ?>" style="width: 60%" class="img-responsive img-thumbnail"/>
                    <h4><?= $row[$table->get_name()] ?></h4>

                    <p><?= $row[$table->get_short_description()] ?></p>

                    <p><br/><a href="<?= site_url('site/cafe/?id=') . $row[$table->get_id()] ?>" class="btn btn-theme">More
                            Info</a></p>
                </div>
            <?PHP endforeach; ?>

        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <hr>
        </div>
    </div>
</div>