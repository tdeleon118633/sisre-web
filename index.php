<?php
//redireccionar a la vista de login
//TDELEON LOGIN
//header('location: vistas/login.html');
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>SISRE | ALUMNOS</title>
     <!-- Tell the browser to be responsive to screen width -->
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <!-- Bootstrap 3.3.5 -->
     <link rel="stylesheet" href="public/css/bootstrap.min.css">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="public/css/font-awesome.css">

     <!-- Theme style -->
     <link rel="stylesheet" href="public/css/AdminLTE.min.css">
     <!-- iCheck -->
     <link rel="stylesheet" href="public/css/blue.css">
     <link rel="shortcut icon" href="public/img/favicon.ico">

     <link rel="stylesheet" type="text/css" href="desing_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
     <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="desing_login/vendor/animate/animate.css">
    <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="desing_login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="desing_login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="desing_login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="desing_login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="desing_login/css/util.css">
     <link rel="stylesheet" type="text/css" href="desing_login/css/main.css">

     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
     <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
         <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
     <![endif]-->
   </head>
   <body class="hold-transition login-page">
     <div class="limiter">
     		<div class="container-login100">
     			<div class="wrap-login100">
     				<div class="login100-form-title" style="background-image: url(desing_login/images/bg-01.jpg);">
     					<span class="login100-form-title-1">
     						REGISTRO DE ESTUDIANTES
     					</span>
     				</div>
     				<form class="login100-form validate-form" method="post" id="frmAcceso" >
     					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
     						<span class="label-input100">Username</span>
     						<input class="input100" type="text"  id="logina" name="logina" placeholder="Enter username">
     						<span class="focus-input100"></span>
     					</div>

     					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
     						<span class="label-input100">Password</span>
     						<input class="input100" type="password" name="clavea" id="clavea" placeholder="Enter password">
     						<span class="focus-input100"></span>
     					</div>

     				<!--<div class="flex-sb-m w-full p-b-30">
     						<div class="contact100-form-checkbox">
     							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
     							<label class="label-checkbox100" for="ckb1">
     								Remember me
     							</label>
     						</div>

     						<div>
     							<a href="#" class="txt1">
     								Forgot Password?
     							</a>
     						</div>
     					</div>-->

     					<div class="container-login100-form-btn" >
     						<button class="login100-form-btn" style="background-color:#dd4b39">
     							Ingresar
     						</button>
     					</div>
     				</form>
     			</div>
     		</div>
     	</div>

     <!-- jQuery -->
     <script src="public/js/jquery-3.1.1.min.js"></script>
     <script src="desing_login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
     <script src="desing_login/vendor/bootstrap/js/popper.js"></script>
     <!-- Bootstrap 3.3.5 -->
     <script src="public/js/bootstrap.min.js"></script>
      <!-- Bootbox -->
     <script src="public/js/bootbox.min.js"></script>
     <script type="text/javascript" src="core/login.js"></script>


   </body>
 </html>
