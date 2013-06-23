<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2> Hôm nay / <?php echo date("d-m-Y");?></h2>
						 
					</div>
					<div class="box-content">
						<script type="text/javascript"> 
							$(function(){ 
							$('#txtDate_order').datepicker({ dateFormat: 'dd-mm-yy' });
							});  
						</script>
							<input id="txtDate_order" type="text"  >
							
					  	<div id="load_tweet">
						   
						<span class="resultajax"> 
						
						</span>    
					  </div>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->