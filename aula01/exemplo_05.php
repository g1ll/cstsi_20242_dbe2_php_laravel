<?php 

class Pessoa {
	public $nome, $idade, $altura, $peso;
	private $imc;


	function __construct($nome, $idade, $altura=0, $peso=0)
	{
		$this->nome = $nome;
		$this->idade = $idade;
		$this->peso = $peso;
		$this->altura = $altura;
	}

	function __destruct()
	{
		echo "\n$this->nome foi destruído!!";
	}

	function calcIMC(){
		if($this->peso && $this->altura){
			$this->imc = $this->peso/$this->altura**2;
		}else{
			echo "\nErro: configurar peso e altura primeiro!!\n";
		}
	}

	function getImc(){
		return $this->imc;
	}

	function __get($attr){

		// if($attr == 'sobrenome')
		// 	return strtoupper($this->$attr); //
		
		return $this->$attr; ////echo $obj->imc
	}
}

$pessoaUm = new Pessoa("Gill",36);
$pessoaDois = new Pessoa("Vera",60,1.55,89);

$pessoaUm->calcIMC();
$pessoaDois->calcIMC();

echo "\nO IMC do $pessoaDois->nome eh ".number_format($pessoaDois->imc,2)." \n";


var_dump($pessoaUm, $pessoaDois);