<?php
	session_start(); 

	if( $_SESSION["connecter"] != 1)
	{
		echo "<script type='text/javascript'>";
            echo "alert('Connectez-vous!');
            window.location.href='login.php';";
		echo "</script>";
		
	}

?>

<?php
include_once '../../Model/commande.php';
include_once '../../Controller/commandeC.php';
$commandeC = new commandeC();
$plats = $commandeC->getPlats();

$error = "";

// create commande
$commande = null;

// create an instance of the controller
$commandeC = new commandeC();
if (

    isset($_POST["nomclient"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["numerotel"]) &&
    isset($_POST["idPlat"])

) {
    if (
        !empty($_POST["nomclient"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["numerotel"]) &&
        !empty($_POST["idPlat"])
    ) {
        $Commande = new Commande(

            $_POST["nomclient"],
            $_POST['adresse'],
            $_POST['numerotel'],
            $_POST['idPlat']

        );
        $commandeC->ajouterCommande($Commande);
        //header('Location:../front/blogs.php');
    } else
        echo "Missing information";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ajouter Commande</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
    <script src="js/controleSaisieCommande.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require_once 'sidebar.php';
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $usr= $_SESSION["username"]; include "topbar.php"; ?>
                <!-- End of Topbar -->


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <form method="post" action="validAjoutCommande.php" id="form" onsubmit="return verif();>

                        <div class="form-group">
                            <label for="nomclient">Entrer le nom de client</label>
                            <input type="text" class="form-control" name="nomclient" id="nomclient" placeholder="Nomclient" required>
                        </div>
                        <label id="labelnomclient" name="labelnomclient" style="color:#eb1212">  </label>
                        <div class="form-group">
                            <label for="adresse">Entrer l'adresse de client</label>
                            <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Adresse" required>
                        </div>
                        <label id="labeladresse" name="labeladresse" style="color:#eb1212">  </label>
                        <div class="form-group">
                            <label for="numerotel">Entrer le numero de telephone</label>
                            <input type="tel" class="form-control" name="numerotel" id="numerotel" placeholder="12-345-678" required>
                        </div>
                        <label id="labelnumero" name="labelnumero" style="color:#eb1212">  </label>
                   

                       
                        <div class="form-group">
                            <label for="idPlat">Choisir l'id de plat</label>
                            <select class="form-control" name="idPlat" id="idPlat" required>
                                <option value="" selected></option>
                                <?php 
                                    foreach($plats as $plat){
                                ?>
                                <option value="<?php echo $plat['idPlat'] ?>"><?php echo $plat['idPlat'] ?></option>
                                <?php
                                    }    
                                ?>
                            </select>
                        </div>
                        <label id="labelidPlat" name="labelidPlat" style="color:#eb1212">  </label>


                        <button id="sbb" type="submit" value="Envoyer" class="btn btn-primary" onclick="verif();">Ajouter</button>

                    </form>
                    <br>
                    <div id="error" style="color :red;"></div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>