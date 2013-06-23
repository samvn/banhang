<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>Vào bill</h2>
						 
					</div>
					<div class="box-content">
					<div class="control-group">
							  <label class="control-label" for="typeahead">Tiền phải thanh toán:</label>
							  <div class="controls">
								<h2><?php echo number_format(intval($total_price));?> vnd</h2>
								<p class="help-block"></p>
							  </div>
							</div>
					 
						        <div class="control-group">
						  <label class="control-label" for="typeahead">Chọn món:</label> 
						  <div class="controls"> 
						   <select name="items_select" id="items_select" onchange="changeitem(this);">
							<option value="0" selected="selected">------------</option>
							<?php foreach($listitem as $item):?>
								<option   value="<?php echo $item->id;?>"><?php echo $item->item;?></option>
							<?php endforeach;?> 
							</select>
							<input type="text" name="item_amount" id="item_amount"/>
							<input type="submit" name="AddMoreFileBox"
						id="AddMoreFileBox" value="add more" />
							<p class="help-block"></p>
						  </div>
						</div>
					<?php foreach($order_details as $order):?>
						<?php echo form_open_multipart('welcome/edit_order/'.$order->id); ?>
						  <fieldset> 
						  
							<div class="control-group">
							  <label class="control-label" for="typeahead">Tên bàn:</label>
							  <div class="controls">
								<input type="text" value="<?php echo $order->order_name;?>" class="span6 typeahead" id="typeahead" name="name_items"  />
								<p class="help-block"></p>
							  </div>
							</div>
							 
							
							<div class="control-group">
								<label class="control-label" for="typeahead"><b>Đã chọn:</b>
								</label>
								<div class="controls">
									<div id="InputsWrapper">
									  <?php foreach($order_item as $order_item):?>
										<div>
											<input id="orderitems"  name="orderitems"  type="text" value="<?php echo $order_item->amount.','.$order_item->item_id.','.$order_item->item_name;?>" />
											<a  href="<?php echo site_url("welcome/remove_item_order/".$order_item->item_id."/".$order->id);?>"> X </a>
										</div>
										<?php endforeach;?>
									</div>
									 
									<p class="help-block"></p>
								</div>
							</div>
				
						
							<div class="form-actions">
							  <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
							 <a class="btn btn-primary" href="<?php echo site_url("welcome/checkout/".$order->id);?>"> Thanh toán</a>
							</div>
						  </fieldset>
						<?php echo form_close(); ?>
						<?php endforeach;?> 

					</div>
				</div><!--/span-->

			</div><!--/row-->