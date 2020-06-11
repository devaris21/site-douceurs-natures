<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class PRIX extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $price;

	public function enregistre(){
		$data = new RESPONSE;
		if ($this->price > 0) {
			$data = $this->save();
			if ($data->status) {
				foreach (PRODUIT::getAll() as $key => $produit) {
					$ligne = new PRIXDEVENTE();
					$ligne->prix_id = $data->lastid;
					$ligne->produit_id = $produit->getId();
					$ligne->enregistre();
				}
			}
		}else{
			$data->status = false;
			$data->message = "Veuillez renseigner le nom de la zone de livraison !";
		}
		return $data;
	}


	public function price(){
		return money($this->price);
	}

	
	public function sentenseCreate(){
		return $this->sentense = "Ajout d'une nouvelle zone de livraison : $this->price dans les paramétrages";
	}
	public function sentenseUpdate(){
		return $this->sentense = "Modification des informations de la zone de livraison $this->id : $this->price ";
	}
	public function sentenseDelete(){
		return $this->sentense = "Suppression definitive de la zone de livraison $this->id : $this->price";
	}


}
?>