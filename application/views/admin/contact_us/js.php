<?PHP $tbl = new tbl_contact_us() ?>
<link href="<?= site_url('include/admin/bower_components/bootstrap-table/bootstrap-table.css') ?>" rel="stylesheet">
<script src="<?= site_url('include/admin/bower_components/bootstrap-table/bootstrap-table.js') ?>"></script>

<script type="text/javascript">
    function <?=$tbl->get_table()?>_formatter() {
        return [
            '<a class="remove ml10" href="javascript:void(0)" title="Remove" style="margin-right:4px">',
            '<i class="fa fa-remove fa-2x"></i>',
            '</a>'
        ].join('');
    }
    window.<?=$tbl->get_table()?>_events = {
        'click .remove': function (e, value, row, index) {
            var confirms = confirm('Are you sure you to delete this contact us ?');
            if (confirms) {
                $.post('<?= site_url('admin/home/delete_contact_us')?>',
                    {id: row.<?=$tbl->get_id()?>}, function (data) {
                        var $table = $('#table');
                        $table.bootstrapTable('showLoading');
                        $table.bootstrapTable('refresh');
                    });
            }
        }
    };
</script>