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
 * Description of Dashboard
 *
 * @author centos
 */
class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Emonev/M_emonev');
        $this->Authentication = $this->M_emonev->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Dashboard Bina KUA & Keluarga Sakinah | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'total' => $this->Total()
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/V_Dashboard', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    private function Total() {
        $data = [
            'target_catin' => $this->bodo->Curel(''),
            'data_catin' => $this->bodo->Curel(''),
            'fasilitator' => $this->bodo->Curel(''),
            'rekap_kua' => $this->bodo->Curel(''),
            'tipo_kua' => $this->bodo->Curel(''),
            'tanah_kua' => $this->bodo->Curel(''),
            'bangunan_kua' => $this->bodo->Curel(''),
            'regis_kua' => $this->bodo->Curel(''),
            'penggunaan_simkah' => $this->bodo->Curel(''),
            'penilaian_kua' => $this->bodo->Curel(''),
            'data_kua' => $this->bodo->Curel(''),
            'data_penghulu' => $this->bodo->Curel('')
        ];
        return $data;
    }

}
