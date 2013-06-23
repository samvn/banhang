<div class="row-fluid sortable">
    <div class="box span12">
            <div class="box-header well" data-original-title>
                    <h2><i class="icon-edit"></i>Thêm mới danh mục</h2>

            </div>
            <div class="box-content">
                    <?php echo form_open_multipart('welcome/add_user'); ?>
                      <fieldset>

                            <div class="control-group">
                              <label class="control-label" for="typeahead">Tên</label>
                              <div class="controls">
                                    <input type="text" class="span6 typeahead" id="typeahead" name="username" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    <p class="help-block"></p>
                              </div>
                            </div>

                             <div class="control-group">
                              <label class="control-label" for="typeahead">mật khẩu</label>
                              <div class="controls">
                                    <input type="password" class="span6 typeahead" id="typeahead" name="userpass" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    <p class="help-block"></p>
                              </div>
                            </div>
                          
                          <div class="control-group">
                              <label class="control-label" for="typeahead">Loại user</label>
                              <div class="controls">
                                    <select name="type_user" id='type_user'>
                                           <option value="1">Adminnistrator</option>
                                           <option value="2">Manager</option>
                                           <option value="3">User</option>
                                    </select>
                                    <p class="help-block"></p>
                              </div>
                            </div>
                          
                          
                            <div class="form-actions">
                              <button type="submit" name="submit" class="btn btn-primary">Lưu</button>

                            </div>
                      </fieldset>
                    <?php echo form_close(); ?> 

            </div>
    </div><!--/span-->

</div><!--/row-->