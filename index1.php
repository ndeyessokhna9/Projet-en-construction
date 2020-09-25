<?php
		
	$firstname = $name = $email = $phone = $message = ""; //on déclare les variables vide

	$firstnameError = $nameError = $emailError = $phoneError = $messageError = "";
	$isSuccess = FALSE;//1er traitement du message de remerciment donc il n'apparait pas sur la page car on le défini faux
	$emailTo="ndeyessokhna9@gmail.com";


	if ($_SERVER['REQUEST_METHOD']=="POST") {

		$firstname=$_POST["firstname"];//ici on  les récupère si l'utilisateur met écritquelques choses et appuis sur le button d'envoi
		$name= verifyInput($_POST["name"]);
		$email= verifyInput($_POST["email"]);
		$phone= verifyInput($_POST["phone"]);
		$message=verifyInput($_POST["message"]);
		$isSuccess=true;//2er traitement du message de remerciment donc il apparait  sur la page si on remplie tous les champs ,car on le défini vrai
		$emailText="";

		if (empty($firstname)) {

			$firstnameError="je veux connaitre ton prénom!"; //validation  du coté servuer pour le prénom
			$isSuccess=false;
		}
		else{
			$emailText .="Firstname : $firstname\n";
		}
		
		if (empty($name)) {

			$nameError="Et oui je veux tout savoir.Meme ton nom!"; //validation du coté servuer pour le nom
			$isSuccess=false;
		}
		else{
			$emailText .="Name : $name\n";
		}

		if (!isPhone($phone)) {//si c 'est pas un numéro de tel on aura le message d'erreur suivant
			$phoneError="Que des chiffres et des spaces,stp...!";
			$isSuccess=false;

			}
		else
		{
			$emailText .="Phone : $phone\n";
		}
		
		if(!isEmail($email)) 
		{//si c 'est pas un email on aura le message d'erreur suivant
			$emailError=" T'essais de me rouler.C'est pas un email ça!"; //validation pour l'email
			$isSuccess=false;
		}
		else{
			$emailText .="Email : $email\n";
		}


		if (empty($message)) {

			$messageError="Qu'est-ce-tu veux me dire!"; //validation du coté servuer pour le message
			$isSuccess=false;
		}
		else{
			$emailText .="Messages : $message\n";
		}
		if ($isSuccess)
		 {
			$headers ="From: $firstname $name <$email>\r\nReply-To: $email";//d'ou vient l'email et qui va répondre
			mail($emailTo,"Un message de votre site", $emailText , $headers);//envoie du email
			
			// $firstname = $name = $email = $phone = $message = "";
		}


		
		
	}
	function isPhone($var){//validation pour le numéro de tel
		return preg_match("/^[0-9 ]*$/", $var);
	}
	function isEmail($var){//validation pour l'email
		return filter_var($var, FILTER_VALIDATE_EMAIL);
	}
	
	function verifyInput($var)
	{
		$var=trim($var);
		$var=stripcslashes($var);
		$var=htmlspecialchars($var);
		return $var;
	}

  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewpot" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
				<form id="contact-form" method="post" action= "<?php echo htmlspecialchars( $_SERVER['PHP_SELF']); ?>" role="form"><!--  action=trouver la page du serveur cad  autre page qui est la mm page si on appuis sur le bouton submit -->
					<div class="row">

						<div class="col-md-6">
							<label for="firstname"> Prénom<span class="blue"> *</span></label>
							<input type="text" id="firstname" name="firstname" class="form-control" placeholder="Votre prénom" value="<?php echo $firstname ;?>"><!--  value=recupérer le prénom ds le formulaire -->
							<p class="comments"><?php echo "$firstnameError"?></p>
						</div>

						<div class="col-md-6">
							<label for="name">Nom<span class="blue"> *</span></label>
							<input type="text"   id="name" name="name" class="form-control" placeholder="Votre nom"  value="<?php echo $name ?>">
							<p class="comments"><?php echo "$nameError"?></p>
						</div>

						<div class="col-md-6">
							<label for="email">Email<span class="blue"> *</span></label>
							<input type="text" id="email" name="email" class="form-control" placeholder="Votre email" !-- value="<?php echo $email ?>" -->
							<p class="comments"><?php echo "$emailError"?></p>
						</div>

						<div class="col-md-6">
							<label for="phone">Téléphone</label>
							<input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre téléphone" value="<?php echo $phone ?>">
							<p class="comments" ><?php echo "$phoneError"?></p>
						</div>

						<div class="col-md-12">
							<label for="message"> Messages <span class="blue"> *</span></label>
							<textarea id="message"name="message" class="form-control" placeholder="Votre message" rows="4"> <?php echo "$message" ?> </textarea>
							<p class="comments"><?php echo "$messageError"?></p>
						</div>

						<div class="col-md-12">
							<p class="blue"> <strong>* Ces informations sont requises</strong></p>
						</div>

						<div class="col-md-12">
							<input type="submit" class="button1" value="Envoyer">
						</div>
					</div>
					<p class="thank-you" style ="display:<?php if($isSuccess) echo 'block'; else echo 'none';?>";> Votre message a bien été envoyé .Merci de m'avoir contacté:) </p>
					
				</form>
			</div>
			
		</div>
		
	</div>

</body>
</html>
	 