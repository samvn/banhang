<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2>
				<i class="icon-user"></i> Thực đơn
			</h2>

		</div>
		<div class="box-content">
			<table
				class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>Loại</th>
						<th>Tên món</th>
						<th>Giá tiền</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($listitem as $item):?>
					<tr>
						<td><?php foreach($listcate as $cate):?> <?php if($cate->id == $item->type_id):?>
							<?php echo $cate->catename;?> <?php endif;?> <?php endforeach;?>
						</td>
						<td><a
							href="<?php echo site_url('welcome/edit_items/'.$item->id);?>"><?php echo $item->item;?>
						</a>
						</td>
						<td class="center"><?php echo number_format($item->price)?>
						</td>

						<td class="center"><a
							href="<?php echo site_url('welcome/edit_items/'.$item->id);?>">Sửa</a>
							&nbsp; <a
							href="<?php echo site_url("welcome/del_item/".$item->id);?>"> Xóa</a>
							<!-- 									<a class="btn btn-success" href="#"> --> <!-- 										<i class="icon-zoom-in icon-white"></i>   -->
							<!-- 										View                                             -->
							<!-- 									</a> --> <!-- 									<a class="btn btn-info" href="#"> -->
							<!-- 										<i class="icon-edit icon-white"></i>   --> <!-- 										Edit                                             -->
							<!-- 									</a> --> <!-- 									<a class="btn btn-danger" href="#"> -->
							<!-- 										<i class="icon-trash icon-white"></i>  --> <!-- 										Delete -->
							<!-- 									</a> --></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
	<!--/span-->

</div>
<!--/row-->
