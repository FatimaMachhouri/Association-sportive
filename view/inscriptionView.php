<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Inscription</title>


              <div class="card-header">
                <strong>Inscription</strong>
              </div>

                <form action = "../controller/inscription.php" method="post" class="form-horizontal">

                  <div class="row form-group">
                    <div class="col-12 col-md-9"><input type="text" name="firstNameCoachInscri" placeholder="Nom" class="form-control"></div>
                  </div>

                  <div class="row form-group">
                    <div class="col-12 col-md-9"><input type="text" name="nameCoachInscr" placeholder="Prénom" class="form-control"></div>
                  </div>

                  <div class="row form-group">
                    <div class="col-12 col-md-9"><input type="email" name="emailCoachInscr" placeholder="Adresse mail" class="form-control"></div>
                  </div>

                  <div class="row form-group">
                    <div class="col-12 col-md-9"><input type="number" name="phoneNumberCoachInscr" placeholder="Numéro de téléphone" class="form-control"></div>
                  </div>

                  <div class="row form-group">
                    <div class="col-12 col-md-9"><input type="password" name="passwordInscr" placeholder="Mot de passe" class="form-control"></div>
                  </div>

                  <button type="submit" class="btn btn-primary btn-sm"> Ajouter </button>

                </form>



                <form action = "../controller/inscription.php" method="post" class="form-horizontal">

                  <div class="row form-group">
                    <div class="col-12 col-md-9"><input type="email" name="emailConnexion" placeholder="Adresse mail" class="form-control"></div>
                  </div>

                  <div class="row form-group">
                    <div class="col-12 col-md-9"><input type="password" name="passwordConnexion" placeholder="Mot de passe" class="form-control"></div>
                  </div>

                  <button type="submit" class="btn btn-primary btn-sm"> Se connecter </button>

                </form>
          <!-- Form add coach -->


</body>
</html>
