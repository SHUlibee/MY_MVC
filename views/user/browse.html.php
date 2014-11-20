<?php include '/../common/header.html.php';?>

<h1>Welcome to Our Website!</h1>
<hr />
<div class="datatable-head-span datatable-span fixed-left">
<table class="table table-datatable table-hover">
	<thead>
		<tr>
			<th>ĞÕÃû</th>
			<th>ÓÊÏä</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user):?>
		<tr>
			<th><?php echo $user->name?></th>
			<th><?php echo $user->email?></th>
		</tr>
	<?php endforeach;?>
	</tbody>
</table>
</div>
<script>
	$('table.datatable').datatable();
</script>

<?php include '/../common/footer.html.php';?>