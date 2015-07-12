<?PHP
$this->load->library('system/tbl/tbl_slider');

$table = new tbl_slider();
?>
<div class="carousel slide" id="carousel-25647">
    <ol class="carousel-indicators">
        <?PHP $counter = 0 ; foreach($slider as $row): ?>
            <li data-slide-to="<?= $counter ?>" data-target ="<?= $counter ?>"></li>
        <?PHP  $counter++; endforeach; ?>
    </ol>
    <div class="carousel-inner">

        <?PHP $counter = 0 ; foreach($slider as $row): ?>

            <div class="item <?PHP  if($counter == 1) { ?>active<?PHP } ?>">
                <img alt="Carousel Bootstrap First" src="<?= site_url($row[$table->get_image()])?>" />
                <div class="carousel-caption">
                    <h4>
                        <?= $row[$table->get_title()]?>
                    </h4>
                    <p>
                        <?= $row[$table->get_text()]?>
                    </p>
                </div>
            </div>

            <?PHP  $counter++; endforeach; ?>

    </div> <a class="left carousel-control" href="#carousel-25647" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-25647" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>