<link href="<?= site_url('include/admin/bower_components/bootstrap-table/bootstrap-table.css') ?>" rel="stylesheet">
<script src="<?= site_url('include/admin/bower_components/bootstrap-table/bootstrap-table.js') ?>"></script>
<?PHP $tbl = new tbl_system() ?>
<script type="text/javascript">

    function  <?= $tbl->get_value() ?>_formatter(value) {

        return '<p style="  overflow: auto;height: 60px;display: block;">' + value + '</p>';

    }

    function  <?= $tbl->get_type() ?>_formatter(value) {

        return '<p style="  overflow: auto;height: 60px;display: block;">' + value + '</p>';

    }

</script>


<script type="text/javascript">
    $('#form_edit').bootstrapValidator({
        message: 'This value is not valid', feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            'edit_type':{validators: {notEmpty: {message: ''}}},
            'edit_value':{validators: {notEmpty: {message: ''}}}
        }
    }).on('success.form.bv', function (e) {

        e.preventDefault();

        var $form = $(e.target);

        var bv = $form.data('bootstrapValidator');

        $.post($form.attr('action'), $form.serialize(), function (data) {

            var result = JSON.parse(data);

        }).fail(function(){alert("Erorr");});});
</script>



<script type="text/javascript">
    function <?=$tbl->get_table()?>_formatter() {
        return [
            '<a class="edit ml10" href="javascript:void(0)" title="Edit cafe Info" style="margin-right:4px">',
            '<i class="fa fa-edit fa-2x"></i>',
            '</a>'
        ].join('');
    }
    window.<?=$tbl->get_table()?>_events = {

        'click .edit': function (e, value, row, index) {

            $('#edit_id').val(row.id);
            $('#edit_value').val(row.value);
            $('#edit_type').val(row.type);
            $('#edit_row').modal('show');
        }
    };
</script>