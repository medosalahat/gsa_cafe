<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= site_url('admin/home')?>">Welcome To Admin Panel v1.0</a>
        </div>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?= site_url('admin/home')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/home/cafe')?>"><i class="fa fa-coffee fa-fw"></i> Cafe</a>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/home/blog')?>"><i class="fa fa-th-large fa-fw"></i> Blog</a>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/home/contact_us')?>"><i class="fa fa-sun-o fa-fw"></i> contact us</a>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/home/slider')?>"><i class="fa fa-sliders fa-fw"></i> slider</a>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/home/system')?>"><i class="fa fa-power-off fa-fw"></i> system</a>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/home/users')?>"><i class="fa fa-users fa-fw"></i> users</a>
                    </li>
                    <li>
                        <a href="<?=site_url('admin/home/logout')?>"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>