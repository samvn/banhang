<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
 $(document).ready(function() {
 	var refreshId = setInterval(function()
{
 	     $('#responsecontainer').fadeOut("slow").load('<?php echo site_url('report/get_item_report'); ?>').fadeIn("slow");
}, 1000);

});
</script>
<div id="responsecontainer"></div>
