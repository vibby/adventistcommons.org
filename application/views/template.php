<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Adventist Commons | <?php echo $title ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/assets/img/favicon.png"> 
		<link href="/assets/img/favicon.ico" rel="icon" type="image/x-icon">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
		<link href="/assets/css/theme.css" rel="stylesheet" type="text/css" media="all" />
	</head>

	<body>

		<div class="layout layout-nav-top">
			<div class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
				<a class="navbar-brand" href="/projects">
					<img src="/assets/img/logo.png" width="40" />
				</a>
				<div class="d-flex align-items-center">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="d-block d-lg-none ml-2">
						<?php if ( $this->ion_auth->logged_in() ) { ?>
							<div class="dropdown">
								<a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<img alt="Image" width="40" src="<?php echo "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->ion_auth->user()->row()->email ) ) ) . "?s=80"; ?>" class="avatar" />
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="/account" class="dropdown-item">Account Settings</a>
									<a href="/logout" class="dropdown-item">Log Out</a>
								</div>
							</div>
						<?php } else { ?>
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link" href="/login">Login</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="/register">Sign Up</a>
								</li>
							</ul>
						<?php } ?>
					</div>
				</div>
				<div class="collapse navbar-collapse justify-content-between" id="navbar-collapse">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="/projects">Translations In Progress</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/products">Products</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">How It Works</a>
						</li>
					</ul>
					<div class="d-lg-flex align-items-center mx-lg-2">
						<form class="form-inline my-lg-0 my-2 mx-lg-2">
							<div class="input-group input-group-dark input-group-round">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="material-icons">search</i>
									</span>
								</div>
								<input type="search" class="form-control form-control-dark" placeholder="Search" aria-label="Search app" aria-describedby="search-app">
							</div>
						</form>
						<div class="d-none d-lg-block">
							<?php if ( $this->ion_auth->logged_in() ) { ?>
								<div class="dropdown">
									<a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<img alt="Image" width="40" src="<?php echo "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->ion_auth->user()->row()->email ) ) ) . "?s=80"; ?>" class="avatar" />
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="/account" class="dropdown-item">Account Settings</a>
										<a href="/logout" class="dropdown-item">Log Out</a>
									</div>
								</div>
							<?php } else { ?>
								<ul class="navbar-nav">
									<li class="nav-item">
										<a class="nav-link" href="/login">Login</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="/register">Sign Up</a>
									</li>
								</ul>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="main-container">

				<div class="breadcrumb-bar navbar bg-white sticky-top">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<?php foreach( $breadcrumbs as $item ) { ?>
								<?php if( array_key_exists( "url", $item ) ) { ?>
									<li class="breadcrumb-item active"><a href="<?php echo $item["url"]; ?>"><?php echo $item["label"]; ?></a></li>
								<?php } else { ?>
									<li class="breadcrumb-item"><?php echo $item["label"]; ?></li>
								<?php } ?>
							<?php } ?>
						</ol>
					</nav>
				</div>
				<div class="container">
					<?php echo $contents ?>
				</div>

			</div>
		</div>

		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="/assets/js/autosize.min.js"></script>
		<script type="text/javascript" src="/assets/js/popper.min.js"></script>
		<script type="text/javascript" src="/assets/js/prism.js"></script>
		<script type="text/javascript" src="/assets/js/draggable.bundle.legacy.js"></script>
		<script type="text/javascript" src="/assets/js/swap-animation.js"></script>
		<script type="text/javascript" src="/assets/js/dropzone.min.js"></script>
		<script type="text/javascript" src="/assets/js/list.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="/assets/js/theme.js"></script>


	</body>

</html>
