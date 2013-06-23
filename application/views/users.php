<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>User</h2>
						 
					</div>
					<div class="box-content">
				<legend>	<a href="<?php echo site_url("welcome/add_user");?>"  > THÊM MỚI </a></legend>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>User</th> 
                                                                  <th>Type</th> 
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							 <?php foreach($listuser as $user):?>
							 	
							<tr>
								<td>
							 <a href="<?php echo site_url('welcome/edit_user/'.$user->id);?>"><?php echo $user->username;?></a>
								 </td>  
								 <td>
							 <a href="<?php echo site_url('welcome/edit_user/'.$user->id);?>">
                                                         <?php 
                                                         if($user->type == 1) {
                                                             echo "Admin";
                                                         }elseif($user->type == 2){
                                                             echo "Manager";
                                                         }elseif($user->type == 3){
                                                             echo "Staff";
                                                         }else{
                                                             echo "Unknow";
                                                         }
                                                         ?>
                                                         </a>
								 </td>
								<td class="center">
									<a href="<?php echo site_url('welcome/edit_user/'.$user->id);?>">Sửa</a> &nbsp;
									<a href="<?php echo site_url("welcome/del_user/".$user->id);?>"> Xóa</a>
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