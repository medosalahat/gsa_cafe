<?PHP $tbl = new tbl_system(); ?>
<div class="container mtb">
    <div class="row">
        <div class="col-lg-8">
            <h4><?= $Name_site[$tbl->get_value()] ?></h4>
            <div class="hline"></div>
            <p class="spacing"></p>
            <?=$About_Us[$tbl->get_value()] ?>

            <p class="spacing"></p>

            <form role="form" action="<?= site_url('site/send_contact')?>" method="post" id="contact_form">
                <div class="form-group">
                    <label for="InputName">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="InputEmail">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="InputMobile">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-theme">Send</button>
            </form>
        </div>
        <div class="col-lg-4">
            <h4>Our Address</h4>
            <div class="hline"></div>
        <?= $Information_footer[$tbl->get_value()]?>
        </div>
    </div>
</div>