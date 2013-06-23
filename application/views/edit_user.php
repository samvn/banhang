<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>Thêm mới danh mục</h2>
						 
					</div>
					<div class="box-content">
					<?php foreach($userdetails as $user):?>
						<?php echo form_open_multipart('welcome/edit_user/'.$user->id);?>
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="typeahead">Tên</label>
							  <div class="controls">
								<input  disabled value="<?php echo $user->username?>" type="text" class="span6 typeahead" id="typeahead" name="username" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
								<p class="help-block"></p>
							  </div>
							</div>
							 
							 <div class="control-group">
							  <label class="control-label" for="typeahead">mật khẩu</label>
							  <div class="controls">
								<input value="<?php echo $user->password?>" type="password" class="span6 typeahead" id="typeahead" name="userpass" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
								<p class="help-block"></p>
							  </div>
							</div>
                                                      
                                                       <div class="control-group">
                              <label class="control-label" for="typeahead">Loại user</label>
                              <div class="controls">
                                    <select name="type_user" id='type_user'>
                                           <option value="0"  <?php if($user->type==0){ ?> selected="selected" <?php } ?> >     </option> 
                                           <option value="1"  <?php if($user->type==1){ ?> selected="selected" <?php } ?> >Adminnistrator</option>
                                           <option value="2" <?php if($user->type==2){ ?> selected="selected" <?php } ?>>Manager</option>
                                           <option value="3" <?php if($user->type==3){ ?> selected="selected" <?php } ?>>User</option>
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