
<div class="modal inmodal fade" id="modal-miseenboutique" style="z-index: 1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="ibox-content">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <div class="text-center">
                        <h2 class="title text-uppercase gras text-center">Nouvelle mise en boutique </h2>
                        <small>Veuillez renseigner la quantité de chaque type de produit que vous voulez mettre en boutique !</small>
                    </div><hr>

                    <form id="formMiseenboutique" classname="miseenboutique">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <label>Entrepot de sortie</label>
                                <?php Native\BINDING::html("select", "entrepot") ?>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <label>Boutique de destination</label>
                                <?php Native\BINDING::html("select", "boutique") ?>
                            </div>
                        </div><hr><br>
                        <?php foreach (Home\PRODUIT::getAll() as $key => $produit) { ?>
                            <div class="row">
                                <div class="col-md-3 col-md">
                                    <label>Quantité de <b><?= $produit->name() ?></b></label>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <?php $produit->fourni("prixdevente", ["isActive ="=>Home\TABLE::OUI]);
                                        foreach ($produit->prixdeventes as $key => $prixdv) {
                                            $stock = $prixdv->enEntrepot(dateAjoute());
                                            if ($stock > 0) {
                                                $prixdv->actualise(); ?>
                                                <div class="col-sm-3">
                                                    <label class="text-muted"><?= money($prixdv->prix->price) ?> <?= $params->devise  ?> / <b><?= $stock ?></b></label>
                                                    <input type="text" min=0 number class="gras form-control text-green text-center" name="mise-<?= $prixdv->getId() ?>">
                                                </div>
                                            <?php  } } ?>
                                        </div>
                                    </div>
                                </div><hr>
                            <?php } ?>

                            <hr><br>

                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <label>Ajouter une note</label>
                                    <textarea class="form-control" name="comment" rows="4"></textarea>
                                </div>
                            </div>

                            <div class="">
                                <button class="btn pull-right dim btn-primary" ><i class="fa fa-check"></i> Valider la mise en boutique</button>
                            </div><br>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
