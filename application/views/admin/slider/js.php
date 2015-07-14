<?PHP $tbl = new tbl_slider() ?>
<link href="<?= site_url('include/admin/bower_components/bootstrap-table/bootstrap-table.css') ?>" rel="stylesheet">
<script src="<?= site_url('include/admin/bower_components/bootstrap-table/bootstrap-table.js') ?>"></script>
<script type="text/javascript">

    var url_site = '<?= site_url() ?>'

    function <?=$tbl->get_display()?>_change(value, row) {

        if (value == 1) {
            return '<input onchange="status(' + row.<?=$tbl->get_id()?> + ',0)" type="checkbox" checked="true"/>';
        }
        return '<input onchange="status(' + row.<?=$tbl->get_id()?> + ',1)" type="checkbox"/>';
    }


    function <?=$tbl->get_image()?>_formatter(value) {


        return '<img src="'+url_site+value+'" class="img-responsive" style="width: 120px"/>';
    }


    function status(id, value) {
        $.post('<?= site_url('admin/home/change_slider_status')?>', {
            id: <?=$tbl->get_id()?>,
            status: value
        }, function (result) {
            var $table = $('#table');
            $table.bootstrapTable('showLoading');
            $table.bootstrapTable('refresh');
        });
    }



</script>
<script type="text/javascript">
    function <?=$tbl->get_table()?>_formatter() {
        return [
            '<a class="remove ml10" href="javascript:void(0)" title="Remove cafe" style="margin-right:4px">',
            '<i class="fa fa-remove fa-2x"></i>',
            '</a>',
            '<a class="edit ml10" href="javascript:void(0)" title="Edit cafe Info" style="margin-right:4px">',
            '<i class="fa fa-edit fa-2x"></i>',
            '</a>',
            '<a class="edit_image ml10" href="javascript:void(0)" title="Image" style="margin-right:4px">',
            '<i class="fa fa-picture-o fa-2x"></i>',
            '</a>'
        ].join('');
    }
    window.<?=$tbl->get_table()?>_events = {
        'click .remove': function (e, value, row, index) {
            var confirms = confirm('Are you sure you to delete this Blog ?');
            if (confirms) {
                $.post('<?= site_url('admin/home/delete_slider')?>',
                    {id: row.<?=$tbl->get_id()?>}, function (data) {
                        var $table = $('#table');
                        $table.bootstrapTable('showLoading');
                        $table.bootstrapTable('refresh');
                    });
            }
        },
        'click .edit': function (e, value, row, index) {
            $('#edit_<?= $tbl->get_id() ?>').val(row.<?= $tbl->get_id() ?>);
            $('#edit_<?= $tbl->get_title() ?>').val(row.<?= $tbl->get_title() ?>);
            $('#edit_<?= $tbl->get_text() ?>').val(row.<?= $tbl->get_text() ?>);
            $('#edit_row').modal('show');
        },
        'click .edit_image': function (e, value, row, index) {
            $('#upload_<?= $tbl->get_id() ?>').val(row.<?= $tbl->get_id() ?>);
            $('#upload_<?= $tbl->get_image() ?>').attr('src', '<?=site_url()?>' + row.<?= $tbl->get_image() ?>);
            $('#edit_image').modal('show');
        }
    };
</script>
<script type="text/javascript">
    $('#form_edit_slider').bootstrapValidator({
        message: 'This value is not valid', feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            'edit_title':{validators: {notEmpty: {message: ''}}},
            'edit_text':{validators: {notEmpty: {message: ''}}}
        }
    }).on('success.form.bv', function (e) {

        e.preventDefault();

        var $form = $(e.target);

        var bv = $form.data('bootstrapValidator');

        $.post($form.attr('action'), $form.serialize(), function (data) {

            var result = JSON.parse(data);

            $('#edit_cafe').modal('hide');

            if(result['valid']){
                $(document).trigger("add-s", [{'message': result['message'],'priority': 'success'}]);

            }
            else
            {
                $(document).trigger("add-s",[{'message':result['message'],'priority':'error'}]);
            }
        }).fail(function(){alert("Erorr");});});
</script> <?php // edit slider text  ?>

<script type="text/javascript">
    var url = '<?= site_url('admin/home/change_image_slider')?>';
    $(document).ready(function (e) {
        $("#add_new_image").on('submit', (function (e) {
            e.preventDefault();

            $.ajax({
                url: url, type: "POST", data: new FormData(this), contentType: false, cache: false, processData: false,
                success: function (data) {
                    var result = JSON.parse(data);
                    if (result['valid']) {
                        var $table = $('#table');
                        $table.bootstrapTable('showLoading');
                        $table.bootstrapTable('refresh');
                        setTimeout($('#edit_image_cafe').modal('hide'), 15000);
                        $(document).trigger("add-alerts", [{'message': result['message'], 'priority': 'success'}]);
                    }
                    else {
                        $(document).trigger("add-alerts", [{'message': result['message'], 'priority': 'error'}]);
                    }
                }
            });
        }));
        $(function () {
            $("#upload_file").change(function () {
                $("#message").empty(); // To remove the previous error message
                var file = this.files[0];
                var imagefile = file.type;
                var match = ["image/jpeg", "image/png", "image/jpg"];
                if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                    $('#upload_<?= $tbl->get_image() ?>').attr('src', 'noimage.png');
                    $("#message").html(
                        "<p id='error'>Please Select A valid Image File</p>"
                        + "<h4>Note</h4>" +
                        "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                    return false;
                }
                else {
                    $(document).trigger("add-alerts", [{'message': 'upload Image Now','priority': 'warning'}]);
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
        function imageIsLoaded(e) {
            $('#upload_<?= $tbl->get_image() ?>').css("display", "block");
            $('#upload_<?= $tbl->get_image() ?>').attr('src', e.target.result);
        };
    });
</script>

<script type="text/javascript">
    //add_blog
    $(document).ready(function(){
        $('#add_slider_btn').click(function(){$('#add_row').modal('show');});
        $('#form_add_slider').bootstrapValidator({
            message: 'This value is not valid', feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'add_text':{validators: {notEmpty: {message: ''}}},
                'add_title':{validators: {notEmpty: {message: ''}}}
            }
        }).on('success.form.bv', function (e) {
            e.preventDefault();
            var $form = $(e.target);
            var bv = $form.data('bootstrapValidator');
            $.post($form.attr('action'), $form.serialize(), function (data) {
                var result = JSON.parse(data);
                if(result['valid']){
                    $(document).trigger("add-s", [{'message': result['message'],'priority': 'success'}]);
                    $('#add_row').modal('hide');
                }
                else
                {
                    $(document).trigger("add-s",[{'message':result['message'],'priority':'error'}]);
                }
            }).fail(function(){alert("Erorr");});});

    });
</script>

