<?php include '/../common/header.html.php';?>

<div class="row">
	<div class="col-md-2">
		<?php include '/../common/menu.html.php';?>
	</div>
	<div class="col-md-10">
		<?php include(View_Lib::$VIEW_FILE);?>
	</div>
</div>

<style type="text/css">
#menu-panel{
	margin: 0 auto;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-left: 20px;
	width: 250px;
}
</style>

<?php include '/../common/footer.html.php';?>