<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class DISPONIBILITE extends TABLE
{

		public static $tableName = __CLASS__;
		public static $namespace = __NAMESPACE__;

		const INDISPONIBLE = 1;
		const LIBRE = 2;
		const MISSION = 3;

		public $name;
		public $class;

		public function enregistre(){}


		public function sentenseCreate(){}
		public function sentenseUpdate(){}
		public function sentenseDelete(){}

	}
	?>