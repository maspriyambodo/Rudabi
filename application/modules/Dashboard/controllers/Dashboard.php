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
        $this->load->model('M_Dashboard');
        $this->Authentication = $this->M_Dashboard->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Dashboard Rudabi',
            'username' => $this->session->userdata('username'),
            'total' => $this->Total()
        ];
        $data['content'] = $this->parser->parse('V_Dashboard', $data, true);
        return $this->parser->parse('Template', $data);
    }

    private function Total() {
        $data = [
            'sihat' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'siihat/total?KEY=BOBA')),
            'simas' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'eimas/total?KEY=BOBA')),
            'alat' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'siihat/alat?KEY=BOBA')),
            'pustaka' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'esbsnn/pustaka?KEY=BOBA')),
            'tipo_masjid' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'eimas/tipomas?KEY=BOBA')),
            'tipo_mushalla' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'eimas/tipomus?KEY=BOBA'))
        ];
        return $data;
    }

}
