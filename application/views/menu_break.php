<?php if($this->session->userdata('usertype') == 1):?>
<ul class="breadcrumb">
    <li><a href="<?php echo site_url("welcome/index") ?>">Home</a> <span class="divider">/</span></li>
    <li> <a href="<?php echo site_url("welcome/add_order"); ?>">Vào bàn</a> <span class="divider">/</span> </li>
    <li><a href="<?php echo site_url('welcome/items') ?>">Thực đơn /</a></li>
    <li> <a href="<?php echo site_url('welcome/cate') ?>">Danh mục /</a> </li>
    <li><a href="<?php echo site_url('welcome/orders') ?>">Hóa đơn /</a> </li>
    <li> <a href="<?php echo site_url('welcome/reports') ?>">Báo cáo /</a> </li>
    <li><a href="<?php echo site_url('welcome/month_reports') ?>">Thống kê/</a> </li>
    <li><a href="<?php echo site_url('welcome/tables') ?>">Bàn /</a> </li>
    <li><a href="<?php echo site_url('welcome/users') ?>">User /</a> </li>
    <li><a href="<?php echo site_url('welcome/logout') ?>">Thoát</a></li>
</ul>
<?php elseif($this->session->userdata('usertype') == 2):?>
<ul class="breadcrumb">
    <li><a href="<?php echo site_url("welcome/index") ?>">Home</a> <span class="divider">/</span></li>
    <li> <a href="<?php echo site_url("welcome/add_order"); ?>">Vào bàn</a> <span class="divider">/</span> </li> 
    <li><a href="<?php echo site_url('welcome/orders') ?>">Hóa đơn /</a> </li>
    <li> <a href="<?php echo site_url('welcome/reports') ?>">Báo cáo /</a> </li> 
    <li><a href="<?php echo site_url('welcome/logout') ?>">Thoát</a></li>
</ul>
<?php elseif($this->session->userdata('usertype') == 3):?>
<ul class="breadcrumb">
    <li><a href="<?php echo site_url("welcome/index") ?>">Home</a> <span class="divider">/</span></li>
    <li> <a href="<?php echo site_url("welcome/add_order"); ?>">Vào bàn</a> <span class="divider">/</span> </li> 
    <li><a href="<?php echo site_url('welcome/orders') ?>">Hóa đơn /</a> </li>  
    <li><a href="<?php echo site_url('welcome/logout') ?>">Thoát</a></li>
</ul>
<?php else:?>
<?php endif;?>
