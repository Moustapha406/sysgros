<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	{{-- <link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" /> --}}

	<title>Login Sysgros</title>

	
	{{-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet"> --}}

	<style>
		body{
			background-image: url('{{asset('assets/fonts/fond_patisen.png')}}') !important; 
			background-size:100% 100%;
			background-repeat:no-repeat;
		}
	</style>

	<link href="{{ asset('css/app_login.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
						
						</div>

						<div class="card card-primary">
							<div class="card-body">
								<div class="m-sm-3">
									<form method="POST" action="{{route('login')}}" class="needs-validation" novalidate="">
										@csrf
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
											@error('email')
												<div class="text-danger" >
													{{ $message }}
												</div>
											@enderror
										</div>
										<div class="mb-3">
											<label class="form-label">Mot de passe</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Mot de passe" />
											@error('password')
												<div class="text-danger" >
													{{ $message }}
												</div>
											@enderror
										</div>
										
										<div class="d-grid gap-2 mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Se connecté</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

</body>

</html>