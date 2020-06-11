<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class GROUPECOMMANDE extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $client_id;
	public $etat_id = ETAT::ENCOURS;
	

	public function enregistre(){
		return $data = $this->save();
	}


	public static function etat(){
		foreach (static::findBy(["etat_id ="=>ETAT::ENCOURS]) as $key => $groupe) {
			$test = false;
			foreach (PRODUIT::getAll() as $key => $produit) {
				if ($groupe->reste($produit->getId()) > 0) {
					$test = true;
					break;
				}
			}
			if (!$test) {
				$groupe->etat_id = ETAT::VALIDEE;
				$groupe->save();
			}
		}
	} 


	public function reste(int $prixdevente_id){
		$total = 0;

		$requette = "SELECT SUM(quantite) as quantite FROM lignecommande, prixdevente, commande, groupecommande WHERE lignecommande.prixdevente_id = prixdevente.id AND lignecommande.commande_id = commande.id AND commande.groupecommande_id = groupecommande.id AND groupecommande.id = ? AND commande.etat_id != ? AND prixdevente.id = ? GROUP BY prixdevente.id";
		$item = LIGNECOMMANDE::execute($requette, [$this->getId(), ETAT::ANNULEE, $prixdevente_id]);
		if (count($item) < 1) {$item = [new LIGNECOMMANDE()]; }
		$total += $item[0]->quantite;

		$requette = "SELECT SUM(quantite) as quantite FROM lignedevente, prixdevente, vente, groupecommande WHERE lignedevente.prixdevente_id = prixdevente.id AND lignedevente.vente_id = vente.id AND vente.groupecommande_id = groupecommande.id AND groupecommande.id = ? AND vente.etat_id != ? AND prixdevente.id = ? GROUP BY prixdevente.id";
		$item = LIGNEDEVENTE::execute($requette, [$this->getId(), ETAT::ANNULEE, $prixdevente_id]);
		if (count($item) < 1) {$item = [new LIGNEDEVENTE()]; }
		$total -= $item[0]->quantite;

		$requette = "SELECT SUM(quantite_vendu) as quantite FROM ligneprospection, prixdevente, prospection, groupecommande WHERE groupecommande.id = ? AND prospection.groupecommande_id = groupecommande.id AND ligneprospection.prixdevente_id = prixdevente.id AND ligneprospection.prospection_id = prospection.id AND prospection.etat_id != ? AND prixdevente.id = ? GROUP BY prixdevente.id";
		$item = LIGNEPROSPECTION::execute($requette, [$this->getId(), ETAT::ANNULEE, $prixdevente_id]);
		if (count($item) < 1) {$item = [new LIGNEPROSPECTION()]; }
		$total -= $item[0]->quantite;

		return $total;
	}


	public function lesRestes(){
		$requette = "SELECT prixdevente.id, SUM(quantite) as quantite FROM lignecommande, prixdevente, commande, groupecommande WHERE lignecommande.prixdevente_id = prixdevente.id AND lignecommande.commande_id = commande.id AND commande.groupecommande_id = groupecommande.id AND groupecommande.id = ? AND commande.etat_id != ? GROUP BY prixdevente.id";
		return PRIXDEVENTE::execute($requette, [$this->getId(), ETAT::ANNULEE]);
	}



	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}


}
?>