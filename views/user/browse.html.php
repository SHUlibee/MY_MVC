
<div id="work-panel" class="panel">
	<div class="panel-heading">ϵͳ->�û�</div>
	<div class="panel-body">

		<table class="table datatable">
			<thead>
				<tr>
					<th>����</th>
					<th>����</th>
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
</div>
<script>
	$('table.datatable').datatable({
		sortable: true
	});
</script>

