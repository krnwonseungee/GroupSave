<div class='container-fluid row'>
	<div class='col-xs-12'>
		<h2>Reset your password?</h2><hr>
	</div>
	<div class='col-xs-12 col-sm-7 col-md-8 col-lg-9'>
		<div class='content'>Please provide the username or email address that you you used when you signed up.</div>
		<div class='content'>We will send you an email that will allow you to reset your password.</div>
	</div>
	<div class='col-xs-12 col-sm-5 col-md-4 col-lg-3'>
		<div style='height: 20px;'></div>
		<div id='resetForm' class='curve' style='border: 1px #ccc solid; background: #eee; padding: 10px;'>
			<form>
				<div class="input-group napk-margin-bottom" style='padding-bottom: 4px;'>
		  			<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
		  			<input class="form-control" type="text" id='lu' placeholder="Username or Email">
				</div>
				<button id='sendReset' type="button" class="btn btn-success" style='margin: 10px 0px 0px 0px;' onclick='document.location.href="/c/resetPassword";'>Send Verification Email</button>
			</form>
		</div>
	</div>
</div>