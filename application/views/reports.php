<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2> Hôm nay / <?php echo date("d-m-Y");?></h2>
						 
					</div>
					<div class="box-content">
						<script type="text/javascript">
						$(document).ready(function() {
						  $.ajaxSetup({ cache: false }); // This part addresses an IE bug.  without it, IE will only load the first number and will never refresh
						  setInterval(function() {
						    $('#load_tweet').load('<?php echo site_url("welcome/loadajaxorder") ?>');
						  }, 100); // the "3000" 
						}); 
						</script>


					  	<div id="load_tweet">
						        
					  </div>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->