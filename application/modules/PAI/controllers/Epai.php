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
 * Description of Epai
 *
 * @author centos
 */
class Epai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth/M_Auth');
        $this->M_Auth->SU();
    }

    public function index() {
        $data = [
            'title' => 'E-PAI | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username')
        ];
        $data['content'] = $this->parser->parse('PAI/V_Epai', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Detail($kode, $prov) {
        $data = [
            'title' => 'E-PAI | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'kode' => $kode,
            'prov' => str_replace('_', ' ', $prov)
        ];
        $data['content'] = $this->parser->parse('PAI/V_Detail', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Penyuluh($kode, $prov) {
        $data = [
            'title' => 'E-PAI | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'kode' => $kode,
            'prov' => str_replace('_', ' ', $prov)
        ];
        $data['content'] = $this->parser->parse('PAI/V_Penyuluh', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
