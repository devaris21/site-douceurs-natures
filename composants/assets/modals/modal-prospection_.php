
<div class="modal inmodal fade" id="modal-prospection_" style="z-index: 9999999999">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Nouvelle prospection directe</h4>
                <small class="font-bold">Renseigner ces champs pour enregistrer la prospection</small>
            </div>
            
            <div class="row">
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5 class="text-uppercase">Les produits de la prospection</h5>
                        </div>
                        <div class="ibox-content"><br>
                            <div class="table-responsive">
                                <table class="table  table-striped">
                                    <tbody class="commande">
                                        <!-- rempli en Ajax -->
                                    </tbody>
                                </table>

                                <div class="text-center">
                                    <?php foreach (Home\PRODUIT::getAll() as $key => $produit) { ?>
                                        <button class="btn btn-white dim newproduit" data-id="<?= $produit->getId() ?>" data-toggle="tooltip" title="<?= $produit->description ?>"><?= $produit->name(); ?></button>
                                    <?php }  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="ibox"  style="background-color: #eee">
                        <div class="ibox-title" style="padding-right: 2%; padding-left: 3%; ">
                            <h5 class="text-uppercase">Finaliser la prospection</h5>
                        </div>
                        <div class="ibox-content"  style="background-color: #fafafa">
                            <form id="formProspection">
                                <input type="hidden" name="commercial_id" value="<?= $commercial->getId() ?>">
                                <div>
                                    <label>Zone de vente <span style="color: red">*</span> </label>                                
                                    <div class="input-group">
                                        <?php Native\BINDING::html("select", "zonedevente"); ?>
                                    </div>
                                </div><br>

                                  <div>
                                    <label>Monnaie pour la prospection </label>                           
                                    <div class="input-group">
                                        <input type="number" number name="monnaie">
                                    </div>
                                </div><br>

                                <input type="hidden" name="client_id" value="<?= Home\CLIENT::ANONYME ?>">
                            </form><br>
                            <h2 class="font-bold total text-right total">0 Fcfa</h2>
                            <hr/>
                            <button onclick="validerPropection()" class="btn btn-primary btn-block dim"><i class="fa fa-check"></i> Valider la commande</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


