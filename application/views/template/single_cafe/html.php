<?PHP
$table = new tbl_cafe();
$tbl_cafe_gallery = new tbl_cafe_gallery();
$tbl_cafe_comment = new tbl_cafe_comment();
$tbl_user = new tbl_users();
?>
<script src="http://maps.googleapis.com/maps/api/js"></script>

<script>
    var myCenter=new google.maps.LatLng(<?=$cafe[$table->get_x_map()]?>,<?=$cafe[$table->get_y_map()]?>);

    function initialize()
    {
        var mapProp = {
            center:myCenter,
            zoom:10,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };

        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

        var marker=new google.maps.Marker({
            position:myCenter,
        });

        marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div id="blue">
    <div class="container">
        <div class="row">
            <h3>
                <?=$cafe[$table->get_name()]?>
            </h3>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 centered">
            <div id="" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?PHP $counter = 0 ; foreach($cafe_gallery as $row): ?>
                        <li data-target="" data-slide-to="<?= $row[$tbl_cafe_gallery->get_id()]?>" <?PHP if( $counter == 0 ){ ?> class="active" <?PHP } ?>></li>
                    <?PHP $counter=1; endforeach; ?>
                </ol>
                <div class="carousel-inner">
                    <?PHP $counter = 0 ; foreach($cafe_gallery as $row): ?>
                        <div class="item <?PHP if( $counter == 0 ){ ?> active <?PHP } ?>">
                            <img src="<?= site_url($row[$tbl_cafe_gallery->get_image()])?>" alt="">
                        </div>
                        <?PHP $counter=1; endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-11 col-lg-offset-1">
            <img src="<?= site_url($cafe[$table->get_logo()])?>" class="img-responsive" style="width: 10%"/>
        </div>
        <div class="col-lg-5 col-lg-offset-1">
            <div class="spacing"></div>
            <h4><?=$cafe[$table->get_name()]?> Is : </h4>
            <p><?=$cafe[$table->get_short_description()]?></p>
            <h4>About <?=$cafe[$table->get_name()]?></h4>
            <p><?= $cafe[$table->get_description()]?></p>
            <p>Comment : </p>
            <hr>
            <?PHP foreach($cafe_comment as $row): ?>
                <div class="media">
                     <a href="https://www.facebook.com/<?=$row[$tbl_user->get_id_fb()]?>" target="_blank" class="pull-left">
                        <img  src="https://<?= ($row[$tbl_user->get_image()])?>" class="media-object" />
                     </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <a href="https://www.facebook.com/<?=$row[$tbl_user->get_id_fb()]?>" target="_blank">
                                <?= $row[$tbl_user->get_name()]?>
                            </a>
                        </h4>
                        <?= $row[$tbl_cafe_comment->get_comment()]?>
                    </div>
                </div>
                <hr>
            <?PHP endforeach; ?>

            <?PHP if($is_login):?>
            <form action="<?= site_url('site/set_new_comment')?>" method="post" id="add_comment">
                <input type="hidden" name="id_cafe" id="id_cafe" value="<?= $_GET['id']?>"/>
                <div class="form-group">
                    <label for="Add Comment">Add Comment</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-theme">Save</button>
            </form>
            <?PHP else: ?>
                <a href="<?=$link_login?>" class="btn btn-sm btn-primary">Login Facebook</a>
            <?PHP endif; ?>
        </div>
        <div class="col-lg-4 col-lg-offset-1">
            <div class="spacing"></div>

            <h4><?=$cafe[$table->get_name()]?>  Details</h4>
            <div class="hline"></div>
            <p><b><?= $table->get_phone()?> : </b> <?=$cafe[$table->get_phone()]?> </p>
            <p><b><?= $table->get_mobile()?> : </b> <?=$cafe[$table->get_mobile()]?> , <?=$cafe[$table->get_mobile_two()]?> </p>
            <p><b> Address : </b> <?=$cafe[$table->get_full_address()]?> </p>
            <p>Map :</p>
            <div id="googleMap" style="width: auto;height: 300px"></div>
        </div>
    </div>
</div>
<div class="container"><div class="row"><div class="col-lg-12"><div class="hline"></div> </div> </div> </div>
