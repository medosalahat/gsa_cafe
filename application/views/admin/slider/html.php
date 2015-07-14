<div id="page-wrapper" style="min-height: 164px;">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Slider</h3>
            <?PHP $tbl = new tbl_slider() ?>
            <div id="toolbar2">
                <button class="btn btn-warning btn-xs" id="add_slider_btn">Add Slider</button>
            </div>
            <table id="table" data-toggle="table"
                   data-url="<?= site_url('admin/home/get_slider') ?>"
                   data-cache="false" data-height="450"
                   data-show-columns="true" data-show-refresh="true" data-show-toggle="true"
                   data-pagination="true" data-page-list="[5, 50, 100, 200]"
                   data-search="true" data-flat="true" data-toolbar="#toolbar2">
                <thead>
                <tr>
                    <th data-field="<?= $tbl->get_title() ?>"
                        data-align="center"
                        data-formatter="<?= $tbl->get_title() ?>_formatter"
                        data-width="50"><?= $tbl->get_title() ?>
                    </th>
                    <th data-field="<?= $tbl->get_text() ?>"
                        data-align="center"
                        data-formatter="<?= $tbl->get_text() ?>_formatter"
                        data-width="50"><?= $tbl->get_text() ?>
                    </th>
                    <th data-field="<?= $tbl->get_image() ?>"
                        data-align="center"
                        data-formatter="<?= $tbl->get_image() ?>_formatter"
                        data-width="10"><?= $tbl->get_image() ?>
                    </th>
                    <th data-field="<?= $tbl->get_display() ?>"
                        data-align="center"
                        data-formatter="<?= $tbl->get_display() ?>_change"
                        data-width="10"><?= $tbl->get_display() ?>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Update slider
                </h4>
            </div>
            <form action="<?= site_url('admin/home/update_slider_info') ?>" method="post" id="form_edit_slider">
                <input type="hidden" name="edit_<?= $tbl->get_id() ?>" id="edit_<?= $tbl->get_id() ?>"/>

                <div class="modal-body">
                    <div class="form-group">
                        <label><?= $tbl->get_title() ?></label>
                        <input type="text" class="form-control" id="edit_<?= $tbl->get_title() ?>"
                               name="edit_<?= $tbl->get_title() ?>"/>
                    </div>
                    <div class="form-group">
                        <label><?= $tbl->get_text() ?></label>
                                <textarea class="form-control" id="edit_<?= $tbl->get_text() ?>"
                                          name="edit_<?= $tbl->get_text() ?>" rows="5"></textarea>
                    </div>
                    <div data-alerts="s" data-titles="" data-ids="myid" data-fade="3000"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="add_row" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Update slider</h4>
            </div>
            <form action="<?= site_url('admin/home/add_slider_info') ?>" method="post" id="form_add_slider">
                <div class="modal-body">
                    <div class="form-group">
                        <label><?= $tbl->get_title() ?></label>
                        <input type="text" class="form-control" id="add_<?= $tbl->get_title() ?>"
                               name="add_<?= $tbl->get_title() ?>"/>
                    </div>
                    <div class="form-group">
                        <label><?= $tbl->get_text() ?></label>
                                <textarea class="form-control" id="add_<?= $tbl->get_text() ?>"
                                          name="add_<?= $tbl->get_text() ?>" rows="5"></textarea>
                    </div>
                    <div data-alerts="s" data-titles="" data-ids="myid" data-fade="3000"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_image" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Upload Image Slider
                </h4>
            </div>
            <div class="modal-body">
                <img id="upload_<?= $tbl->get_image() ?>" src="" class="img-responsive img-thumbnail"/>
                <form role="form" id="add_new_image" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="upload_<?= $tbl->get_id() ?>" id="upload_<?= $tbl->get_id() ?>"/>
                    <div class="form-group">
                        <div class="input-group">
                                        <span class="btn btn-success-upload-file fileinput-button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span>Add files </span>
                                            <input type="file" name="upload_file" id="upload_file" class="fileUpload"/>
                                        </span>
                        </div>
                        <div class="spacing"></div>

                        <div data-alerts="alerts" data-titles="" data-ids="myid" data-fade="3000"></div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">
                    Save changes
                </button>
            </div>
            </form>
        </div>
    </div>
</div>



