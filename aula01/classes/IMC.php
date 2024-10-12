<?php

class IMC{

    public static function calc(Pessoa $pessoa){
        $valorImc = $pessoa->peso/$pessoa->altura**2;
        $pessoa->setImc($valorImc);
    }

    
}