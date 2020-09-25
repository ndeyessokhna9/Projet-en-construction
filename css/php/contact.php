<?php
		
	// $firstname = $name = $email = $phone = $message = ""; //on déclare les variables vide

	// $firstnameError = $nameError = $emailError = $phoneError = $messageError = "";
		$array = array("firstname" =>" " , "name" =>" " ,"email"=>" " ,"phone"=>" ","message" =>" " ,"firstnameError" =>" ","nameError" =>" " ,"phoneError" =>" " ,"emailError" =>" " ,"messageError" =>" " ," $isSuccess " => FALSE );
	// $isSuccess = FALSE;//1er traitement du message de remerciment donc il n'apparait pas sur la page car on le défini faux
	$emailTo="ndeyessokhna9@gmail.com";


	if ($_SERVER['REQUEST_METHOD']=="POST") {

		$array[firstname]=$_POST["firstname"];//ici on  les récupère si l'utilisateur met écritquelques choses et appuis sur le button d'envoi
		$array["name"]= verifyInput($_POST["name"]);
		$array["email"]= verifyInput($_POST["email"]);
		$array["phone"]= verifyInput($_POST["phone"]);
		$array["message"]=verifyInput($_POST["message"]);
		$array["isSuccess"]=true;//2er traitement du message de remerciment donc il apparait  sur la page si on remplie tous les champs ,car on le défini vrai
		$emailText="";

		if (empty($array["firstname"])) {

			$array["firstnameError"]="je veux connaitre ton prénom!"; //validation  du coté servuer pour le prénom
		$array["isSuccess"]=false;
		}
		else{
			$emailText .="Firstname :{$array["firstname"]}\n";
		}
		
		if (empty($array["name"])) {

			$array["nameError"]="Et oui je veux tout savoir.Meme ton nom!"; //validation du coté servuer pour le nom
			$array["isSuccess"]=false;
		}
		else{
			$emailText .="Name : {$array["name"]}\n";
		}

		if (!isPhone($array["phone"])) {//si c 'est pas un numéro de tel on aura le message d'erreur suivant
			$phoneError="Que des chiffres et des spaces,stp...!";
			$array["isSuccess"]=false;

			}
		else
		{
			$emailText .="Phone : {$array["phone"]}\n";
		}
		
		if(!isEmail($array["email"])) 
		{//si c 'est pas un email on aura le message d'erreur suivant
			$emailError=" T'essais de me rouler.C'est pas un email ça!"; //validation pour l'email
			$array["isSuccess"]=false;
		}
		else{
			$emailText .="Email : {$array["email"]}\n";
		}


		if (empty($array["message"])) {

			$array["messageError"]="Qu'est-ce-tu veux me dire!"; //validation du coté servuer pour le message
			$array["isSuccess"]=false;
		}
		else{

			$emailText .="Messages : {$array["message"]}\n";
		}

		if ($array["isSuccess"])
		 {
			$headers ="From: {$array["firstname"]} {$array["name"]}<{$array["email"]}>\r\nReply-To: {$array["email"]}";//d'ou vient l'email et qui va répondre
			mail($emailTo,"Un message de votre site", $emailText , $headers);//envoie du email
			
		}
		echo json_encode($array);


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

  <?php echo htmlspecialchars( $_SERVER['PHP_SELF']); ?><!--  action=trouver la page du serveur cad  autre page qui est la mm page si on appuis sur le bouton submit -->
  <?php echo "$firstname" ;?>
  <?php echo "$firstnameError";?>
  <?php echo "$name" ;?>
  <?php echo "$nameError";?>
  <?php echo "$phone" ;?>
  <?php echo "$phoneError";?>
 <?php echo "$email ";?>
 <?php echo "$emailError";?>
 <?php echo "$message"; ?>
 <?php echo "$messageError";?>