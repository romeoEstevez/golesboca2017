<?php

class Validacion {

	public $minNumbers = -1;
	public $minUser = 5;
	public $minPass = 8;

	public function validarEmail($e) {

		if (filter_var($e, FILTER_VALIDATE_EMAIL)) {
			return TRUE;
		}

		return FALSE;

	}

	public function validarPassword($p) {

		if(strlen($p) < $this->minPass) {
			return false;
		}

		$arr = str_split($p,1);
		$numero = 0;
		for($i=0;$i<count($arr);$i++) {
			if( is_numeric($arr[$i]) ) {
				$numero++;
			}
		}

		if($numero > $this->minNumbers) {
			return true;
		}

		return false;
	}

	public function validarUsuario($u) {

		if(strlen($u) > $this->minUser) {
			return true;
		}

		return false;
	}


}
