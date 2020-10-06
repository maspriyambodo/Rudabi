<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Product:        System of kementerian agama Republik Indonesia
 * License Type:   Government
 * Access Type:    Multi-User
 * License:        https://maspriyambodo.com
 * maspriyambodo@gmail.com
 * 
 * Thank you,
 * maspriyambodo
 */

/**
 * Description of Bodo
 *
 * @author centos
 */
class Bodo {

    private $CI;

    public function __construct() {
        $this->CI = &get_instance();
    }

    public function Dec($enc) {
        $encrypt = str_replace(['-', '_', '~'], ['+', '/', '='], $enc);
        $dec = $this->CI->encryption->decrypt($encrypt);
        return $dec;
    }

    public function Url($a) {
        $b = $this->Dec($a); //output $dec = ?a=2020&b=16&c=212&d=Kab. Madiun
        $c = str_replace(['?a=', '&b=', '&c=', '&d=', '&e=', '&f=', '&g='], ['', ',', ',', ',', ',', ',', ',', ','], $b);
        $d = explode(',', $c); //output $kabupaten = Array ( [0] => 2020 [1] => 16 [2] => 212 [3] => Kab. Madiun )        
        return $d;
    }

}