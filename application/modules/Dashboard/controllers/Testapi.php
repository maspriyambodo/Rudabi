<?php

defined('BASEPATH')OR exit('No direct script access allowed');
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
 * Description of Testapi
 *
 * @author centos
 */
class Testapi extends CI_Controller {

    public function index() {
        $this->parser->parse('v_Testapi',[]);
    }

}
