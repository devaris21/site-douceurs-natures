<?php
namespace Home;
use Native\RESPONSE;

/**
 * 
 */
class PRIXDEVENTE extends TABLE
{
	
	
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;


	public $produit_id;
	public $prix_id;
	public $isActive = TABLE::OUI;
	public $stock = 0;


	public function enregistre(){
		$data = new RESPONSE;
		$datas = PRODUIT::findBy(["id ="=>$this->produit_id]);
		if (count($datas) == 1) {
			$datas = PRIX::findBy(["id ="=>$this->prix_id]);
			if (count($datas) == 1) {
				$data = $this->save();
				if ($data->status) {
					$ligne = new LIGNEPRODUCTIONJOUR();
					$ligne->productionjour_id = 1;
					$ligne->prixdevente_id = $data->lastid;
					$ligne->production = 0;
					$ligne->setCreated(PARAMS::DATE_DEFAULT);
					$ligne->save();
				}
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



	public function name()
	{
		$this->actualise();
		return $this->produit->name()." / ".$this->prix->price;
	}


	public function stock(String $date){
		$stock = intval($this->stock) + $this->production("2020-06-01", $date) - $this->vendu("2020-06-01", $date) - $this->perte("2020-06-01", $date);
		return $stock;
	}



	public function production(string $date1 = "2020-06-01", string $date2){
		$requette = "SELECT SUM(production) as production  FROM productionjour, ligneproductionjour, prixdevente WHERE ligneproductionjour.prixdevente_id = prixdevente.id AND ligneproductionjour.productionjour_id = productionjour.id AND prixdevente.id = ? AND productionjour.etat_id != ? AND DATE(ligneproductionjour.created) >= ? AND DATE(ligneproductionjour.created) <= ? GROUP BY prixdevente.id";
		$item = LIGNEPRODUCTIONJOUR::execute($requette, [$this->getId(), ETAT::ANNULEE, $date1, $date2]);
		if (count($item) < 1) {$item = [new LIGNEPRODUCTIONJOUR()]; }
		return $item[0]->production;
	}


	public function totalMiseEnBoutique(string $date1 = "2020-06-01", string $date2){
		$requette = "SELECT SUM(quantite) as quantite  FROM lignemiseenboutique, prixdevente, miseenboutique WHERE lignemiseenboutique.prixdevente_id = prixdevente.id AND prixdevente.id = ? AND lignemiseenboutique.miseenboutique_id = miseenboutique.id AND miseenboutique.etat_id != ? AND DATE(lignemiseenboutique.created) >= ? AND DATE(lignemiseenboutique.created) <= ? GROUP BY prixdevente.id";
		$item = LIGNEMISEENBOUTIQUE::execute($requette, [$this->getId(), ETAT::ANNULEE, $date1, $date2]);
		if (count($item) < 1) {$item = [new LIGNEMISEENBOUTIQUE()]; }
		return $item[0]->quantite;
	}


	public function enBoutique(string $date){
		$total = $this->totalMiseEnBoutique("2020-06-01", $date) - ($this->enProspection($date) + $this->livree("2020-06-01", $date) + $this->vendu("2020-06-01", $date) + $this->perte("2020-06-01", $date));
		return $total;
	}


	public function enEntrepot(string $date){
		$total = intval($this->stock) + $this->production("2020-06-01", $date) - $this->totalMiseEnBoutique("2020-06-01", $date);
		return $total;
	}



	public function enProspection(string $date){
		$requette = "SELECT SUM(quantite) as quantite  FROM ligneprospection, prixdevente, prospection WHERE ligneprospection.prixdevente_id = prixdevente.id AND prixdevente.id = ? AND ligneprospection.prospection_id = prospection.id AND prospection.typeprospection_id = ? AND prospection.etat_id IN (?, ?) AND DATE(ligneprospection.created) <= ? GROUP BY prixdevente.id";
		$item = LIGNEPROSPECTION::execute($requette, [$this->getId(), TYPEPROSPECTION::PROSPECTION, ETAT::ENCOURS, ETAT::PARTIEL, $date]);
		if (count($item) < 1) {$item = [new LIGNEPROSPECTION()]; }
		return $item[0]->quantite;
	}



	public function livree(string $date1 = "2020-06-01", string $date2){
		$requette = "SELECT SUM(quantite) as quantite  FROM ligneprospection, prixdevente, prospection WHERE ligneprospection.prixdevente_id = prixdevente.id AND prixdevente.id = ? AND ligneprospection.prospection_id = prospection.id AND prospection.typeprospection_id = ? AND prospection.etat_id != ? AND DATE(ligneprospection.created) >= ? AND DATE(ligneprospection.created) <= ? GROUP BY prixdevente.id";
		$item = LIGNEPROSPECTION::execute($requette, [$this->getId(), TYPEPROSPECTION::LIVRAISON, ETAT::ANNULEE, $date1, $date2]);
		if (count($item) < 1) {$item = [new LIGNEPROSPECTION()]; }
		return $item[0]->quantite;
	}



	public function perte(string $date1 = "2020-06-01", string $date2){
		$total = 0;

		$requette = "SELECT SUM(perte) as perte  FROM ligneprospection, prixdevente, prospection WHERE ligneprospection.prixdevente_id = prixdevente.id AND prixdevente.id = ? AND ligneprospection.prospection_id = prospection.id AND prospection.etat_id != ? GROUP BY prixdevente.id";
		$item = LIGNEPROSPECTION::execute($requette, [$this->getId(), ETAT::ANNULEE]);
		if (count($item) < 1) {$item = [new LIGNEPROSPECTION()]; }
		$total += $item[0]->perte;

		return $total;
	}
	

	public function vendu(string $date1 = "2020-06-01", string $date2){
		$total = 0;
		$requette = "SELECT SUM(quantite) as quantite  FROM lignedevente, prixdevente, vente WHERE lignedevente.prixdevente_id = prixdevente.id AND lignedevente.vente_id = vente.id AND prixdevente.id = ? AND vente.etat_id != ? AND DATE(lignedevente.created) >= ? AND DATE(lignedevente.created) <= ? GROUP BY prixdevente.id";
		$item = LIGNEDEVENTE::execute($requette, [$this->getId(), ETAT::ANNULEE, $date1, $date2]);
		if (count($item) < 1) {$item = [new LIGNEDEVENTE()]; }
		$total += $item[0]->quantite;

		return $total;
	}



	public function commandee(){
		$total = 0;
		$datas = GROUPECOMMANDE::encours();
		foreach ($datas as $key => $comm) {
			$total += $comm->reste($this->getId());
		}
		return $total;
	}



	public function stockGlobal(){
		return $this->enBoutique(dateAjoute()) + $this->enEntrepot(dateAjoute());
	}


	public function montantStock(){
		$this->actualise();
		return $this->stockGlobal() * $this->prix->price;
	}


	public function montantVendu(string $date1 = "2020-06-01", string $date2){
		$this->actualise();
		return ($this->vendu($date1, $date2) + $this->livree($date1, $date2)) * $this->prix->price;
	}

	public static function rupture(){
		$params = PARAMS::findLastId();
		$datas = static::findBy(["isActive ="=>TABLE::OUI]);
		foreach ($datas as $key => $item) {
			if ($item->enEntrepot(dateAjoute()) > $params->ruptureStock) {
				unset($datas[$key]);
			}
		}
		return $datas;
	}



	public function exigence(int $quantite, int $ressource_id){
		$datas = EXIGENCEPRODUCTION::findBy(["produit_id ="=>$this->getId(), "ressource_id ="=>$ressource_id]);
		if (count($datas) == 1) {
			$item = $datas[0];
			if ($item->quantite_produit == 0) {
				return 0;
			}
			return ($quantite * $item->quantite_ressource) / $item->quantite_produit;
		}
		return 0;
	}



	public function coutProduction(String $type, int $quantite){
		if(isJourFerie(dateAjoute())){
			$datas = PAYEFERIE_PRODUIT::findBy(["produit_id ="=>$this->getId()]);
		}else{
			$datas = PAYE_PRODUIT::findBy(["produit_id ="=>$this->getId()]);
		}
		if (count($datas) > 0) {
			$ppr = $datas[0];
			switch ($type) {
				case 'production':
				$prix = $ppr->price;
				break;
				
				case 'rangement':
				$prix = $ppr->price_rangement;
				break;

				case 'vente':
				$prix = $ppr->price_vente;
				break;

				default:
				$prix = $ppr->price;
				break;
			}
			return $quantite * $prix;
		}
		return 0;
	}



	public function changerMode(){
		if ($this->isActive == TABLE::OUI) {
			$this->isActive = TABLE::NON;
		}else{
			$this->isActive = TABLE::OUI;
			$pro = PRODUCTIONJOUR::today();
			$datas = LIGNEPRODUCTIONJOUR::findBy(["productionjour_id ="=>$pro->getId(), "prixdevente_id ="=>$pdv->getId()]);
			if (count($datas) == 0) {
				$ligne = new LIGNEPRODUCTIONJOUR();
				$ligne->productionjour_id = $pro->getId();
				$ligne->prixdevente_id = $pdv->getId();
				$ligne->enregistre();
			}			
		}
		return $this->save();
	}



	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}
}

?>