<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Quản lý bàn </h2>
						 
					</div>
					<div class="box-content">
				<legend>	<a href="<?php echo site_url("welcome/add_tables");?>"  > THÊM MỚI </a></legend>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  	<th>Số TT</th>
								  <th>Tên bàn</th>
								  <th>Loại bàn</th>  
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                                                      <?php $i =0; ?>
							 <?php foreach($tables as $table):?>
                                                         <?php $i = $i +1;?>
							<tr>
								 <td><?php echo $i; ?></td>
								<td><a href="<?php echo site_url('welcome/edit_table/'.$table->id);?>">
                                                                    <?php echo $table->table_name;?></a></td> 
								<td class="center"><?php echo number_format($table->table_type)?></td>
								 
								<td class="center">
									<a href="<?php echo site_url('welcome/edit_table/'.$table->id);?>">Sửa</a> &nbsp;
									<a href="<?php echo site_url("welcome/del_table/".$table->id);?>"> Xóa</a>
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
					</div>
				</div><!--/span-->
			
			</div><!--/row-->