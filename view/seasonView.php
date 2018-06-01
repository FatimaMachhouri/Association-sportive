<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Saisons </title>
    </head>

    <body>

        <?php
          $teamsTmp = $teams->fetchAll();
          while ($datas = $seasons->fetch()) {
        ?>

          <p>
            Date début saison : <?= htmlspecialchars($datas['dateDebutSaison']) ?>
            Date fin saison : <?= htmlspecialchars($datas['dateFinSaison']) ?>

            <?php foreach($teamsTmp as $datasTeams) {
              $idSaisonSaison = $datas['identifiantSaison'];
              $idSaisonEquipe = $datasTeams['identifiantSaison']; ?>
              <?php if ($idSaisonSaison == $idSaisonEquipe) {
                echo htmlspecialchars($datasTeams['nomEquipe']); ?>
                <a href="team.php?idTeam=<?php echo $datasTeams['identifiantEquipe']; ?>">Consulter</a>
              <?php }
            } ?>
          </p>


        <?php
          }
          $seasons->closeCursor();
        ?>



    </body>
</html>
