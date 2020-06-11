
<div class="modal inmodal fade" id="modal-vente" style="z-index: 9999999999">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Nouvelle vente directe</h4>
                <small class="font-bold">Renseigner ces champs pour enregistrer la vente</small>
            </div>
            
            <div class="row">
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5 class="text-uppercase">Les produits de la vente</h5>
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
                        <h5 class="text-uppercase">Finaliser la vente</h5>
                    </div>
                    <div class="ibox-content"  style="background-color: #fafafa">
                        <form id="formVente">
                            <input type="hidden" name="typevente_id" value="<?= Home\TYPEVENTE::DIRECT ?>" class="form-control">
                            <input type="hidden" name="commercial_id" value="<?= Home\COMMERCIAL::MAGASIN ?>" class="form-control">
                            <input type="hidden" name="zonedevente_id" value="<?= Home\ZONEDEVENTE::MAGASIN ?>" class="form-control">
                            <input type="hidden" name="etat_id" value="<?= Home\ETAT::VALIDEE ?>" class="form-control">

                            <div>
                                <label>Mode de payement <span style="color: red">*</span> </label>                                
                                <div class="input-group">
                                    <?php Native\BINDING::html("select", "modepayement"); ?>
                                </div>
                            </div><br>
                            <div class="modepayement_facultatif">
                                <div>
                                    <label>Structure d'encaissement <span style="color: red">*</span> </label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-bank"></i></span><input type="text" name="structure" class="form-control">
                                    </div>
                                </div><br>
                                <div>
                                    <label>N° numero dédié <span style="color: red">*</span> </label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span><input type="text" name="numero" class="form-control">
                                    </div>
                                </div>
                            </div><br>

                            <div class="">
                                <label> Ajouter une note </label>
                                <textarea class="form-control" rows="4" name="comment"></textarea>
                            </div>

                            <input type="hidden" name="client_id" value="<?= Home\CLIENT::ANONYME ?>">
                            <br>
                            <div class="text-right">
                                <label class="mp0">Montant total</label>
                                <h2 class="mp0 gras text-danger text-right total">0 Fcfa</h2>
                            </div><br>

                            <div class="row">
                                <div class="offset-5 col-7 text-right">
                                    <label>Montant reçu du client </label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="recu" number>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <label class="mp0">Montant à rendre</label>
                                <h3 class="mp0 gras text-muted text-right rendu">0 Fcfa</h2>
                                </div>

                            </form><br>
                            <hr/>
                            <button onclick="validerVente()" class="btn btn-warning btn-block dim"><i class="fa fa-check"></i> Valider la vente</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


