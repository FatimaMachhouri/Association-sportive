<!-- en-tête de chaque page -->
<header id="header" class="header">

  <div class="header-menu">
    <div class="col-sm-7">

      <div class="header-left">

        <div class="header-left">
          <h4> Utilisateur </h4>
        </div>

        <?php
        while ($datesSeason = $currentSeason->fetch())
        {
        ?>
          <strong> Saison : <?php echo htmlspecialchars($datesSeason['dateDebutSaison']); ?>
          / <?php echo htmlspecialchars($datesSeason['dateFinSaison']); ?> </strong>
        <?php
        }
        $currentSeason->closeCursor();
        ?>
      </div>

    </div>
  </div>

</header>
