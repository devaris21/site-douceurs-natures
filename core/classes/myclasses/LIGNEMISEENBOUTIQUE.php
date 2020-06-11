<?php
namespace Home;
use Native\RESPONSE;

/**
 * 
 */
class LIGNEMISEENBOUTIQUE extends TABLE
{
	
	
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;


	public $miseenboutique_id;
	public $prixdevente_id;
	public $quantite;
	public $restant = 0;


	public function enregistre(){
		$data = new RESPONSE;
		$datas = MISEENBOUTIQUE::findBy(["id ="=>$this->miseenboutique_id]);
		if (count($datas) == 1) {
			$datas = PRIXDEVENTE::findBy(["id ="=>$this->prixdevente_id]);
			if (count($datas) == 1) {
				if ($this->quantite > 0) {
					$data = $this->save();
				}				
			}else{
				$data->status = false;
				$data->message = "Une erreur s'est produite lors de la mise en boutique du produit !";
			}			
		}else{
			$data->status = false;
			$data->message = "Une erreur s'est produite lors de la mise en boutique du produit !";
		}
		return $data;
	}




	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}
}

?>