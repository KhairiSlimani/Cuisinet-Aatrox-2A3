<?php session_start(); ?>

<?php

include_once '../../Model/reservation.php';
include_once '../../Controller/reservationC.php';


$error = "";

// create an instance of the controller
$reservationC = new reservationC();
// if (

//     isset($_POST["idclient"]) &&
//     isset($_POST["numerotel"]) &&
//     isset($_POST["date"]) &&
//     isset($_POST["temps"]) &&
//     isset($_POST["nombre"])

// ) {
//     if (
//         !empty($_POST["idclient"]) &&
//         !empty($_POST["numerotel"]) &&
//         !empty($_POST["date"]) &&
//         !empty($_POST["temps"]) &&
//         !empty($_POST["nombre"])
//     ) {
        
//         //header('Location:../front/blogs.php');
//     } else
//         echo "Missing information";
// }

	
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
		<?php $page="Reservation"; include "header.php"; ?>
	<!-- END header -->
	<div id="google_translate_element"></div>
	<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement(
            {pageLanguage: 'en'},
            'google_translate_element'
        );
    }
  </script>
  <script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	<section class="ftco-section ftco-wrap-about ftco-no-pb ftco-no-pt">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-sm-12 p-4 p-md-5 d-flex align-items-center justify-content-center bg-primary">
                                   
				<form method="post" action="validReservation.php?idclient=<?PHP echo $_SESSION['id']; ?>"  onsubmit="return verif();">
					<?PHP
						if (isset($_GET['username'])) {

							$clientC = new clientC();
							$client = $clientC->recupererClientUS($_SESSION["username"]);
						}
								
					?>

				
						<h3 class="mb-3">Reservez votre Table</h3>
						<div class="row justify-content-center">
                               <input type="hidden" class="form-control" name="idclient" id="idclient" readonly value="<?PHP echo $_SESSION['id']; ?>">


							<div class="col-md-4">
								<div class="form-group">
							<input type="text" class="form-control" name="nomclient" id="nomclient" readonly value="<?PHP echo $_SESSION['username']; ?>">
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
			                   <input type="text" class="form-control" name="numerotel" id="numerotel" placeholder="Numero de telephone" required>
								</div>
							</div>
							<label id="labelnumero" name="labelnumero" style="color:white">  </label>
							<div class="col-md-4">
								<div class="form-group">
									<div class="input-wrap">
										<input type="date" class="form-control" name="date" id="date" placeholder="Date" required>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<div class="input-wrap">
										<input type="time"  class="form-control" name="temps" id="temps" placeholder="temps" required>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								<div class="input-wrap">
									<input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre" required>
								</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								<div class="input-wrap">
									<input type="submit" value="Réserver votre table maintenant" onclick="verif();" class="btn btn-white py-3 px-6">
								</div>
								</div>
							</div>
							
						</div>
					</form>
					
				</div>
				<div class="col-sm-12 d-flex align-items-center justify-content-center bg-primary">
					<div class="form-group">
						<a href="afficheReservation.php"><input id="bt" type="button" value="Affichez vos Reservations" class="btn btn-white py-3 px-4"></a>
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
	<script src="js/controleSaisieRes.js"></script>
		
	</body>
	</html>