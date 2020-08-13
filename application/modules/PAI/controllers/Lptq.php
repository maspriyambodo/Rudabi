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
 * Description of Lptq
 *
 * @author centos
 */
class Lptq extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Simpenais');
        $this->Authentication = $this->M_Simpenais->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Lembaga Pembinaan Tilawatil Quran (LPTQ) | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname
        ];
        $data['content'] = $this->parser->parse('PAI/V_lptq', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
