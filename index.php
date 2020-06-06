<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="kidelag">
    <link rel="icon" href="../../favicon.ico">

    <title>Panel - GoldenHat</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="golden.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Golden Hat</a>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="starter-template">
        <h1>HISTORIQUE DES VENTES</h1>
      </div>
      
        <form method="post">
          <div class="col-lg-12">
            <br>
            <div class="col-md-2 col-sm-12">
            <div class="form-group">
            <label>Date</label><input type="date" class="form-control" name="dat">
            </div>
            </div>
            <div class="col-md-5 col-sm-12">
            <div class="form-group">
            <label>Nom</label><input type="text" class="form-control" name="nom" placeholder="Entrez le nom de l'acheteur..">
            </div>
            </div>
            <div class="col-md-5 col-sm-12">
            <div class="form-group">
            <label>Numéro</label><input type="text" class="form-control" name="numero" placeholder="Entrez le numéro de l'acheteur..">
            </div>
            </div>
            <div class="col-md-5 col-sm-12">
            <div class="form-group">
            <label>Produit vendu</label><input type="text" class="form-control" name="description" placeholder="Quel est le(s) produit(s) vendu(s) ?">
            </div>
            </div>
            <div class="col-md-2 col-sm-12">
            <div class="form-group">
            <label>Prix de vente</label><input type="text" class="form-control" name="prix" placeholder="Montant total">
            </div>
            </div>
            <div class="col-md-3 col-sm-12">
            <div class="form-group">
            <label>Nom du vendeur</label><input type="text" class="form-control" name="vendeur" placeholder="Entrez le nom du vendeur..">
            </div>
            </div>
            <div class="col-md-2 col-sm-12">
            <p>&nbsp;</p>
            <button type="submit" class="btn btn-primary">GO !</button>
            </div>
            </br>
          </div>
        </form>

<hr>

<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'password');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if (isset($_POST['nom'])) {
$bdd->exec('INSERT INTO golden(dat, nom, numero, description, prix, vendeur) VALUES("'.$_POST['dat'].'","'.$_POST['nom'].'","'.$_POST['numero'].'","'.$_POST['description'].'","'.$_POST['prix'].'","'.$_POST['vendeur'].'")');
}
?>

<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'password');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM golden');
?>

<table class="table">
  <thead class="thead">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">Nom</th>
      <th scope="col">Numéro</th>
      <th scope="col">Produit vendu</th>
      <th scope="col">Prix</th>
      <th scope="col">Vendeur</th>
    </tr>
  </thead>

  <?php
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>

<tbody>
    <tr>
      <td><?php echo $donnees['id']; ?></td>
      <td><?php echo $donnees['dat']; ?></td>
      <td><?php echo $donnees['nom']; ?></td>
      <td><?php echo $donnees['numero']; ?></td>
      <td><?php echo $donnees['description']; ?></td>
      <td><?php echo $donnees['prix']; ?></td>
      <td><?php echo $donnees['vendeur']; ?></td>
    </tr>

<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>

</table>
    <!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
