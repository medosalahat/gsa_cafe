<div id="page-wrapper" style="min-height: 164px;">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"> System </h3>
            <?PHP $tbl = new tbl_system() ?>
            <div id="toolbar2">
            </div>
            <table id="table" data-toggle="table"
                   data-url="<?= site_url('admin/home/get_system') ?>"
                   data-cache="false" data-height="450"
                   data-show-columns="true" data-show-refresh="true" data-show-toggle="true"
                   data-pagination="true" data-page-list="[5, 50, 100, 200]"
                   data-search="true" data-flat="true" data-toolbar="#toolbar2">
                <thead>
                <tr>

                    <th data-field="<?= $tbl->get_type() ?>"
                        data-align="center"
                        data-formatter="<?= $tbl->get_type() ?>_formatter"
                        data-width="50"><?= $tbl->get_type() ?>
                    </th>

                    <th data-field="<?= $tbl->get_value() ?>"
                        data-align="center"
                        data-formatter="<?= $tbl->get_value() ?>_formatter"
                        data-width="50"><?= $tbl->get_value() ?>
                    </th>

                    <th data-align="center"
                        data-formatter="<?= $tbl->get_table() ?>_formatter"
                        data-events="<?= $tbl->get_table() ?>_events"
                        data-sortable="true"
                        data-width="50">Action
                    </th>

                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="edit_row" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Edit Cafe</h4>
            </div>
            <form action="<?= site_url('admin/home/update_system_info') ?>" method="post" id="form_edit">
                <input type="hidden" name="edit_id" id="edit_id"/>
                <div class="modal-body">
                    <div class="form-group">
                        <label><?= $tbl->get_type() ?></label>
                        <input type="text" class="form-control" id="edit_type" name="edit_type"/>
                    </div>
                    <div class="form-group">
                        <label><?= $tbl->get_value() ?></label>
                                <textarea class="form-control" id="edit_value" name="edit_value" rows="5"></textarea>
                    </div>
                    <div data-alerts="s" data-titles="" data-ids="myid" data-fade="3000"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>