<?php
@ob_start();
session_start();
if (isset($_POST['proses'])) {
	require 'config.php';

	$user = strip_tags($_POST['user']);
	$pass = strip_tags($_POST['pass']);
	$sql = 'SELECT * FROM member WHERE user = ? AND pass = MD5(?)';
	$row = $config->prepare($sql);
	$row->execute(array($user, $pass));
	$jum = $row->rowCount();
	if ($jum > 0) {
		$hasil = $row->fetch();
		$_SESSION['admin'] = $hasil;
		echo '<script>alert("Login Sukses");window.location="index.php"</script>';
	} else {
		echo '<script>alert("Login Gagal");history.go(-1);</script>';
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Login - POS Codekop</title>
	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="sb-admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-dark">
	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">
			<div class="col-md-5 mt-5">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="p-5">
							<div class="text-center">
								<h4 class="h4 text-gray-900 mb-4"><b>Login POS Codekop</b></h4>
							</div>
							<form class="form-login" method="POST">
								<div class="form-group">
									<input type="text" class="form-control form-control-user" name="user" placeholder="User ID" autofocus>
								</div>
								<div class="form-group">
									<input type="password" class="form-control form-control-user" name="pass" placeholder="Password">
								</div>
								<button class="btn btn-primary btn-block" name="proses" type="submit"><i class="fa fa-lock"></i>
									SIGN IN</button>
							</form>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>