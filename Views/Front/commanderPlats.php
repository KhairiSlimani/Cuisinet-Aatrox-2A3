<?php 

session_start();
include "../../Controller/commandeC.php";
include_once  "../../Model/plats.php";
$commandeC = new commandeC();
$plats = $commandeC->getPlats();


$commandeC= new CommandeC();
try{

	$id_plat=$_GET["idPlat"];
	$plat =$commandeC->getPlatById($id_plat);
}
catch(Exception $e){
	echo $e;
}
//echo $plat->toString();






?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Taste.it - Free Bootstrap 4 Template by Colorlib</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/animate.css">
	
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">

	
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<!-- header -->
		<?php $page="Commande"; include "header.php"; ?>
	<!-- END header -->
	<section class="ftco-section ftco-wrap-about ftco-no-pb ftco-no-pt">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-sm-12 p-4 p-md-5 d-flex align-items-center justify-content-center bg-primary">
                                   
				  <form method="post" action="validCommande.php?idPlat=<?PHP echo $_GET["idPlat"]; ?>"  onsubmit="return verif();" >

				<form action="#" class="appointment-form">
						<h3 class="mb-3">Commandez votre plats</h3>
						<div class="row justify-content-center">
                               <input type="hidden" class="form-control" name="idclient" id="idclient" readonly value="<?PHP echo $_SESSION['id']; ?>">
							<div class="col-md-4">
								<div class="form-group">
							<input type="text" class="form-control" name="nomclient" id="nomclient" readonly value="<?PHP echo $_SESSION['username']; ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
                             <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Adresse" required>
								</div>
							</div>
							<label id="labeladresse" name="labeladresse" style="color:white">  </label>
							<div class="col-md-4">
								<div class="form-group">
                             <input type="text" name="numerotel" class="form-control"  id="numerotel" placeholder="Numero de téléphone" required>
							</div>
							</div>
							<label id="labelnumero" name="labelnumero" style="color:white">  </label>
                           <div class="col-md-4">
								<div class="form-group">
                                      <input type="text" name="commande" class="form-control"  value="<?PHP echo $plat['nom']; ?>" required >
							    </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input id="submit" type="submit" value="Commander" onclick="verif();"  class="btn btn-white py-3 px-4">
								</div>
							</div>
							
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

    <section class="ftco-section">
		<div class="container">
			<div class="row d-flex">
				<div class="col-md-6 d-flex">
					<div class="img img-2 w-100 mr-md-2" style="background-image: url(images/bg_6.jpg);"></div>
					<div class="img img-2 w-100 ml-md-2" style="background-image: url(images/bg_4.jpg);"></div>
				</div>
				<div class="col-md-6 ftco-animate makereservation p-4 p-md-5">
					<div class="heading-section ftco-animate mb-5">
						<span class="subheading">Ce sont nos secrets</span>
						<h2 class="mb-4">Plats parfaits et bon service</h2>
						<p>Nous utilisons de nombreux ingrédients exquis et rares dans nos plats et faisons en sorte que le client se sente comme chez lui
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- footer -->
		<?php require_once "footer.php"; ?>				
	<!-- END footer -->


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/jquery.timepicker.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>
	<script src="js/controleSaisieCommande.js"></script>
		
	</body>
	</html>