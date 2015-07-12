<?PHP
$this->load->library('system/tbl/tbl_system');
$table = new tbl_system();?>
<div id="footerwrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h4>About Us</h4>
                <div class="hline-w"></div>
                <p>
                   <?=$About_Us[$table->get_value()]?>
                </p>
            </div>
            <div class="col-lg-4">
                <h4>Social media </h4>
                <div class="hline-w"></div>
                <p>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-tumblr"></i></a>
                </p>
            </div>
            <div class="col-lg-4">
                <h4>Information</h4>
                <div class="hline-w"></div>
                <?= $Information_footer[$table->get_value()] ?>
            </div>
        </div>
    </div>
</div>