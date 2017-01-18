<form action="proses.php" method="post">
	<div class="form-group">
		<label>username</label>
		<input type="text" name="user_name" class="form-control" />
	</div>
	<div class="form-group">
		<label>password</label>
		<input type="password" name="user_pass" class="form-control" />
	</div>
	<div class="form-group">
		<div class="pull-right">
			<button type="reset" class="btn btn-default">Hapus</button>
			<button type="submit" class="btn btn-success" name="login">Login</button>
		</div>
	</div>
</form>