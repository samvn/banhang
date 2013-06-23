					<table class="table table-striped table-bordered  ">
						  <thead>
							  <tr> 
								  <th>Tên bàn</th> 
								  <th>Món</th> 
								  <th>Thời gian</th>  
								  <th>Số lượng</th>
								  <th></th>
							  </tr>
						  </thead>   
						  <tbody>
						 	
							 <?php foreach($allitemstatus as $itemstatus):?>
							 <?php if($itemstatus->status == 0):?>
							<tr style="color:red;">
								<td>
									<?php foreach($order_table_name as $order): ?>	
										<?php if($order->id == $itemstatus->order_id):?>
											<?php echo $order->order_name; ?>
										<?php endif;?>
									<?php endforeach;?>
								</td>
								<td><?php echo $itemstatus->item_name; ?></td>
								<td><?php echo $itemstatus->time_create; ?></td> 
								<td class="center">
									<?php echo $itemstatus->amount;?>
								</td>
								<td class="center">
									 <a id="clearorder" name="clearorder" href="<?php echo site_url('welcome/finishorder/'.$itemstatus->id)?>">Clear</a>
								</td>
							</tr>
								<?php else: ?>
								<tr>
								<td><?php echo $itemstatus->order_id; ?></td>
								<td><?php echo $itemstatus->item_name; ?></td>
								<td><?php echo $itemstatus->time_create; ?></td> 
								<td class="center">
									<?php echo $itemstatus->amount;?>
								</td> 
								<td class="center">
									 
								</td>
							</tr>
							<?php endif; ?>
							 
							<?php endforeach;?>
							
						  </tbody>
					  </table>    