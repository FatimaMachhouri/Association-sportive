<!-- en-tête de chaque page -->
<header id="header" class="header">

  <div class="header-menu">

    <div class="col-sm-7">

      <div class="header-left">


        <!-- Si on a quelqu'un qui est connecté, on affiche son nom, prénom dans la barre en haut -->
        <?php if ( !empty($_COOKIE['identifiantCookie']) ) { ?>
          <div class="header-left">
            <h4> Utilisateur : <?php echo $_COOKIE['prenomCookie'] . " " . $_COOKIE['nomCookie']?> </h4>
          </div>

        <?php
        }
        ?>

      </div>

    </div>
  </div>

</header>
