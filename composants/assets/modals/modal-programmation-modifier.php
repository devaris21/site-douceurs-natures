
<div class="modal inmodal fade" id="modal-programmation-modifier" style="z-index: 99999999">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Nouvelle programmation de livraison</h4>
            <small class="font-bold">Renseigner ces champs pour enregistrer la livraison</small>
        </div>
        
        <div class="row">
            <div class="col-md-8">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5 class="text-uppercase">Les produits de la livraison</h5>
                    </div>
                    <div class="ibox-content"><br>
                        <div class="table-responsive">
                            <table class="table  table-striped">
                                <tbody class="commande">
                                    <?php foreach ($livraison->lignelivraisons as $key => $ligne) {
                                        $ligne->actualise();
                                        $reste = $livraison->groupecommande->reste($ligne->produit->getId()) + $ligne->quantite;
                                        if ($reste > 0) { ?>
                                         <tr class="border-0 border-bottom " id="ligne<?= $ligne->produit->getId() ?>" data-id="<?= $ligne->produit->getId() ?>">
                                            <td><i class="fa fa-close text-red cursor" onclick="supprimeProduit(<?= $ligne->produit->getId() ?>)" style="font-size: 18px;"></i></td>
                                            <td >
                                                <img style="width: 40px" src="<?= $rooter->stockage("images", "produits", $ligne->produit->image) ?>">
                                            </td>
                                            <td class="text-left">
                                                <h4 class="mp0 text-uppercase"><?= $ligne->produit->name() ?></h4>
                                                <small><?= $ligne->produit->description ?></small>
                                            </td>
                                            <td width="105"><input type="number" number class="form-control text-center gras" value="<?= $ligne->quantite ?>" max="<?= $reste ?>"></td>
                                            <td> / <?= $reste ?></td>
                                        </tr>
                                    <?php }   
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4 ">
            <div class="ibox"  style="background-color: #eee">
                <div class="ibox-title" style="padding-right: 2%; padding-left: 3%; ">
                    <h5 class="text-uppercase">Finaliser la livraison</h5>
                </div>
                <div class="ibox-content"  style="background-color: #fafafa">
                    <form id="formProgrammation">
                        <div>
                            <label>Date prévue pour la livraison <span style="color: red">*</span> </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" name="datelivraison" value="<?= $livraison->datelivraison ?>" class="form-control">
                            </div>
                        </div><br>
                    </form>
                    <hr/>
                    <button onclick="modifierProgrammation()" class="btn btn-success btn-block dim"><i class="fa fa-check"></i> Reprogrammer la livraison</button>
                </div>
            </div>

        </div>
    </div>

</div>
</div>
</div>


