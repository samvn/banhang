<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2>
				<i class="icon-edit"></i>Vào bill
			</h2>

		</div>
		 
		
		<div class="box-content">
			<div class="control-group">
				<label class="control-label" for="typeahead">Chọn món:</label>
				<div class="controls">
					<select name="items_select" id="items_select"
						onchange="changeitem(this);">
						<option value="0" selected="selected">------------</option>
						<?php foreach($listitem as $item):?>
						<option value="<?php echo $item->id;?>">
							<?php echo $item->item;?>
						</option>
						<?php endforeach;?>
					</select> <input type="text" name="item_amount" id="item_amount" />
					<input type="submit" name="AddMoreFileBox"
						id="AddMoreFileBox" value="add more" />
					<p class="help-block"></p>
				</div>
			</div>
			<?php echo form_open_multipart('welcome/add_order'); ?>
			<fieldset>

				<div class="control-group">
					<label class="control-label" for="typeahead"><b>Tên bàn:</b>
					</label>
					<div class="controls">
						<input type="text" class="span6 typeahead" id="typeahead"
							name="name_items" data-provide="typeahead" data-items="4">
						<p class="help-block"></p>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="typeahead"><b>Đã chọn:</b>
					</label>
					<div class="controls">
						<div id="InputsWrapper">
							 
						</div>
						 
						<p class="help-block"></p>
					</div>
				</div>
				 

				<div class="form-actions">
					<button type="submit" name="submit" class="btn btn-primary">Lưu</button>

				</div>
			</fieldset>
			<?php echo form_close(); ?>

		</div>
	</div>
	<!--/span-->

</div>
<!--/row-->
