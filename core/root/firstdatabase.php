<?php 
namespace Home;

//n'oublie pas de configurer la date par defaut PARAMS
//n'oublie pas d'importer la base de données des marques de vehicules

$datas = ["Au magasin", "Dans tout Bassam"];
foreach ($datas as $key => $value) {
	$item = new ZONEDEVENTE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}

$item = new BOUTIQUE();
$item->name = "Boutique principal";
$item->setProtected(1);
$item->save();

$item = new ENTREPOT();
$item->name = "Entrepôt principal";
$item->setProtected(1);
$item->save();

$datas = ["Directe", "Par Prospection/livraison"];
foreach ($datas as $key => $value) {
	$item = new TYPEVENTE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}

$datas = ["Prospection par commercial", "livraison de commande"];
foreach ($datas as $key => $value) {
	$item = new TYPEPROSPECTION();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}

$datas = ["Voiture", "Camion benne", "Tricycle", "Moto"];
foreach ($datas as $key => $value) {
	$item = new TYPEVEHICULE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}


$datas = ["Entrée de caisse", "Sortie de caisse"];
foreach ($datas as $key => $value) {
	$item = new TYPEOPERATIONCAISSE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}

$datas = ["Accrochage", "Crevaison", "Autre"];
foreach ($datas as $key => $value) {
	$item = new TYPEENTRETIENVEHICULE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}

$datas = ["Camion de livraison", "Véhicule de mission"];
foreach ($datas as $key => $value) {
	$item = new GROUPEVEHICULE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}


$item = new VEHICULE();
$item->immatriculation = "...";
$item->modele = "PAR NOS COMMERCIAUX";
$item->marque_id = 0;
$item->typevehicule_id = 1;
$item->groupevehicule_id = 1;
$item->prestataire_id = 1;
$item->visibility = 0;
$item->setProtected(1);
$item->save();

$item = new VEHICULE();
$item->immatriculation = "...";
$item->modele = "LE VEHICULE DU CLIENT";
$item->marque_id = 0;
$item->typevehicule_id = 1;
$item->groupevehicule_id = 1;
$item->prestataire_id = 1;
$item->visibility = 0;
$item->setProtected(1);
$item->save();


$datas = ["Entreprise", "Particulier"];
foreach ($datas as $key => $value) {
	$item = new TYPECLIENT();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}

$item = new SEXE();
$item->name = "Homme";
$item->abreviation = "H";
$item->setProtected(1);
$item->save();

$item = new SEXE();
$item->name = "Femme";
$item->abreviation = "F";
$item->setProtected(1);
$item->save();



$datas = ["master", "production", "ventes", "approvisionnement", "caisse", "parametres", "paye des manoeuvre", "modifier-supprimer", "archives"];
foreach ($datas as $key => $value) {
	$item = new ROLE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}


$item = new PARAMS();
$item->societe = "Devaris 21";
$item->email = "info@devaris21.com";
$item->devise = "Fcfa";
$item->tva = 0;
$item->seuilCredit = 0;
$item->setProtected(1);
$item->enregistre();


$item = new MYCOMPTE();
$item->identifiant = strtoupper(substr(uniqid(), 5, 7));
$item->tentative = 0;
$item->expired = dateAjoute(7);
$item->setProtected(1);
$item->enregistre();


$item = new PRESTATAIRE();
$item->name = "Devaris PRESTATAIRE";
$item->email = "info@devaris21.com";
$item->login = "...";
$item->password = "...";
$item->adresse = "...";
$item->contact = "...";
$item->setProtected(1);
$item->save();

$item = new FOURNISSEUR();
$item->name = "Devaris FOURNISSEUR";
$item->email = "info@devaris21.com";
$item->adresse = "...";
$item->contact = "...";
$item->fax = "...";
$item->visibility = 0;
$item->setProtected(1);
$item->save();


$item = new CLIENT();
$item->name = "Monsieur Tout le Monde";
$item->adresse = "...";
$item->contact = "...";
$item->visibility = 0;
$item->setProtected(1);
$item->save();


$item = new COMMERCIAL();
$item->name = "La boutique";
$item->adresse = "Magazin à bassam";
$item->contact = "...";
$item->visibility = 0;
$item->setProtected(1);
$item->save();



$item = new MODEPAYEMENT();
$item->name = "Espèces";
$item->initial = "ES";
$item->etat_id = ETAT::VALIDEE;
$item->setProtected(1);
$item->save();

$item = new MODEPAYEMENT();
$item->name = "Prelevement sur acompte";
$item->initial = "PA";
$item->etat_id = ETAT::VALIDEE;
$item->setProtected(1);
$item->save();

$item = new MODEPAYEMENT();
$item->name = "Chèque";
$item->initial = "CH";
$item->etat_id = ETAT::ENCOURS;
$item->setProtected(1);
$item->save();

$item = new MODEPAYEMENT();
$item->name = "Virement banquaire";
$item->initial = "VB";
$item->etat_id = ETAT::ENCOURS;
$item->setProtected(1);
$item->save();

$item = new MODEPAYEMENT();
$item->name = "Mobile money";
$item->initial = "MM";
$item->etat_id = ETAT::ENCOURS;
$item->setProtected(1);
$item->save();



$item = new ETAT();
$item->name = "Annulé";
$item->class = "danger";
$item->setProtected(1);
$item->save();

$item = new ETAT();
$item->name = "En cours";
$item->class = "warning";
$item->setProtected(1);
$item->save();

$item = new ETAT();
$item->name = "Partiellement";
$item->class = "info";
$item->setProtected(1);
$item->save();

$item = new ETAT();
$item->name = "Validé";
$item->class = "success";
$item->setProtected(1);
$item->save();



$item = new DISPONIBILITE();
$item->name = "Indisponible";
$item->class = "danger";
$item->setProtected(1);
$item->save();

$item = new DISPONIBILITE();
$item->name = "Libre";
$item->class = "warning";
$item->setProtected(1);
$item->save();

$item = new DISPONIBILITE();
$item->name = "En mission";
$item->class = "info";
$item->setProtected(1);
$item->save();



$item = new CATEGORIEOPERATION();
$item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::ENTREE;
$item->name = "Réglement de commande";
$item->setProtected(1);
$item->save();

$item = new CATEGORIEOPERATION();
$item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::ENTREE;
$item->name = "Remboursement par le fournisseur";
$item->setProtected(1);
$item->save();

$item = new CATEGORIEOPERATION();
$item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::ENTREE;
$item->name = "Location d'engins pour livraison";
$item->setProtected(1);
$item->save();

$item = new CATEGORIEOPERATION();
$item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::ENTREE;
$item->name = "Autre entrée en caisse";
$item->setProtected(1);
$item->save();


$item = new CATEGORIEOPERATION();
$item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::SORTIE;
$item->name = "Réglement de facture d'approvisionnemnt";
$item->setProtected(1);
$item->save();

$item = new CATEGORIEOPERATION();
$item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::SORTIE;
$item->name = "Payement de salaire du personnel";
$item->setProtected(1);
$item->save();

$item = new CATEGORIEOPERATION();
$item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::SORTIE;
$item->name = "Réglement de facture de reparation / d'entretien";
$item->setProtected(1);
$item->save();

$item = new CATEGORIEOPERATION();
$item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::SORTIE;
$item->name = "Remboursement du client";
$item->setProtected(1);
$item->save();

$item = new CATEGORIEOPERATION();
$item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::SORTIE;
$item->name = "Location de tricycle pour livraison";
$item->setProtected(1);
$item->save();

$item = new CATEGORIEOPERATION();
$item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::SORTIE;
$item->name = "Autre dépense";
$item->setProtected(1);
$item->save();



$item = new EMPLOYE();
$item->name = "Super Administrateur";
$item->email = "info@devaris21.com";
$item->adresse = "...";
$item->contact = "...";
$item->login = "root";
$item->password = "5e9795e3f3ab55e7790a6283507c085db0d764fc";
$item->setProtected(1);
$data = $item->save();
foreach (ROLE::getAll() as $key => $value) {
	$tr = new ROLE_EMPLOYE();
	$tr->employe_id = $data->lastid;
	$tr->role_id = $value->getId();
	$tr->setProtected(1);
	$tr->enregistre();
}


$datas = [200, 250, 300, 500, 1000, 1500, 2000];
foreach ($datas as $key => $value) {
	$item = new PRIX();
	$item->price = $value;
	$item->setProtected(1);
	$item->enregistre();
}


// $item = new PRODUIT();
// $item->files = [];
// $item->stock = 100;
// $item->name = "Jus de passion";
// $item->description = "Hourdis";
// $item->enregistre();

// $item = new PRODUIT();
// $item->files = [];
// $item->stock = 100;
// $item->name = "Jus d'orange";
// $item->description = "AC 15";
// $item->enregistre();

// $item = new PRODUIT();
// $item->files = [];
// $item->stock = 100;
// $item->name = "Jus de bissap";
// $item->description = "AP 15";
// $item->enregistre();

// $item = new RESSOURCE();
// $item->files = [];
// $item->stock = 100;
// $item->name = "EAU";
// $item->class = "Sac";
// $item->abbr = "Sacs";
// $item->enregistre();

// $item = new RESSOURCE();
// $item->files = [];
// $item->stock = 100;
// $item->name = "Orange";
// $item->class = "unités";
// $item->abbr = "Chgs";
// $item->enregistre();

// $item = new RESSOURCE();
// $item->files = [];
// $item->stock = 100;
// $item->name = "Sucre";
// $item->class = "Tonne";
// $item->abbr = "T";
// $item->enregistre();

// $item = new RESSOURCE();
// $item->files = [];
// $item->stock = 100;
// $item->name = "Bidons";
// $item->class = "Tonne";
// $item->abbr = "T";
// $item->enregistre();


$datas = ["standart"];
foreach ($datas as $key => $value) {
	$item = new TYPEVEHICULE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();

	$item = new TYPETRANSMISSION();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();

	$item = new TYPEPRESTATAIRE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();

	$item = new ENERGIE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();

	$item = new GROUPEMANOEUVRE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();

	$item = new TYPESUGGESTION();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}

?>