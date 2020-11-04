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
 * Description of Kua
 *
 * @author centos
 */
class Simpenghulu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_simpenghulu');
        $this->Authentication = $this->M_simpenghulu->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Data Rumah Ibadah | RUDABI SYSTEM OF KEMENAG RI'
        ];
        $data['content'] = $this->parser->parse('V_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
