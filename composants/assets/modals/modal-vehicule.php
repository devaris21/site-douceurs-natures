<div class="modal inmodal fade" id="modal-vehicule" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Formulaire du véhicule</h4>
                <small class="font-bold">Renseigner ces champs pour enregistrer le véhicule</small>
            </div>
            <form method="POST" class="formShamman" classname="vehicule">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Nom du véhicule <span1>*</span1></label>
                            <div class="form-group">
                                <input type="text" class="form-control input-xs" name="etiquette" required >
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <label>Immatriculation <span1>*</span1></label>
                            <div class="form-group">
                                <input type="text" class="form-control input-xs" name="immatriculation" required placeholder="EX... 0102 FG 01">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <label>Choisir la marque<span1>*</span1></label>
                            <div class="form-group">
                                <?php Native\BINDING::html("select", "marque") ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <label>Le modèle du vehicule<span1>*</span1></label>
                            <div class="form-group">
                                <input type="text" class="form-control input-xs" name="modele" required placeholder="Ex...BMW 362 X2">
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <label>Type du vehicule <span1>*</span1></label>
                            <div class="form-group">
                                <?php Native\BINDING::html("select", "typevehicule") ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <label>dans la catégorie des <span1>*</span1></label>
                            <div class="form-group">
                                <?php Native\BINDING::html("select", "groupevehicule") ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Image du véhicule</label>
                            <div class="">
                                <img style="width: 80px;" src="" class="img-thumbnail logo">
                                <input class="hide" type="file" name="image">
                                <button type="button" class="btn btn-sm bg-orange pull-right btn_image"><i class="fa fa-image"></i> Ajouter une image</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id">
                    <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>