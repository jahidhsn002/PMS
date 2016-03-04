<div class="container"><div class="row">
	<div  class="col-sm-12">
		<div class="alert alert-warning fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			<strong>Massage!</strong><div class="dox"></div>
		</div>
	</div>
	<div class="col-sm-6">
		<div id="category">
			
			
		</div>
	</div>
	<div class="col-sm-6">
		<div id="Test">
			
			
		</div>
	</div>
</div></div>

<!-- Modal -->
<div id="Form" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
		<div class="modal-body"></div>
    </div>
	
  </div>
</div>
<script>
	$("#Test").load("<?php echo site_url('Test/view_category'); ?>");
	$("#category").load("<?php echo site_url('Test/view_category'); ?>");	
</script>