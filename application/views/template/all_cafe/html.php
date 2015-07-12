<?PHP $table = new tbl_cafe(); ?>
<div class="container mtb">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 centered">
            <h2>Our cafe.</h2>
            <br>

            <div class="hline"></div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div id="portfoliowrap">
                <div class="portfolio-centered">
                    <div class="recentitems portfolio">
                        <?PHP foreach ($cafe as $row): ?>
                            <div class="portfolio-item graphic-design">
                                <div class="he-wrap tpl6">
                                    <img src="<?= site_url($row[$table->get_logo()]) ?>" alt="">

                                    <div class="he-view">
                                        <div class="bg a0" data-animate="fadeIn">
                                            <h3 class="a1"
                                                data-animate="fadeInDown"><?= $row[$table->get_name()] ?></h3>
                                            <a data-rel="prettyPhoto" href="<?= site_url($row[$table->get_logo()]) ?>"
                                               class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                                            <a href="<?= site_url('site/cafe/?id=' . $row[$table->get_id()]) ?>"
                                               class="dmbutton a2" data-animate="fadeInUp"><i
                                                    class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?PHP endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>