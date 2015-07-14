<?PHP $tbl = new tbl_cafe() ?>
<link href="<?= site_url('include/admin/bower_components/bootstrap-table/bootstrap-table.css') ?>" rel="stylesheet">
<script src="<?= site_url('include/admin/bower_components/bootstrap-table/bootstrap-table.js') ?>"></script>
<script type="text/javascript">

    function <?=$tbl->get_status()?>_formatter(value, row) {

        if (value == 1) {
            return '<input onchange="status(' + row.<?=$tbl->get_id()?> + ',0)" type="checkbox" checked="true"/>';
        }
        return '<input onchange="status(' + row.<?=$tbl->get_id()?> + ',1)" type="checkbox"/>';
    }

    function <?=$tbl->get_main_page()?>_formatter(value, row) {

        if (value == 1) {
            return '<input onchange="main_page(' + row.<?=$tbl->get_id()?> + ',0)" type="checkbox" checked="true"/>';
        }
        return '<input onchange="main_page(' + row.<?=$tbl->get_id()?> + ',1)" type="checkbox"/>';
    }

    function <?= $tbl->get_description() ?>_formatter(value) {
        return '<p style="  overflow: auto;height: 60px;display: block;">' + value + '</p>';
    }

    function <?= $tbl->get_short_description() ?>_formatter(value) {
        return '<p style="  overflow: auto;height: 60px;display: block;">' + value + '</p>';
    }

    function status(id, value) {
        $.post('<?= site_url('admin/home/change_cafe_status')?>', {
            id: <?=$tbl->get_id()?>,
            status: value
        }, function (result) {
            var $table = $('#table');
            $table.bootstrapTable('showLoading');
            $table.bootstrapTable('refresh');
        });
    }

    function main_page(id, value) {
        $.post('<?= site_url('admin/home/change_cafe_main_page')?>', {
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
            '<a class="edit_image ml10" href="javascript:void(0)" title="logo cafe" style="margin-right:4px">',
            '<i class="fa fa-picture-o fa-2x"></i>',
            '</a>',
            '<a class="slider_cafe ml10" href="javascript:void(0)" title="slider cafe" style="margin-right:4px">',
            '<i class="fa fa-sliders fa-2x"></i>',
            '</a>'
        ].join('');
    }
    window.<?=$tbl->get_table()?>_events = {
        'click .remove': function (e, value, row, index) {
            var confirms = confirm('Are you sure you to delete this cafe ?');
            if (confirms) {
                $.post('<?= site_url('admin/home/delete_cafe')?>',
                    {id: row.<?=$tbl->get_id()?>}, function (data) {
                        var $table = $('#table');
                        $table.bootstrapTable('showLoading');
                        $table.bootstrapTable('refresh');
                    });
            }
        },
        'click .edit': function (e, value, row, index) {
            $('#edit_<?= $tbl->get_id() ?>').val(row.<?= $tbl->get_id() ?>);
            $('#edit_<?= $tbl->get_name() ?>').val(row.<?= $tbl->get_name() ?>);
            $('#edit_<?= $tbl->get_description() ?>').val(row.<?= $tbl->get_description() ?>);
            $('#edit_<?= $tbl->get_short_description() ?>').val(row.<?= $tbl->get_short_description() ?>);
            $('#edit_<?= $tbl->get_full_address() ?>').val(row.<?= $tbl->get_full_address() ?>);
            $('#edit_<?= $tbl->get_phone() ?>').val(row.<?= $tbl->get_phone() ?>);
            $('#edit_<?= $tbl->get_mobile() ?>').val(row.<?= $tbl->get_mobile() ?>);
            $('#edit_<?= $tbl->get_mobile_two() ?>').val(row.<?= $tbl->get_mobile_two() ?>);
            $('#edit_<?= $tbl->get_logo() ?>').val(row.<?= $tbl->get_logo() ?>);
            $('#edit_<?= $tbl->get_x_map() ?>').val(row.<?= $tbl->get_x_map() ?>);
            $('#edit_<?= $tbl->get_y_map() ?>').val(row.<?= $tbl->get_y_map() ?>);
            $('#edit_cafe').modal('show');
        },
        'click .edit_image': function (e, value, row, index) {
            $('#upload_<?= $tbl->get_id() ?>').val(row.<?= $tbl->get_id() ?>);
            $('#upload_<?= $tbl->get_logo() ?>').attr('src', '<?=site_url()?>' + row.<?= $tbl->get_logo() ?>);
            $('#edit_image_cafe').modal('show');
        },
        'click .slider_cafe': function (e, value, row, index) {

            $('#slider_<?= $tbl->get_id() ?>').val(row.<?= $tbl->get_id() ?>);

            get_gallary_image(row.<?= $tbl->get_id() ?>);
            $('#slider_cafe').modal('show');
        }
    };
</script>
<script type="text/javascript">
    var url = '<?= site_url('admin/home/change_image_cafe')?>';
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
                    $('#upload_<?= $tbl->get_logo() ?>').attr('src', 'noimage.png');
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
            $('#upload_<?= $tbl->get_logo() ?>').css("display", "block");
            $('#upload_<?= $tbl->get_logo() ?>').attr('src', e.target.result);
        };
    });
</script>
<script type="text/javascript">
    $('#form_edit_cafe').bootstrapValidator({
        message: 'This value is not valid', feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            'edit_name':{validators: {notEmpty: {message: ''}}},
            'edit_description':{validators: {notEmpty: {message: ''}}},
            'edit_short_description': {validators: {notEmpty: {message: ''}}},
            'edit_full_address': {validators: {notEmpty: {message: ''}}},
            'edit_phone': {validators: {notEmpty: {message: ''}}},
            'edit_mobile': {validators: {notEmpty: {message: ''}}},
            'edit_mobile_two': {validators: {notEmpty: {message: ''}}},
            'edit_x_map': {validators: {notEmpty: {message: ''}}},
            'edit_y_map': {validators: {notEmpty: {message: ''}}}
        }
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        var $form = $(e.target);
        var bv = $form.data('bootstrapValidator');
        $.post($form.attr('action'), $form.serialize(), function (data) {
            var result = JSON.parse(data);
            if(result['valid']){
                $(document).trigger("add-s", [{'message': result['message'],'priority': 'success'}]);
                $('#edit_cafe').modal('hide');
            }
            else
            {
                $(document).trigger("add-s",[{'message':result['message'],'priority':'error'}]);
            }
        }).fail(function(){alert("Erorr");});});
</script>
<script type="text/javascript">
    //add_cafe
    $(document).ready(function(){

        $('#add_cafe').click(function(){$('#new_cafe').modal('show');});


        $('#form_new_cafe').bootstrapValidator({
            message: 'This value is not valid', feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'new_name':{validators: {notEmpty: {message: ''}}},
                'new_description':{validators: {notEmpty: {message: ''}}},
                'new_short_description': {validators: {notEmpty: {message: ''}}},
                'new_full_address': {validators: {notEmpty: {message: ''}}},
                'new_phone': {validators: {notEmpty: {message: ''}}},
                'new_mobile': {validators: {notEmpty: {message: ''}}},
                'new_mobile_two': {validators: {notEmpty: {message: ''}}},
                'new_x_map': {validators: {notEmpty: {message: ''}}},
                'new_y_map': {validators: {notEmpty: {message: ''}}}
            }
        }).on('success.form.bv', function (e) {
            e.preventDefault();
            var $form = $(e.target);
            var bv = $form.data('bootstrapValidator');
            $.post($form.attr('action'), $form.serialize(), function (data) {
                var result = JSON.parse(data);
                if(result['valid']){
                    $(document).trigger("add-s", [{'message': result['message'],'priority': 'success'}]);
                    $('#new_cafe').modal('hide');
                }
                else
                {
                    $(document).trigger("add-s",[{'message':result['message'],'priority':'error'}]);
                }
            }).fail(function(){alert("Erorr");});});

    });
</script>
<script type="text/javascript">
    function status_gallery(id_cafe, id, value) {
        $.post('<?= site_url('admin/home/change_status_gallery')?>', {
            id:id,
            status: value
        }, function (result) {
            get_gallary_image(id_cafe);
        });
    }


        function delete_gallery(id_cafe,id){

            var confirms = confirm('Are you sure you to delete this image cafe ?');
            if (confirms) {
                $.post('<?= site_url('admin/home/delete_image_gallery_cafe')?>',
                    {id:id}, function (data) {
                        get_gallary_image(id_cafe);
                    });
            }

        }


    function get_gallary_image(id){
        $('#image_slider_preview').html('');
        $.post('<?= site_url('admin/home/get_cafe_gallery')?>',
            {id:id}, function (data) {
                var site = '<?= site_url()?>';
                var result = JSON.parse(data);
                for( var i=0; i<result.length; i++ ){
                   if(result[i].status == 0){


                       $('#image_slider_preview').append('<tr>'+
                       '<td>'+result[i].id+'</td>'+
                       '<td>'+'<img src="'+site+result[i].image+'" class="img-responsive" style="width:20%"/></td>'+
                       '<td><input onchange="status_gallery('+id+','+result[i].id+',' +1+
                       ')" type="checkbox"/>'+
                       '<i style="cursor: pointer" onclick="delete_gallery('+id+','+result[i].id+
                       ')" class=" remove_gallery fa fa-remove fa-2x"></i></td>'+
                       '</tr>');
                   }
                    else{

                       $('#image_slider_preview').append('<tr>'+
                       '<td>'+result[i].id+'</td>'+
                       '<td>'+'<img src="'+site+result[i].image+'" class="img-responsive" style="width:20%"/></td>'+
                       '<td><input onchange="status_gallery('+id+','+result[i].id+',' +0+
                       ')" type="checkbox"  checked="true"/>'+
                       '<i style="cursor: pointer" onclick="delete_gallery('+id+','+result[i].id+
                       ')" class=" remove_gallery fa fa-remove fa-2x"></i></td>'+
                       '</tr>');
                   }
                }
            });
    }
</script>
<script type="text/javascript">
    var url = '<?= site_url('admin/home/new_image_gallery')?>';
    $(document).ready(function (e) {
        $("#add_new_slider_image").on('submit', (function (e) {
            e.preventDefault();
            $.ajax({
                url: url, type: "POST", data: new FormData(this), contentType: false, cache: false, processData: false,
                success: function (data) {
                    var result = JSON.parse(data);
                    if (result['valid']) {
                        get_gallary_image($('#slider_<?= $tbl->get_id() ?>').val());
                    }
                    else {
                    }
                }
            });
        }));
        $(function () {
            $("#slider_file").change(function () {
                $("#message").empty(); // To remove the previous error message
                var file = this.files[0];
                var imagefile = file.type;
                var match = ["image/jpeg", "image/png", "image/jpg"];
                if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                    $('#slider_file_<?= $tbl->get_logo() ?>').attr('src', 'noimage.png');
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
            $('#slider_file_<?= $tbl->get_logo() ?>').css("display", "block");
            $('#slider_file_<?= $tbl->get_logo() ?>').attr('src', e.target.result);
        };
    });
</script>
