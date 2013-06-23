<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>Sửa hàng</h2>
						 
					</div>
					<div class="box-content">
					<?php foreach ($items as $detail):?>
						<?php echo form_open_multipart('welcome/edit_items/'.$detail->id); ?>
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="typeahead">Danh mục</label>
							  <div class="controls">
							  <select name="catetype" id="catetype">
									<option selected="selected" value="0">----------------</option>
									<?php foreach($listcate as $cate):?> 
										<option <?php if($cate->id == $detail->type_id):?> selected="selected" <?php endif;?> value="<?php echo $cate->id?>"><?php echo $cate->catename;?></option>
									<?php endforeach;?>
								</select>
								<p class="help-block"></p>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Tên món</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"
								 name="name_items" value="<?php echo $detail->item?>"/>
								<p class="help-block"></p>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Giá tiền</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="item_price" id="typeahead" value="<?php echo $detail->price?>" />
								<p class="help-block"></p>
							  </div>
							</div>
							 
							<div class="form-actions">
							  <button type="submit" name="submit" class="btn btn-primary">Lưu</button> 
							</div>
						  </fieldset>
						<?php echo form_close(); ?> 
						<?php endforeach;?>

					</div>
				</div><!--/span-->

			</div><!--/row-->