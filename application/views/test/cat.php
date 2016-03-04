
<div class="table-responsive">
<table class="table table-bordered">
	<thead>
		<tr>
			<th colspan="2">Catagories</th>
			<th><?php 
				echo '<p data-toggle="modal" data-target="#Form" onclick="';
				echo "$('#Form .modal-body').load('".site_url('Test/edit_category')."')";
				echo '" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> New</p> ';
			?></tr>
		<tr>
			<th>Name</th>
			<th colspan="2">Description</th>
		</tr>
    </thead>
	<tbody>
<?php
	foreach($querys as $query){
		echo '<tr><td>';
		echo $query->name;
		echo '</td><td>';
		echo $query->detail;
		echo '</td><td>';
		echo '<p data-toggle="modal" data-target="#Form" onclick="';
		echo "$('#Form .modal-body').load('".site_url('Test/edit_category/'.$query->uid)."')";
		echo '" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-cog"></span></p> ';
		echo '<p data-toggle="modal" data-target="#Form" onclick="';
		echo "$('#Form .modal-body').load('".site_url('Test/delete_category/'.$query->uid)."')";
		echo '" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-remove-sign"></span></p> ';
		echo '</td></tr>';
	}
?>

</table>
</div> 