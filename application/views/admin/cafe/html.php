<?PHP $tbl = new tbl_cafe() ?>
<div id="page-wrapper" style="min-height: 164px;">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">Cafe </h3>

            <div id="toolbar2">
                <button class="btn btn-warning btn-xs" id="add_cafe">Add Cafe</button>
            </div>
            <table id="table" data-toggle="table"
                   data-url="<?= site_url('admin/home/get_cafe') ?>"
                   data-cache="false" data-height="450"
                   data-show-columns="true" data-show-refresh="true" data-show-toggle="true"
                   data-pagination="true" data-page-list="[5, 50, 100, 200]"
                   data-search="true" data-flat="true" data-toolbar="#toolbar2">
                <thead>
                <tr>
                    <th data-field="<?= $tbl->get_name() ?>"
                        data-align="center"
                        data-width="50"><?= $tbl->get_name() ?>
                    </th>
                    <th data-field="<?= $tbl->get_description() ?>"
                        data-align="center"
                        data-formatter="<?= $tbl->get_description() ?>_formatter"
                        data-width="50"><?= $tbl->get_description() ?>
                    </th>
                    <th data-field="<?= $tbl->get_short_description() ?>"
                        data-align="center"
                        data-formatter="<?= $tbl->get_short_description() ?>_formatter"
                        data-width="50"><?= $tbl->get_short_description() ?>
                    </th>
                    <th data-field="<?= $tbl->get_phone() ?>"
                        data-align="center"
                        data-width="50"><?= $tbl->get_phone() ?>
                    </th>
                    <th data-field="<?= $tbl->get_full_address() ?>"
                        data-align="center"
                        data-width="50"><?= $tbl->get_full_address() ?>
                    </th>

                    <th data-field="<?= $tbl->get_mobile() ?>"
                        data-align="center"
                        data-width="50"><?= $tbl->get_mobile() ?>
                    </th>
                    <th data-field="<?= $tbl->get_mobile_two() ?>"
                        data-align="center"
                        data-width="50"><?= $tbl->get_mobile_two() ?>
                    </th>
                    <th data-field="<?= $tbl->get_main_page() ?>"
                        data-align="center"
                        data-formatter="<?= $tbl->get_main_page() ?>_formatter"
                        data-width="10"><?= $tbl->get_main_page() ?>
                    </th>

                    <th data-field="<?= $tbl->get_status() ?>"
                        data-align="center"
                        data-formatter="<?= $tbl->get_status() ?>_formatter"
                        data-width="10"><?= $tbl->get_status() ?>
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
</div>
<div class="modal fade" id="edit_cafe" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Edit Cafe
                </h4>
            </div>
            <form action="<?= site_url('admin/home/update_cafe_info')?>" method="post" id="form_edit_cafe">
                <input type="hidden" name="edit_<?= $tbl->get_id() ?>" id="edit_<?= $tbl->get_id() ?>"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label><?= $tbl->get_name() ?></label>
                                <input type="text" class="form-control" id="edit_<?= $tbl->get_name() ?>"
                                       name="edit_<?= $tbl->get_name() ?>"/>
                            </div>
                            <div class="form-group">
                                <label><?= $tbl->get_description() ?></label>
                                <textarea class="form-control" id="edit_<?= $tbl->get_description() ?>"
                                          name="edit_<?= $tbl->get_description() ?>" rows="5"></textarea>

                            </div>
                            <div class="form-group">
                                <label><?= $tbl->get_short_description() ?></label>
                                <textarea class="form-control" id="edit_<?= $tbl->get_short_description() ?>"
                                          name="edit_<?= $tbl->get_short_description() ?>" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label><?= $tbl->get_full_address() ?></label>
                                <input type="text" class="form-control" id="edit_<?= $tbl->get_full_address() ?>"
                                       name="edit_<?= $tbl->get_full_address() ?>"/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label><?= $tbl->get_phone() ?></label>
                                <input type="text" class="form-control" id="edit_<?= $tbl->get_phone() ?>"
                                       name="edit_<?= $tbl->get_phone() ?>"/>
                            </div>

                            <div class="form-group">
                                <label><?= $tbl->get_mobile() ?></label>
                                <input type="text" class="form-control" id="edit_<?= $tbl->get_mobile() ?>"
                                       name="edit_<?= $tbl->get_mobile() ?>"/>
                            </div>

                            <div class="form-group">
                                <label><?= $tbl->get_mobile_two() ?></label>
                                <input type="text" class="form-control" id="edit_<?= $tbl->get_mobile_two() ?>"
                                       name="edit_<?= $tbl->get_mobile_two() ?>"/>
                            </div>

                            <div class="form-group">
                                <label><?= $tbl->get_x_map() ?></label>
                                <input type="text" class="form-control" id="edit_<?= $tbl->get_x_map() ?>"
                                       name="edit_<?= $tbl->get_x_map() ?>"/>
                            </div>

                            <div class="form-group">
                                <label><?= $tbl->get_y_map() ?></label>
                                <input type="text" class="form-control" id="edit_<?= $tbl->get_y_map() ?>"
                                       name="edit_<?= $tbl->get_y_map() ?>"/>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div data-alerts="s" data-titles="" data-ids="myid" data-fade="3000"></div>
                        </div>
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
<div class="modal fade" id="edit_image_cafe" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Upload Image Cafe
                </h4>
            </div>
                <div class="modal-body">
                    <img id="upload_<?= $tbl->get_logo() ?>" src="" class="img-responsive img-thumbnail"/>
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
<div class="modal fade" id="new_cafe" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    New Cafe
                </h4>
            </div>
            <form action="<?= site_url('admin/home/new_cafe_info')?>" method="post" id="form_new_cafe">


                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label><?= $tbl->get_name() ?></label>
                                <input type="text" class="form-control" id="new_<?= $tbl->get_name() ?>"
                                       name="new_<?= $tbl->get_name() ?>"/>
                            </div>
                            <div class="form-group">
                                <label><?= $tbl->get_description() ?></label>
                                <textarea class="form-control" id="new_<?= $tbl->get_description() ?>"
                                          name="new_<?= $tbl->get_description() ?>" rows="5"></textarea>

                            </div>
                            <div class="form-group">
                                <label><?= $tbl->get_short_description() ?></label>
                                <textarea class="form-control" id="new_<?= $tbl->get_short_description() ?>"
                                          name="new_<?= $tbl->get_short_description() ?>" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label><?= $tbl->get_full_address() ?></label>
                                <input type="text" class="form-control" id="new_<?= $tbl->get_full_address() ?>"
                                       name="new_<?= $tbl->get_full_address() ?>"/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label><?= $tbl->get_phone() ?></label>
                                <input type="text" class="form-control" id="new_<?= $tbl->get_phone() ?>"
                                       name="new_<?= $tbl->get_phone() ?>"/>
                            </div>

                            <div class="form-group">
                                <label><?= $tbl->get_mobile() ?></label>
                                <input type="text" class="form-control" id="new_<?= $tbl->get_mobile() ?>"
                                       name="new_<?= $tbl->get_mobile() ?>"/>
                            </div>

                            <div class="form-group">
                                <label><?= $tbl->get_mobile_two() ?></label>
                                <input type="text" class="form-control" id="new_<?= $tbl->get_mobile_two() ?>"
                                       name="new_<?= $tbl->get_mobile_two() ?>"/>
                            </div>

                            <div class="form-group">
                                <label><?= $tbl->get_x_map() ?></label>
                                <input type="text" class="form-control" id="new_<?= $tbl->get_x_map() ?>"
                                       name="new_<?= $tbl->get_x_map() ?>"/>
                            </div>

                            <div class="form-group">
                                <label><?= $tbl->get_y_map() ?></label>
                                <input type="text" class="form-control" id="new_<?= $tbl->get_y_map() ?>"
                                       name="new_<?= $tbl->get_y_map() ?>"/>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div data-alerts="s" data-titles="" data-ids="myid" data-fade="3000"></div>
                        </div>
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


<div class="modal fade" id="slider_cafe" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    slider Image Cafe
                </h4>
            </div>
            <div class="modal-body">

                <form role="form" id="add_new_slider_image" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="slider_<?= $tbl->get_id() ?>" id="slider_<?= $tbl->get_id() ?>"/>
              <div class="row">
                  <div class="col-lg-3">
                      <img id="slider_file_<?= $tbl->get_logo() ?>" src="" class="img-responsive img-thumbnail"/>
                      <div class="form-group">
                          <div class="input-group">
                                        <span class="btn btn-success-upload-file fileinput-button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span>Add files </span>
                                            <input type="file" name="slider_file" id="slider_file" class="fileUpload"/>
                                        </span>
                          </div>
                          <div class="spacing"></div>

                          <div data-alerts="alerts" data-titles="" data-ids="myid" data-fade="3000"></div>
                      </div>
                  </div>
                  <div class="col-lg-9">

                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                          <thead>
                          <tr>
                              <th>ID</th>
                              <th>IMAGE</th>
                              <th>STATUS</th>
                          </tr>
                          </thead>
                          <tbody id="image_slider_preview">
                          </tbody>
                      </table>

                  </div>
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