<?php
namespace Home;
use Native\RESPONSE;

/**
 * 
 */
class MISEENBOUTIQUE extends TABLE
{
	
	
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $reference;
	public $employe_id;
	public $boutique_id;
	public $entrepot_id;
	public $etat_id = ETAT::VALIDEE;
	public $comment;


	public function enregistre(){
		$data = new RESPONSE;
		$datas = BOUTIQUE::findBy(["id ="=>$this->boutique_id]);
		if (count($datas) == 1) {
			$datas = ENTREPOT::findBy(["id ="=>$this->entrepot_id]);
			if (count($datas) == 1) {
				$this->reference = "MEB/".date('dmY')."-".strtoupper(substr(uniqid(), 5, 6));
				$this->employe_id = getSession("employe_connecte_id");
				$data = $this->save();				
			}else{
				$data->status = false;
				$data->message = "Une erreur s'est produite lors du prix !";
			}				
		}else{
			$data->status = false;
			$data->message = "Une erreur s'est produite lors du prix !";
		}
		return $data;
	}




	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}
}

?>