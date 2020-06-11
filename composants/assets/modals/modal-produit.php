
<div class="modal inmodal fade" id="modal-produit">
    <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Formulaire de produits</h4>
            <p class="font-bold">Renseigner ces champs pour enregistrer les informations</p>
        </div>
        <form method="POST" class="formShamman" classname="produit">
            <div class="modal-body">
               <div class="row">
                <div class="col-sm-6">
                    <label>Nom du produit<span1>*</span1></label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label>Description du produit <span1>*</span1></label>
                    <div class="form-group">
                        <textarea rows="4" class="form-control" name="comment" ></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label>Couleur associée<span1>*</span1></label>
                    <div class="form-group">
                        <input type="color" class="form-control" name="couleur" value="#fff">
                    </div>
                </div>
                <div class="col-sm-6">
                    <label>Image</label>
                    <div class="">
                        <img style="width: 80px;" src="" class="img-thumbnail logo">
                        <input class="hide" type="file" name="image">
                        <button type="button" class="btn btn-sm bg-purple pull-right btn_image"><i class="fa fa-image"></i> Ajouter une image</button>
                    </div>
                </div>
            </div>
        </div><hr>
        <div class="container">
            <input type="hidden" name="id">
            <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
            <button class="btn btn-sm btn-success pull-right"><i class="fa fa-check"></i> Enregistrer</button>
        </div>
        <br>
    </form>
</div>
</div>
</div>
