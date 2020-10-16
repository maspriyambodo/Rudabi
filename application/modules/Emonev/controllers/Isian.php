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
 * Description of Isian
 *
 * @author centos
 */
class Isian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_emonev');
        $this->Authentication = $this->M_emonev->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Rekapitulasi Isian KUA | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'urung_input' => read_file('https://simas.kemenag.go.id/rudabi/datapi/monev/Rekap?KEY=boba'),
            'rekap' => read_file('https://simas.kemenag.go.id/rudabi/datapi/monev/Isian?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Isian_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
