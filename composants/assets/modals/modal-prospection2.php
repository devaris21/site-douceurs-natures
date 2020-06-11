
<div class="modal inmodal fade" id="modal-prospection<?= $prospection->getId() ?>" style="z-index: 99999999">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Validation de la prospection</h4>
            <small class="font-bold">Renseigner ces champs pour terminer la prospection</small>
        </div>
        
        <form class="formValiderProspection">
            <div class="row">
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5 class="text-uppercase">Les produits effectivement réçus</h5>
                        </div>
                        <div class="ibox-content"><br>
                            <div class="table-responsive">
                                <table class="table  table-striped">
                                    <tbody class="">
                                        <?php foreach ($prospection->ligneprospections as $key => $ligne) {
                                            $ligne->actualise(); ?>
                                            <tr class="border-0 border-bottom " data-id="<?= $ligne->getId() ?>">
                                                <td >
                                                    <img style="width: 40px" src="<?= $this->stockage("images", "produits", $ligne->prixdevente->produit->image) ?>">
                                                </td>
                                                <td class="text-left">
                                                    <h4 class="mp0 text-uppercase"><?= $ligne->prixdevente->produit->name() ?></h4>
                                                    <small><?= $ligne->prixdevente->prix->price() ?> <?= $params->devise ?></small>
                                                </td>
                                                <td width="140">
                                                    <label>Quantité vendue /<?= $ligne->quantite ?></label>
                                                    <input type="number"  data-id="<?= $ligne->getId() ?>" number class="form-control text-center gras vendus" value="<?= $ligne->quantite ?>" max="<?= $ligne->quantite ?>">
                                                </td>
                                                <td  width="30"></td>
                                                <td width="130">
                                                    <label>Perte</label>
                                                    <input type="number" number class="form-control text-center gras perdus" value="0" max="<?= $ligne->quantite ?>">
                                                </td>
                                            </tr>
                                        <?php }  ?>
                                    </tbody>
                                </table>
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

                            <div>
                                <label>Mode de payement <span style="color: red">*</span> </label>                                
                                <div class="input-group">
                                    <?php Native\BINDING::html("select", "modepayement"); ?>
                                </div>
                            </div><br>
                            <div class="modepayement_facultatif">
                                <div>
                                    <label>Structure d'encaissement<span style="color: red">*</span> </label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-bank"></i></span><input type="text" name="structure" class="form-control">
                                    </div>
                                </div><br>
                                <div>
                                    <label>N° numero dédié<span style="color: red">*</span> </label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span><input type="text" name="numero" class="form-control">
                                    </div>
                                </div>
                            </div><br>
                            <div>
                                <label>Commentaire </label>
                                <textarea class="form-control" rows="4" name="comment"></textarea>
                            </div><br>

                            <label>Montant vendu </label>
                            <h2 class="font-bold total text-right total"><?= money($prospection->montant) ?> Fcfa</h2><br>
                            <button class="btn btn-primary btn-block dim"><i class="fa fa-check"></i> Terminer la prospection</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>

    </div>
</div>
</div>


