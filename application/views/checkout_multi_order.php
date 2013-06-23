<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2>
				Hoá đơn thanh toán
			</h2>

		</div>
		<div class="control-group">
			<label class="control-label"  style="padding:10px 10px 10px 10px;" for="typeahead"><b>Số món :</b> </label>
			<div class="controls">
				<div id="InputsWrapper">
					<table
						class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Tên</th>
								<th>Số lượng</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($order_item as $order_item_1):?>
							<tr>
								<td class="center"><?php echo $order_item_1->item_name?></td>
								<td class="center"><?php echo $order_item_1->amount?></td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>

				</div>

				<p class="help-block"></p>
			</div>
		</div>
		<div class="box-content">
			<h2><label class="control-label" for="typeahead"><b>Tổng số tiền:</b> </label></h2>
			<div id="printablediv" style="width: 100%;">
				<h3><?php echo number_format($total_price)." vnd"; ?></h3>
			</div>
		</div>

	</div>
	<!--/span-->
	<p class="pull-right">
		<a class="btn btn-primary"
			href="<?php echo site_url("welcome/checkout_multi/".$orderid);?>">
			Thanh toán</a> &nbsp; <a class="btn btn-primary" href=""> Xuất hóa
			đơn</a>
	</p>

</div>
<!--/row-->
