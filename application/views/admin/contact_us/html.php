<div id="page-wrapper" style="min-height: 164px;">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Contact Us</h3>
            <?PHP $tbl = new tbl_contact_us() ?>
            <div id="toolbar2">

            </div>
            <table id="table" data-toggle="table"
                   data-url="<?= site_url('admin/home/get_contact_us') ?>"
                   data-cache="false" data-height="450"
                   data-show-columns="true" data-show-refresh="true" data-show-toggle="true"
                   data-pagination="true" data-page-list="[5, 50, 100, 200]"
                   data-search="true" data-flat="true" data-toolbar="#toolbar2">
                <thead>
                <tr>
                    <th data-field="<?= $tbl->get_name() ?>"
                        data-align="center"
                        data-formatter="<?= $tbl->get_name() ?>_formatter"
                        data-width="50"><?= $tbl->get_name() ?>
                    </th>
                    <th data-field="<?= $tbl->get_email() ?>"
                        data-align="center"
                        data-formatter="<?= $tbl->get_email() ?>_formatter"
                        data-width="50"><?= $tbl->get_email() ?>
                    </th>
                    <th data-field="<?= $tbl->get_message() ?>"
                        data-align="center"
                        data-formatter="<?= $tbl->get_message() ?>_formatter"
                        data-width="10"><?= $tbl->get_message() ?>
                    </th>
                    <th data-field="<?= $tbl->get_ip() ?>"
                        data-align="center"
                        data-formatter="<?= $tbl->get_ip() ?>_formatter"
                        data-width="10"><?= $tbl->get_ip() ?>
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