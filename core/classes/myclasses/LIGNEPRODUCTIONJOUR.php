<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIL;
/**
 * 
 */
class LIGNEPRODUCTIONJOUR extends TABLE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $productionjour_id;
	public $prixdevente_id;
	public $production = 0;



	public function enregistre(){
		$data = new RESPONSE;
		$datas = PRODUCTIONJOUR::findBy(["id ="=>$this->productionjour_id]);
		if (count($datas) == 1) {
			$datas = PRIXDEVENTE::findBy(["id ="=>$this->prixdevente_id]);
			if (count($datas) == 1) {
				if ($this->production >= 0) {
					$data = $this->save();
				}else{
					$data->status = false;
					$data->message = "La quantité entrée n'est pas correcte !";
				}
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
	}


	public function sentenseDelete(){
	}

}



?>