
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php $tbl = new tbl_system(); echo $name_site[$tbl->get_value()]?> ( Sign In )</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="<?= site_url('admin/login/do_login') ?>" method="post" id="login_user">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Login"/>
                            <div id="massage"></div>
                        </fieldset>
                    </form>
                    <div class="spacing"></div>
                    <div data-alerts="alerts" data-titles="" data-ids="myid" data-fade="3000"></div>
                </div>
            </div>
        </div>
    </div>
</div>
