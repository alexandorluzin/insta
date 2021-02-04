<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Регистрация Insta</title>
		<meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
		<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
		<meta name="author" content="hencework"/>

		<!-- Favicon -->
		<link rel="shortcut icon" href="https://ratatuiperm.ru/ratatuiadmin/favicon.ico">
		<link rel="icon" href="https://ratatuiperm.ru/ratatuiadmin/favicon.ico" type="image/x-icon">

		<!-- vector map CSS -->
		<link href="https://ratatuiperm.ru/ratatuiadmin/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>



		<!-- Custom CSS -->
		<link href="https://ratatuiperm.ru/ratatuiadmin/dist/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->

		<div class="wrapper pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="index.php">
						<img class="brand-img mr-10" src="https://ratatuiperm.ru/ratatuiadmin/img/logo.png" alt="brand"/>
						<span class="brand-text">Lift</span>
					</a>
				</div>
				<div class="form-group mb-0 pull-right">
					<span class="inline-block pr-10">Уже есть аккаунт?</span>
					<a class="inline-block btn btn-info btn-rounded btn-outline" href="login.php">Авторизация</a>
				</div>
				<div class="clearfix"></div>
			</header>

			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Регистрация в Insta</h3>
											<h6 class="text-center nonecase-font txt-grey">Заполните форму</h6>
										</div>
										<div class="form-wrap">
											<form action="" method="POST">
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">Телефон</label>
													<input type="text" class="form-control" data-mask="89999999999" required="" id="tel" name="tel" placeholder="Введите телефон">
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Пароль</label>
													<input type="password" class="form-control" required="" id="pass" name="pass" placeholder="Придумайте пароль">
												</div>
												<div class="alert alert-danger alert-dismissable" id="errorBlock">

												</div>
												<div class="form-group text-center">
													<button type="button" id="signup" class="btn btn-info btn-rounded">Зарегистрироваться</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
				</div>

			</div>
			<!-- /Main Content -->

		</div>
		<!-- /#wrapper -->

		<!-- JavaScript -->


		<!-- // Ajax Library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<!-- jQuery -->
		<script src="https://ratatuiperm.ru/ratatuiadmin/vendors/bower_components/jquery/dist/jquery.min.js"></script>

		<script>
			// Обработка формы через Ajax
			$('#signup').click(function () {
				var tel = $('#tel').val();
				var pass = $('#pass').val();

				var reload = function () {
					$('#signup').text('Перенаправляем в кабинет');
					setTimeout(function () {
						document.location.href = "users.php";
					}, 1000);
				};

				$.ajax({
					url: 'ajax/signup.php',
					type: 'POST',
					cache: false,
					data: {'tel' : tel, 'pass' : pass},
					dataType: 'html',
					success: function (data) {
						if(data == 'Готово') {
							$('#signup').text('Вы успешно зарегистрировались');
							$('#errorBlock').hide();
							$('#tel').val('');
							$('#pass').val('');
							setTimeout(reload, 1000);
						}
						else {
							$('#errorBlock').show();
							$('#errorBlock').text(data);
						}
					}
				});
			});

		 </script>

		<!-- Bootstrap Core JavaScript -->
		<script src="https://ratatuiperm.ru/ratatuiadmin/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="https://ratatuiperm.ru/ratatuiadmin/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

		<!-- Slimscroll JavaScript -->
		<script src="https://ratatuiperm.ru/ratatuiadmin/dist/js/jquery.slimscroll.js"></script>

		<!-- Init JavaScript -->
		<script src="https://ratatuiperm.ru/ratatuiadmin/dist/js/init.js"></script>
	</body>
</html>
