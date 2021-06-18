<?php 

    include "../Controller/sujetC.php";

    $sujetC = new  forumC();

    $listeU = $sujetC->afficherThreads();

?>

<table>
    <tr>
        <th>user</th>
        <th>titre</th>
        <th>contenu</th>
        <th>date</th>
    </tr>
    <?php 
        foreach ($listeU as $forum) {
            ?>
    <tr>
        <td><?php echo $forum['utilisateur']; ?></td>
        <td><?php echo $forum['titre']; ?></td>
        <td><?php echo $forum['contenu']; ?></td>
        <td><?php echo $forum['date']; ?></td>
        <td> <a type="button"  href="modifierThread.php" > Modifier </a></td>
        <td> <a  type="button" href="supprimerThread.php" > Supprimer </a></td>

    </tr>
    <?php
        } ?>
</table>