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
 * Description of Laporan
 *
 * @author centos
 */
class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Binsyar');
        $this->Authentication = $this->M_Binsyar->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Hisab Laporan| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname
        ];
        $data['content'] = $this->parser->parse('Binsyar/V_laporan', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
