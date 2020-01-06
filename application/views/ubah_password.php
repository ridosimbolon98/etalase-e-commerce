<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reset Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/plugins/iCheck/square/blue.css">

  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/logo.png">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    Reset password untuk
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><?php echo $this->session->userdata('reset_email'); ?></p>

    <form action="<?= base_url(); ?>login/resetPass" method="post">
      <div class="form-group has-feedback">
      	<label>Password baru</label>
        <input id="passBaru" type="password" name="password" class="form-control" placeholder="Masukkan password baru" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      	<label>Konfirmasi Password</label>
        <input id="konfPass" type="password" name="konfirmasi_password" class="form-control" placeholder="Konfirmasi password baru" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      	<span id="alertPass"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Reset password</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= base_url(); ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url(); ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url(); ?>assets/admin/plugins/iCheck/icheck.min.js"></script>

<script>
	//ubah password validasi
	const passBaru = document.getElementById('passBaru');
	const konfPass = document.getElementById('konfPass');

	konfPass.addEventListener('input', () => {
		let alertPass = document.getElementById('alertPass');
		
		if (passBaru.value != konfPass.value) {
			alertPass.innerHTML = '*Konfirmasi password tidak sama!';
		} else {
			alertPass.setAttribute('class', 'text-success');
			alertPass.innerHTML = '<i class="fa fa-check mt-2"></i>';
		}
	});
</script>

</body>
</html>
