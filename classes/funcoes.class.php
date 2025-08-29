<?php

    class Funcoes {
        public function dtNasc($vlr, $tipo){
            switch ($tipo) {
                case 1:
                    $rst = implode("-", array_reverse(explode("/", $vlr))); //converte data Brasil para internacional
                    break;

                case 2:
                    $rst = implode("/", array_reverse(explode("-", $vlr))); //converte data Internacional para Brasil
                    break;
            }
            return $rst;
        }

        //novas funcões
    }
?>