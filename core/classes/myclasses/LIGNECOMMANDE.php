<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIL;
/**
 * 
 */
class LIGNECOMMANDE extends TABLE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $commande_id;
	public $prixdevente_id;
	public $quantite;



	public function enregistre(){
		$data = new RESPONSE;
		$datas = COMMANDE::findBy(["id ="=>$this->commande_id]);
		if (count($datas) == 1) {
			$datas = PRIXDEVENTE::findBy(["id ="=>$this->prixdevente_id]);
			if (count($datas) == 1) {
				$data = $this->save();
			}else{
				$data->status = false;
				$data->message = "Une erreur s'est produite lors de l'ajout du produit !";
			}
		}else{
			$data->status = false;
			$data->message = "Une erreur s'est produite lors de l'ajout du produit !";
		}
		return $data;
	}




	public function sentenseCreate(){
	
	}


	public function sentenseUpdate(){
		return $this->sentense = "Modification des infos de l'accessoire N°$this->id  $this->name .";
	}


	public function sentenseDelete(){
		return $this->sentense = "on a retiré le chauffeur ".$this->chauffeur->name()." sur vehicule ".$this->vehicule->marque->name." ".$this->vehicule->modele." immatriculé ".$this->vehicule->immatriculation;
	}

}



?>