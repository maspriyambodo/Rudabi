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
        $this->load->model('Binsyar/M_Binsyar');
        $this->Authentication = $this->M_Binsyar->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Dashboard Urusan Agama Islam & Binsyar | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'total' => $this->Total()
        ];
        $data['content'] = $this->parser->parse('Users/u_urais/V_Dashboard', $data, true);
        return $this->parser->parse('Users/u_urais/Template', $data);
    }

    private function Total() {
        $data = [
            'sihat' => $this->bodo->Curel(''),
            'tenaga' => $this->bodo->Curel(''),
            'pengukuran' => $this->bodo->Curel(''),
            'lokasi' => $this->bodo->Curel(''),
            'laporan' => $this->bodo->Curel(''),
            'lintang' => $this->bodo->Curel(''),
            'masjid' => $this->bodo->Curel(''),
            'mushalla' => $this->bodo->Curel(''),
            'tipo_masjid' => $this->bodo->Curel(''),
            'tipo_mushalla' => $this->bodo->Curel('')
        ]; //Array ( [sihat] => Array ( [jumlah] => 23212 ) [tenaga] => [pengukuran] => [lokasi] => [laporan] => [lintang] => [masjid] => [mushalla] => [tipo_masjid] => [tipo_mushalla] => )
        return $data;
    }

}
