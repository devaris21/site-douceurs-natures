
<div class="modal inmodal fade" id="modal-productionjour" style="z-index: 1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="ibox-content">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <div class="text-center">
                        <h2 class="title text-uppercase gras text-center">Nouvelle production</h2>
                        <small>Veuillez renseigner la quantité de chaque type de produit que vous avez produit !</small>
                    </div><hr>

                    <form id="formProductionJour" classname="productionjour">

                        <?php foreach (Home\PRODUIT::getAll() as $key => $produit) { ?>
                            <div class="row">
                                <div class="col-md-3 col-md">
                                    <label>Quantité de <b><?= $produit->name() ?></b></label>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <?php $produit->fourni("prixdevente", ["isActive ="=>Home\TABLE::OUI]);
                                        foreach ($produit->prixdeventes as $key => $prixdv) {
                                            $prixdv->actualise(); ?>
                                            <div class="col-md col-sm">
                                                <label class="text-muted"><?= money($prixdv->prix->price) ?> <?= $params->devise  ?></label>
                                                <input type="text" data-id="<?= $prixdv->getId() ?>" data-toggle="tooltip" min=0 number class="gras form-control text-green text-center" name="prod-<?= $prixdv->getId() ?>">
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div><hr>
                        <?php } ?>

                        <hr>

                        <div class="row">
                            <div class="col-md-9">
                                <h5 class="text-uppercase"><u>Ressources consommées</u></h5><br>

                                <div class="row">
                                    <?php foreach (Home\RESSOURCE::getAll() as $key => $ressource) { ?>
                                        <div class="col-sm-3">
                                            <label class="text-muted gras"><?= $ressource->name() ?> (<?= $ressource->abbr ?>)</label>
                                            <input type="text" data-id="<?= $ressource->getId() ?>" data-toggle="tooltip" min=0 number class="gras form-control text-red text-center" name="conso-<?= $ressource->getId() ?>">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="col-md-3 bottom-left">
                                <h5 class="text-uppercase"><u>Commentaire</u></h5>
                                <textarea class="form-control" rows="4" name="comment"></textarea>
                            </div>
                        </div><br><hr>


                        <div class="">
                            <button class="btn pull-right dim btn-primary" ><i class="fa fa-check"></i> Valider la production</button>
                        </div><br>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
