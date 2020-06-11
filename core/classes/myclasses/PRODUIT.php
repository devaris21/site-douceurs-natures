<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIL;
use Native\FICHIER;
/**
 * 
 */
class PRODUIT extends TABLE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $name;
	public $description = "";
	public $image       = "default.png";
	public $couleur     = "";


	public function enregistre(){
		$data = new RESPONSE;
		if ($this->name != "") {
			$data = $this->save();
			if ($data->status) {
				$this->uploading($this->files);
				foreach (PRIX::getAll() as $key => $prix) {
					$datas = PRIXDEVENTE::findBy(["prix_id ="=>$prix->getId(), "produit_id ="=>$data->lastid]);
					if (count($datas) == 0) {
						$ligne = new PRIXDEVENTE();
						$ligne->produit_id = $data->lastid;
						$ligne->prix_id = $prix->getId();
						$ligne->enregistre();
					}
				}


				foreach (RESSOURCE::getAll() as $key => $ressource) {
					$datas = EXIGENCEPRODUCTION::findBy(["produit_id ="=>$data->lastid, "ressource_id ="=>$ressource->getId()]);
					if (count($datas) == 0) {
						$ligne = new EXIGENCEPRODUCTION();
						$ligne->produit_id = $data->lastid;
						$ligne->quantite_produit = 0;
						$ligne->ressource_id = $ressource->getId();
						$ligne->quantite_ressource = 0;
						$ligne->enregistre();
					}					
				}

				// $ligne = new PAYE_PRODUIT();
				// $ligne->produit_id = $data->lastid;
				// $ligne->price = 0;
				// $ligne->enregistre();

				// $ligne = new PAYEFERIE_PRODUIT();
				// $ligne->produit_id = $data->lastid;
				// $ligne->price = 0;
				// $ligne->enregistre();

			}
		}else{
			$data->status = false;
			$data->message = "Veuillez renseigner le nom du produit !";
		}
		return $data;
	}




	public function uploading(Array $files){
		//les proprites d'images;
		$tab = ["image"];
		if (is_array($files) && count($files) > 0) {
			$i = 0;
			foreach ($files as $key => $file) {
				if ($file["tmp_name"] != "") {
					$image = new FICHIER();
					$image->hydrater($file);
					if ($image->is_image()) {
						$a = substr(uniqid(), 5);
						$result = $image->upload("images", "produits", $a);
						$name = $tab[$i];
						$this->$name = $result->filename;
						$this->save();
					}
				}	
				$i++;			
			}			
		}
	}



	public function sentenseCreate(){
		return $this->sentense = "Ajout d'un nouveau produit : $this->name dans les paramétrages";
	}
	public function sentenseUpdate(){
		return $this->sentense = "Modification des informations du produit $this->id : $this->name ";
	}
	public function sentenseDelete(){
		return $this->sentense = "Suppression definitive du produit $this->id : $this->name";
	}

}



?>