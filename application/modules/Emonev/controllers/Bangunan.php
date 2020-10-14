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
 * Description of Bangunan
 *
 * @author centos
 */
class Bangunan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_emonev');
        $this->Authentication = $this->M_emonev->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Status Bangunan KUA | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'bangunan' => read_file('https://simas.kemenag.go.id/rudabi/datapi/monev/Statbangunan?KEY=BOBA')
        ];
        $data['content'] = $this->parser->parse('Bangunan_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Statusbangunan() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 0 [1] => Tidak Mengisi Inputan )
        $data = [
            'title' => 'Status Bangunan KUA ' . $param[1] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/monev/Stat_bangunan?KEY=BOBA&status=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Bangunan_Status', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
