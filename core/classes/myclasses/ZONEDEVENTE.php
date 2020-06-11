<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class ZONEDEVENTE extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	const MAGASIN = 1;

	public $name;

	public function enregistre(){
		$data = new RESPONSE;
		if ($this->name != "") {
			$data = $this->save();
		}else{
			$data->status = false;
			$data->message = "Veuillez renseigner le nom du zone de vente !";
		}
		return $data;
	}


		public function sentenseCreate(){
			return $this->sentense = "Ajout d'un nouveau zone de vente : $this->name dans les paramétrages";
	}
	public function sentenseUpdate(){
			return $this->sentense = "Modification des informations du zone de vente $this->id : $this->name ";
	}
	public function sentenseDelete(){
			return $this->sentense = "Suppression definitive du zone de vente $this->id : $this->name";
	}
}
?>