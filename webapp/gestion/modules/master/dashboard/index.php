<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  

          <div class="wrapper wrapper-content">
            <div class="animated fadeInRightBig">

                <div class=" border-bottom white-bg dashboard-header">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="<?= $this->stockage("images", "societe", $params->image) ?>" style="height: 60px;" alt=""><br>
                            <h2 class="text-uppercase"><?= $params->societe ?></h2>
                            <small>Tableau de bord général </small>
                            <ul class="list-group clear-list m-t">
                                <li class="list-group-item fist-item">
                                    Commandes en cours <span class="label label-success float-right"><?= start0(count($groupes__)); ?></span> 
                                </li>
                                <li class="list-group-item">
                                    Livraisons en cours <span class="label label-success float-right"><?= start0(count(Home\PROSPECTION::findBy(["etat_id ="=>Home\ETAT::ENCOURS, "typeprospection_id ="=>Home\TYPEPROSPECTION::LIVRAISON]))); ?></span> 
                                </li>
                                <li class="list-group-item">
                                    Prospections en cours <span class="label label-success float-right"><?= start0(count($prospections__)); ?></span> 
                                </li>
                                <li class="list-group-item"></li>
                            </ul>
                            <button data-toggle=modal data-target="#modal-vente" class="btn btn-warning dim btn-block"> <i class="fa fa-file-text-o"></i> Nouvelle vente directe</button>

                            <button data-toggle="modal" data-target="#modal-prospection" class="btn btn-primary dim btn-block"><i class="fa fa-cubes"></i> Nouvelle prospection</button>
                        </div>
                        <div class="col-md-6">
                           <div class="flot-chart dashboard-chart">
                            <div class="flot-chart-content" id="flot-dashboard-chart" style="height: 250px; margin-top: -4%"></div>
                        </div><hr style="margin-top: 14%">
                        <div class="row text-center">
                            <div class="col">
                                <div class="">
                                    <span class="h5 font-bold block"><?= money(comptage(Home\VENTE::todayDirect(), "vendu", "somme")); ?> <small><?= $params->devise ?></small></span>
                                    <small class="text-muted block">Ventes directes</small>
                                </div>
                            </div>
                            <div class="col border-right border-left">
                                <span class="h5 font-bold block"><?= money(comptage(Home\PROSPECTION::effectuee(dateAjoute()), "vendu", "somme")); ?> <small><?= $params->devise ?></small></span>
                                <small class="text-muted block">Ventes par prospection</small>
                            </div>
                            <div class="col text-danger">
                                <span class="h5 font-bold block"><?= money(Home\OPERATION::sortie(dateAjoute() , dateAjoute(+1))) ?> <small><?= $params->devise ?></small></span>
                                <small class="text-muted block">Dépense du jour</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 border-left">
                        <div class="statistic-box" style="margin-top: 0%">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <h5>Courbe des ventes</h5>
                                    <div id="sparkline2"></div>
                                </div>

                                <div class="ibox-content">
                                    <h5>Dette chez les clients</h5>
                                    <h2 class="no-margins"><?= start0(Home\CLIENT::Dettes()); ?> <?= $params->devise  ?></h2>
                                </div>

                                <div class="ibox-content">
                                    <h5>En rupture de Stock</h5>
                                    <h2 class="no-margins"><?= start0(count(Home\PRIXDEVENTE::rupture())) ?> produit(s)</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr><hr class="mp0"><br>

                    <div class="row">
                        <?php foreach (Home\PRODUIT::getAll() as $key => $produit) { ?>
                            <div class="col-md-2 col-sm-4 border-right">
                                <h6 class="text-uppercase text-center gras" style="color: <?= $produit->couleur; ?>">Stock de <?= $produit->name() ?></h6>
                                <ul class="list-group clear-list m-t">
                                    <?php foreach ($tableau[$produit->getId()] as $key => $pdv) { ?>
                                        <li class="list-group-item">
                                            <i class="fa fa-flask" style="color: <?= $produit->couleur; ?>"></i> <small><?= $pdv->prix ?></small>          
                                            <span class="float-right">
                                                <small title="en boutique" class="gras text-<?= ($pdv->boutique > 0)?"green":"danger" ?>"><?= money($pdv->boutique) ?></small>&nbsp;|&nbsp;
                                                <small title="en entrepôt" class=""><?= money($pdv->stock) ?></small>
                                            </span>
                                        </li>
                                    <?php } ?>
                                    <li class="list-group-item"></li>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>


                <br>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Programme de prospection du jour</h5>
                                <div class="ibox-tools">
                                    <a href="<?= $this->url("gestion", "production", "programmes") ?>" data-toggle="tooltip" title="Modifier le programme">
                                        <i class="fa fa-calendar"></i> Modifier le programme
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content table-responsive">
                                <table class="table table-hover no-margins">
                                    <thead>
                                        <tr>
                                            <th>Commercial</th>
                                            <th class="">Heure de sortie</th>
                                            <th class="">Total</th>
                                            <th class="">vendu</th>
                                            <th class="">heure de retour</th>
                                            <th class="">statut</th>
                                            <th class="">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach (Home\PROSPECTION::programmee(dateAjoute()) as $key => $prospection) {
                                            $prospection->actualise(); ?>
                                            <tr>
                                                <td><?= $prospection->commercial->name()  ?></td>
                                                <td><?= heurecourt($prospection->created)  ?></td>
                                                <td><?= money($prospection->montant) ?> <?= $params->devise ?></td>
                                                <td class="gras text-green"><?= money($prospection->vendu) ?> <?= $params->devise ?></td>
                                                <td><?= heurecourt($prospection->dateretour)  ?></td>
                                                <td class="text-center"><span class="label label-<?= $prospection->etat->class ?>"><?= $prospection->etat->name ?></span> </td>
                                                <td class="text-center">
                                                    <?php if ($prospection->etat_id == Home\ETAT::PARTIEL) { ?>
                                                        <button onclick="validerProg(<?= $prospection->getId() ?>)" class="cursor simple_tag pull-right"><i class="fa fa-file-text-o"></i> Faire la prospection</button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>               

                </div>

            </div>
        </div>
        <br>

        <?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>

        <?php include($this->rootPath("composants/assets/modals/modal-clients.php")); ?> 
        <?php include($this->rootPath("composants/assets/modals/modal-client.php")); ?> 
        <?php include($this->rootPath("composants/assets/modals/modal-vente.php")); ?> 
        <?php include($this->rootPath("composants/assets/modals/modal-prospection.php")); ?> 
        <?php include($this->rootPath("composants/assets/modals/modal-miseenboutique.php")); ?> 

    </div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>

<script type="text/javascript" src="<?= $this->relativePath("../../production/programmes/script.js") ?>"></script>
<script type="text/javascript" src="<?= $this->relativePath("../../master/client/script.js") ?>"></script>
<script type="text/javascript" src="<?= $this->relativePath("../../production/miseenboutique/script.js") ?>"></script>

<script>
    $(document).ready(function() {

        var id = "<?= $this->getId();  ?>";
        if (id == 1) {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Content de vous revoir de nouveau!', 'Bonjour <?= $employe->name(); ?>');
            }, 1300);
        }



        var sparklineCharts = function(){

         $("#sparkline2").sparkline([24, 43, 43, 55, 44, 62, 44, 72], {
             type: 'line',
             width: '100%',
             height: '60',
             lineColor: '#1ab394',
             fillColor: "#ffffff"
         });

     };

     var sparkResize;

     $(window).resize(function(e) {
        clearTimeout(sparkResize);
        sparkResize = setTimeout(sparklineCharts, 500);
    });

     sparklineCharts();




     var data1 = [
     [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],["hjk",5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],["jhdsk",6]
     ];
     var data2 = [
     [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
     ];
     $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
        data1, data2
        ],
        {
            series: {
                lines: {
                    show: false,
                    fill: true
                },
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 1,
                    fill: 0.4
                },
                points: {
                    radius: 0,
                    show: true
                },
                shadowSize: 2
            },
            grid: {
                hoverable: true,
                clickable: true,
                tickColor: "#d5d5d5",
                borderWidth: 1,
                color: '#d5d5d5'
            },
            colors: ["#1ab394", "#1C84C6"],
            xaxis:{
            },
            yaxis: {
                ticks: 4
            },
            tooltip: false
        }
        );


 });
</script>


</body>

</html>