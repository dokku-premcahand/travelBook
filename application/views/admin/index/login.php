<!DOCTYPE html>
<html >
	<head>
		<meta charset="UTF-8">
		<title>Admin Login</title>
		<link rel="stylesheet" href="<?php echo base_url('public/css/admin/normalize.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('public/css/admin/style.css'); ?>">
		<style>
		/* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
		</style>
		<script src="<?php echo base_url('public/js/admin/prefixfree.min.js'); ?>"></script>
	</head>

	<body>
		<div class="login">
			<h1>Admin Login</h1>
			<form method="post" action="<?php echo base_url('admin/index/authenticate'); ?>">
				<input type="text" name="username" placeholder="Username" required="required" />
				<input type="password" name="password" placeholder="Password" required="required" />
				<button type="submit" class="btn btn-primary btn-block btn-large">Login</button>
			</form>
		</div>
		<script src="<?php echo base_url('public/js/admin/index.js'); ?>"></script>
	</body>
</html>
