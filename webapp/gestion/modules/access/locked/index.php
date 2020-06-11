<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="gray-bg">

<div style="margin-top: 5%;"></div>
    <div class="container text-center animated fadeInDown">
       <h1 class="logo-name text-uppercase" style="font-size: 50px; letter-spacing: 2px; margin-bottom: 5%;">session vérouillée</h1>

        <div class=" text-center">
            <div class="m-b-md">
            <img alt="image" style="width: 100px" class="rounded-circle circle-border" src="<?= $this->stockage("images", "employes", $employe->image) ?>">
            </div>
            <h1><?= $employe->name()  ?></h1>
            <p>Votre session a été vérouillée pour inactivité.<br>
            Veuillez renseigner votre mot de passe pour retourner à l'application !</p>

            <form class="m-t offset-4 col-md-4" role="form" id="lockedForm" method="POST">
                <div class="form-group ">
                    <input type="password" name="password" class="form-control" placeholder="Votre mot de passe" required>
                </div><br>
                <a href="<?= $this->url("gestion", "access", "login"); ?>" class="btn btn-xs btn-outline btn-rounded"><i class="fa fa-arrow-left"></i> Nouvelle connexion</a>
                <button style="margin-left: 10%; " type="submit" class="btn btn-primary dim"><i class="fa fa-check"></i> Dévérouiller</button>
            </form>
        </div>
    </div>

    <?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


</body>

</html>
