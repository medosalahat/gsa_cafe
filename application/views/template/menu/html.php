<?PHP
$this->load->library('system/tbl/tbl_system');
$table = new tbl_system();?>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=site_url()?>"><?= $name_site[$table->get_value()]?></a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
                <li <?php if(isset($active) and $active=='home') { ?>class="active"<?php } ?>><a href="<?=site_url()?>">Home</a></li>
                <li <?php if(isset($active) and $active =='all_cafe') { ?>class="active"<?php } ?>><a href="<?=site_url('site/all_cafe')?>">Cafe</a></li>
                <li <?php if(isset($active) and $active =='all_cafe') { ?>class="active"<?php } ?>><a href="<?=site_url('site/blog')?>">Blog</a></li>
                <li <?php if(isset($active) and $active =='login') { ?>class="active"<?php } ?>>
                    <?PHP if($is_login):?>
                        <a href="<?=site_url('site/get_logout')?>">Logout</a>
                    <?PHP else: ?>
                    <a href="<?=$link_login?>">Login - <i class="fa fa-facebook"></i></a>
                    <?PHP endif; ?>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li <?php if(isset($active) and $active=='about_us') { ?>class="active"<?php } ?>><a href="<?=site_url('site/about_us')?>">About</a></li>
                        <li <?php if(isset($active) and $active=='contact') { ?>class="active"<?php } ?>><a href="<?=site_url('site/contact')?>">Contact</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>