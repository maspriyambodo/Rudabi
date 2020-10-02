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
 * Description of Tipologi
 *
 * @author centos
 */
class Tipologi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_emonev');
        $this->Authentication = $this->M_emonev->Auth();
    }

    public function index() {
        $data = [
            'title' => 'e-monev Tipologi KUA | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/monev/tipologi')
        ];
        $data['content'] = $this->parser->parse('Tipologi_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
