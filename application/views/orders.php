<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Thực đơn </h2>
						 
					</div>
					<div class="box-content">
					 <?php echo form_open_multipart('welcome/checkout_multi_order'); ?>
				<legend>	<a href="<?php echo site_url("welcome/add_order");?>"  > Nhập order</a></legend>
						<input type="submit" name="submit_multi" class="btn btn-primary" value="Nhập bàn">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  	  <th></th>
								  <th>Tên bàn</th> 
								  <th>Tình trạng</th>  
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						 
							 <?php foreach($order_list as $order):?>
							<tr>
								<td><input type="checkbox" name="order_id_list[]" value="<?php echo $order->id?>"></td>
								<td><a href="<?php echo site_url('welcome/edit_order/'.$order->id);?>"><?php echo $order->order_name;?></a></td> 
								<td class="center">
									<?php if($order->status == 0):?>
									<span class="label label-warning">Chưa thanh toán</span>
									<?php else:?>
									<span class="label label-success">Đã thanh toán</span>
									<?php endif;?>
								</td>
								<td class="center">
									<?php if($order->status == 0):?>
									<a class="btn btn-primary" href="<?php echo site_url("welcome/checkout/".$order->id);?>"> Thanh toán</a>
									<a href="<?php echo site_url('welcome/edit_order/'.$order->id);?>">Sửa</a> &nbsp;
									<a href="<?php echo site_url("welcome/del_order/".$order->id);?>"> Xóa</a>
									<?php endif;?>
<!-- 									<a class="btn btn-success" href="#"> -->
<!-- 										<i class="icon-zoom-in icon-white"></i>   -->
<!-- 										View                                             -->
<!-- 									</a> -->
<!-- 									<a class="btn btn-info" href="#"> -->
<!-- 										<i class="icon-edit icon-white"></i>   -->
<!-- 										Edit                                             -->
<!-- 									</a> -->
<!-- 									<a class="btn btn-danger" href="#"> -->
<!-- 										<i class="icon-trash icon-white"></i>  -->
<!-- 										Delete -->
<!-- 									</a> -->
								</td>
							</tr>
							<?php endforeach;?>
							
						  </tbody>
					  </table>            
					  <?php echo form_close(); ?>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->