<?PHP
$this->load->library('system/tbl/tbl_system');

$this->load->library('system/tbl/tbl_blog');

$table = new tbl_system();
$tbl_blog = new tbl_blog();
?>
<div class="container mtb">
    <div class="row">
        <div class="col-lg-6">
            <h4>More About Our .</h4>
            <p><?=$About_Us[$table->get_value()]?></p>
            <p><br/><a href="<?= site_url('site/about_us')?>" class="btn btn-theme">More Info</a></p>
        </div>

        <div class="col-lg-6">
            <h4>Latest Blog</h4>
            <div class="hline"></div>
            <?PHP foreach($blog as $row): ?>
            <p><a href="<?= site_url('site/id_blog/?row='.$row[$tbl_blog->get_id()])?>"><?= $row[$tbl_blog->get_title()]?></a></p>
            <?PHP endforeach; ?>
        </div>

    </div>
</div>