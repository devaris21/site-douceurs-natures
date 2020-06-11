<?php 
namespace Home;
unset_session("produits");
unset_session("commande-encours");

$params = PARAMS::findLastId();

GROUPECOMMANDE::etat();
VENTE::ResetProgramme();

$title = "GPV | Tableau de bord";

$tableau = [];
foreach (PRODUIT::getAll() as $key => $produit) {
	$tab = [];
	foreach ($produit->fourni('prixdevente', ["isActive ="=>TABLE::OUI]) as $key => $pdv) {
		$pdv->actualise();
		$data = new \stdclass();
		$data->name = $pdv->produit->name()." // ".$pdv->prix->price()/*." ".$params->devise*/;
		$data->prix = $pdv->prix->price()." ".$params->devise;
		$data->boutique = $pdv->enBoutique(dateAjoute());
		$data->stock = $pdv->enEntrepot(dateAjoute());
		$data->commande = $pdv->commandee();
		if (!($data->boutique==0 && $data->stock==0 && $data->commande==0)) {
			$tab[] = $data;
		}	
	}
	$tableau[$produit->getId()] = $tab;
}

for ($i=0; $i < 30; $i++) { 
	$date = dateAjoute(-30 + $i);
	$stats[] = 2;
}

foreach (OPERATION::enAttente() as $key => $item) {
	$item->actualise();
	if ($item->categorieoperation->typeoperationcaisse->getId() == TYPEOPERATIONCAISSE::SORTIE) {
		$item->etat_id == ETAT::VALIDEE;
		$item->save();
	}
}

foreach (APPROVISIONNEMENT::findBy(["etat_id ="=>ETAT::VALIDEE]) as $key => $item) {
	if ($item->getId() != 1) {
		$item->datelivraison == dateAjoute(-1);
		$item->save();
	}
}

?>