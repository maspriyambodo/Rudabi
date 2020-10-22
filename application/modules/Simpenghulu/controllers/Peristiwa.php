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
 * Description of Peristiwa
 *
 * @author centos
 */
class Peristiwa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_simpenghulu');
        $this->Authentication = $this->M_simpenghulu->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Sistem Informasi Kepenghuluan | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenghulu/nikah?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Peristiwa_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 as nikah_province_id [1] => Aceh as provinsi)
        $data = [
            'title' => 'Sistem Informasi Kepenghuluan | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenghulu/penghulu?KEY=boba&city_province=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Peristiwa_Provinsi', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
