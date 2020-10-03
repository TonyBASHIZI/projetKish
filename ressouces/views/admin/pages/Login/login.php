<?php
if (isset($_POST['submit'])) {
	if (!empty($_POST['password'])) {
		// var_dump($_POST);die();
		$auth = new \Core\Auth\DBAuth(App\App::getInstance()->getDb());
		$res = $auth->login($_POST['email'], $_POST['password']);
		// var_dump($_POST);die();
		// var_dump($res);die();
		if ($res) {

			header("location:index.php?p=welcome");
		} else {

			$error = "Identifiant telephone ou mot de passe incorrect";
		}
	} else {
		// die("les chamops sont vide");
		$error = "les champs sont vide";
	}
}

?>

<div class="wrapper">
	<div class="m-account-w" data-bg-img="">
		<div style="background-color:red;">


		</div>
		<div class="m-account">
			<div class="row no-gutters">
				<div class="col-md-6">
					<div class="m-account--content-w" data-bg-img="">
						<div class="m-account--content">
							<p><a href="https://play.google.com/store/apps/details?id=com.magocorporate.app.magocorporate">Lien google play store apk</a></p>

						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="m-account--form-w">
						<div class="m-account--form">
							<div class="logo">
								<img src="../assets/img/avatars/logoKis.jpeg" style="font-size: 35px; width:180px;" alt=""> </div>
							<?php
							if (isset($error)) {
								echo "" . $error;
							}

							?>
							<form action="" method="POST">
								<label class="m-account--title">Login to your account</label>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend"> <i class="fas fa-user"></i>
										</div>
										<input type="text" name="email" placeholder="Telephone" class="form-control" autocomplete="off" required>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<i class="fas fa-key"></i>
										</div>
										<input type="password" name="password" placeholder="Password" class="form-control" autocomplete="off" required>
									</div>
								</div>
								<div class="m-account--actions">
									<a href="#" class="btn-link">Forgot Password?</a>
									<button type="submit" name="submit" class="btn btn-rounded btn-info">Login</button>
								</div>
								<div class="m-account--alt">

									<div class="btn-list">
										<!-- <a href="#" class="btn btn-rounded btn-warning">Facebook</a> 
	 	 			 		 <a href="#" class="btn btn-rounded btn-warning">Google</a>  -->
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>