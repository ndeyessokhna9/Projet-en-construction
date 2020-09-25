
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewpot" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title> Contactez-moi!</title>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
</head>
<body>
	<div class="container">
		<div class="diveder"></div>
		<div class="heading">
			<h2>contactez-moi </h2>
		</div>
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<form id="contact-form" method="post" action= "" role="form"><!--  action=trouver la page du serveur cad  autre page qui est la mm page si on appuis sur le bouton submit -->
					<div class="row">

						<div class="col-md-6">
							<label for="firstname"> Prénom <span class="blue"> *</span></label>
							<input type="text" id="firstname" name="firstname" class="form-control" placeholder="Votre prénom" value=""><!--  value=recupérer le prénom ds le formulaire -->
							<p class="comments"> </p>
						</div>

						<div class="col-md-6">
							<label for="name">Nom<span class="blue"> *</span></label>
							<input type="text" id="name" name="name" class="form-control" placeholder="Votre nom"  value="">
							<p class="comments"></p>
						</div>

						<div class="col-md-6">
							<label for="email">Email<span class="blue"> *</span></label>
							<input type="text" id="email" name="email" class="form-control" placeholder="Votre email" value="">
							<p class="comments"></p>
						</div>

						<div class="col-md-6">
							<label for="phone">Téléphone</label>
							<input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre téléphone" value="">
							<p class="comments" ></p>
						</div>

						<div class="col-md-12">
							<label for="message"> Messages <span class="blue"> *</span></label>
							<textarea id="message"name="message" class="form-control" placeholder="Votre message" rows="4">  </textarea>
							<p class="comments"></p>
						</div>

						<div class="col-md-12">
							<p class="blue"> <strong>* Ces informations sont requises</strong></p>
						</div>

						<div class="col-md-12">
							<input type="submit" class="button1" value="Envoyer">
						</div>
					</div>
					
					
				</form>
			</div>
			
		</div>
		
	</div>
<script src="css/js/script.js"></script>
</body>
</html>
	 