<?php include '/../common/header.html.php';?>

<div id="login-panel" class="panel">
	<div class="panel-heading">��ӭʹ�á��۷䲩�͡�</div>
	<div class="panel-body">
		<?php Html_lib::form('login.do_login', 'post', 'form-horizontal');?>
			<div class="input-group">
		        <span class="input-group-addon"><i class="icon-user"></i></span>
				<input name="account" type="text" class="form-control" placeholder="�û���">
				<!-- <span class="input-group-addon"><i class="icon-ok"></i></span> -->
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon fix-border"><i class="icon-key"></i></span>
				<input name="password" type="password" class="form-control" placeholder="����">
				<!-- <span class="input-group-addon"><i class="icon-remove"></i></span> -->
			</div>
			<br>
			<div class="input-group pull-right">
				<button class="btn btn-primary">��¼</button>
			</div>
			<br>
		<?php Html_Lib::endform();?>
	</div>
	<div class="panel-footer">��ע</div>
</div>

<style type="text/css">
#login-panel{
	margin: 0 auto;
	margin-top: 0px;
	margin-right: auto;
	margin-bottom: 0px;
	margin-left: auto;
	width: 540px;
}
</style>

<?php include '/../common/footer.html.php';?>