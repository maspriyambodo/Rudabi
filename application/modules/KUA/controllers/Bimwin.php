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
 * Description of Bimwin
 *
 * @author centos
 */
class Bimwin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Bimwin');
        $this->Authentication = $this->M_Bimwin->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Bimwin Target Catin | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname
        ];
        $data['content'] = $this->parser->parse('Binsyar/V_bimwin', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
