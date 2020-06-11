<div class="modal inmodal fade" id="modal-payement-salaire">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Payement du salaire</h4>
            </div>
            <form method="POST" id="formPayementSalaire">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                        <label>Montant pour le reglement <span1>*</span1></label>
                        <div class="form-group">
                            <input type="text" number class="form-control" name="montant" value="<?= $commercial->salaire ?>" max="<?= $commercial->salaire ?>" min="0" required>
                        </div>
                    </div>   
                    <div class="col-sm-6">
                        <label>Mode de payement <span style="color: red">*</span> </label>                                
                        <div class="input-group">
                            <?php Native\BINDING::html("select", "modepayement"); ?>
                        </div>
                    </div> 
                    </div>  
                    <br>
                    <div class="row modepayement_facultatif">
                        <div class="col-sm-6">
                            <label>Structure d'encaissement<span style="color: red">*</span> </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-bank"></i></span><input type="text" name="structure" class="form-control">
                            </div>
                        </div><br>
                        <div class="col-sm-6">
                            <label>N° numero dédié<span style="color: red">*</span> </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span><input type="text" name="numero" class="form-control">
                            </div>
                        </div>
                    </div>                 
                </div><hr>
                <div class="container">
                    <input type="hidden" name="commercial_id" value="<?= $commercial->getId() ?>">
                    <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                    <button class="btn btn-sm dim btn-success pull-right"><i class="fa fa-check"></i> Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>
