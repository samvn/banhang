<?php if($this->session->userdata('usertype') == 1):?>
<div class="well nav-collapse sidebar-nav">
    <ul class="nav nav-tabs nav-stacked main-menu">
        <li class="nav-header hidden-tablet">Main</li>
        <li><a class="ajax-link" href="<?php echo site_url() ?>"><i class="icon-home"></i><span class="hidden-tablet"> Trang chủ</span></a></li>
        <li><a class="ajax-link" href="<?php echo site_url('welcome/add_order') ?>"><i class="icon-edit"></i><span class="hidden-tablet">Nhập bàn</span></a></li>
        <li><a class="ajax-link" href="<?php echo site_url('welcome/cate') ?>"><i class="icon-eye-open"></i><span class="hidden-tablet">Quản lý danh mục</span></a></li>
        <li><a class="ajax-link" href="<?php echo site_url('welcome/items') ?>"><i class="icon-eye-open"></i><span class="hidden-tablet">Quản lý thực đơn</span></a></li>
        <li><a class="ajax-link" href="<?php echo site_url('welcome/users') ?>"><i class="icon-edit"></i><span class="hidden-tablet"> Quản lý user</span></a></li>
        <li><a class="ajax-link" href="<?php echo site_url('welcome/orders') ?>"><i class="icon-edit"></i><span class="hidden-tablet"> Quản lý đơn hàng</span></a></li>
        <li><a class="ajax-link" href="<?php echo site_url('welcome/reports') ?>"><i class="icon-edit"></i><span class="hidden-tablet"> Báo cáo</span></a></li> 
        <li><a class="ajax-link" href="<?php echo site_url('welcome/month_reports') ?>"><i class="icon-edit"></i><span class="hidden-tablet"> Thống kê</span></a></li> 
        <li><a class="ajax-link" href="<?php echo site_url('welcome/tables') ?>"><i class="icon-edit"></i><span class="hidden-tablet">Bàn</span></a></li> 
        <li><a class="ajax-link" href="<?php echo site_url('welcome/logout') ?>"><i class="icon-edit"></i><span class="hidden-tablet">Thoát</span></a></li>
    </ul>
    <label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" selected="selected" type="checkbox"> Ajax on menu</label>
</div><!--/.well -->
<?php elseif($this->session->userdata('usertype') == 2):?>
<div class="well nav-collapse sidebar-nav">
    <ul class="nav nav-tabs nav-stacked main-menu">
        <li class="nav-header hidden-tablet">Main</li>
        <li><a class="ajax-link" href="<?php echo site_url() ?>"><i class="icon-home"></i><span class="hidden-tablet"> Trang chủ</span></a></li>
        <li><a class="ajax-link" href="<?php echo site_url('welcome/add_order') ?>"><i class="icon-edit"></i><span class="hidden-tablet">Nhập bàn</span></a></li>
        <li><a class="ajax-link" href="<?php echo site_url('welcome/orders') ?>"><i class="icon-edit"></i><span class="hidden-tablet"> Quản lý đơn hàng</span></a></li>
        <li><a class="ajax-link" href="<?php echo site_url('welcome/reports') ?>"><i class="icon-edit"></i><span class="hidden-tablet"> Báo cáo</span></a></li> 
        <li><a class="ajax-link" href="<?php echo site_url('welcome/logout') ?>"><i class="icon-edit"></i><span class="hidden-tablet">Thoát</span></a></li>
    </ul>
    <label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" selected="selected" type="checkbox"> Ajax on menu</label>
</div><!--/.well -->
<?php elseif($this->session->userdata('usertype') == 3):?>
<div class="well nav-collapse sidebar-nav">
    <ul class="nav nav-tabs nav-stacked main-menu">
        <li class="nav-header hidden-tablet">Main</li>
        <li><a class="ajax-link" href="<?php echo site_url() ?>"><i class="icon-home"></i><span class="hidden-tablet"> Trang chủ</span></a></li>
        <li><a class="ajax-link" href="<?php echo site_url('welcome/add_order') ?>"><i class="icon-edit"></i><span class="hidden-tablet">Nhập bàn</span></a></li> 
        <li><a class="ajax-link" href="<?php echo site_url('welcome/orders') ?>"><i class="icon-edit"></i><span class="hidden-tablet"> Quản lý đơn hàng</span></a></li> 
        <li><a class="ajax-link" href="<?php echo site_url('welcome/logout') ?>"><i class="icon-edit"></i><span class="hidden-tablet">Thoát</span></a></li>
    </ul>
  
</div><!--/.well -->
<?php else:?>

<?php endif; ?>
