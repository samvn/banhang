<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>Thêm mới hàng</h2>
						 
					</div>
					<div class="box-content">
					<?php foreach ($catedetails as $detail):?>
						<?php echo form_open_multipart('welcome/edit_cate/'.$detail->id); ?>
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="typeahead">Tên danh mục</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"
								 name="catename" value="<?php echo $detail->catename?>"/>
								<p class="help-block"></p>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Danh mục cha</label>
							  <div class="controls">
								<select name="cateroot" id="cateroot">
									<option selected="selected" value="0">----------------</option>
									<?php foreach($listcate as $cate):?> 
										<option <?php if($cate->id == $detail->cateroot):?> selected="selected" <?php endif;?> value="<?php echo $cate->id?>"><?php echo $cate->catename;?></option>
									<?php endforeach;?>
								</select>
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