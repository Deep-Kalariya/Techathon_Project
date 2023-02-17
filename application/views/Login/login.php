<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<title><?php echo $title; ?></title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="<?php echo base_url('assets/css/pages/login/classic/login-5.css'); ?>" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="<?php echo base_url('assets/plugins/global/plugins.bundle.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/plugins/custom/prismjs/prismjs.bundle.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/css/style.bundle.css'); ?>" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<link rel="shortcut icon" href="<?php echo base_url('assets/media/logo/favicon.ico'); ?>" />
		<style type="text/css">
			.back{
				background-image: url('<?php echo base_url("assets/media/bg/bg-2.jpg"); ?>');
			}
			select,input::-webkit-outer-spin-button,
			input::-webkit-inner-spin-button {
			  -webkit-appearance: none;
			  margin: 0;
			}
		</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid back">
					<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="<?php echo base_url('login') ?>">
								<!-- <img src="<?php echo base_url(); ?>/assets/media/logo/login_logo.png" class="h-auto w-75" alt="Logo" /> -->
								<h1>Infinity Visit Login</h1>
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<form class="form" id="kt_login_signin_form">
								<div class="form-group">
									<input class="form-control h-auto shadow-none text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="email" name="email" id="email" placeholder="Email">
								</div>
								<div class="form-group">
									<input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="password" placeholder="Password" name="password" />
								</div>
								<div class="form-group">
									<select class="form-control h-auto text-white-50 bg-white-o-5 rounded-pill border-0 py-4 px-8" id="user_type" name="user_type">
										<option class="text-dark font-weight-bold" label="">Select Type</option>
										<?php
										$data = $this->Custom_model->getRows(USER_TYPE);
										foreach ($data as $value) {
										?>
											<option class="text-dark font-weight-bold" value="<?= $value->userTypeId; ?>"><?= $value->name; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group text-center mt-10">
									<button id="kt_login_signin_submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3">Sign In</button>
								</div>
							</form>
						</div>
						<!--end::Login Sign in form-->
					</div>