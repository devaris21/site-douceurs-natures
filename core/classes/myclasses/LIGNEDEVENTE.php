<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIL;
/**
 * 
 */
class LIGNEDEVENTE extends TABLE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $vente_id;
	public $prixdevente_id;
	public $quantite;


	public function enregistre(){
		$data = new RESPONSE;
		$datas = VENTE::findBy(["id ="=>$this->vente_id]);
		if (count($datas) == 1) {
			if ($this->quantite > 0) {
					$data = $this->save();
				}else{
					$data->status = false;
					$data->message = "La quantité n'est pas correcte !";
				}
		}else{
			$data->status = false;
			$data->message = "Une erreur s'est produite lors de l'ajout du produit !";
		}
		return $data;
	}




	public function sentenseCreate(){
	
	}


	public function sentenseUpdate(){}


	public function sentenseDelete(){}

}



?>