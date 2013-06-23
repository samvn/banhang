<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Danh mục</h2>
						 
					</div>
					<div class="box-content">
				<legend>	<a href="<?php echo site_url("welcome/add_cate");?>"  > THÊM MỚI </a></legend>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Tên</th>
								  <th>Danh mục cha</th>  
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							 <?php foreach($listcate as $cate):?>
							 	
							<tr>
								<td>
							 <a href="<?php echo site_url('welcome/edit_cate/'.$cate->id);?>"><?php echo $cate->catename;?></a>
								 </td> 
								<td class="center">
									<?php foreach($listcateroot as $cateroot):?>
										<?php if($cateroot->id == $cate->cateroot):?>
											<?php echo $cateroot->catename;?>
										<?php endif;?> 
									<?php endforeach;?>
								</td>
								 
								<td class="center">
									<a href="<?php echo site_url('welcome/edit_cate/'.$cate->id);?>">Sửa</a> &nbsp;
									<a href="<?php echo site_url("welcome/del_cate/".$cate->id);?>"> Xóa</a>
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