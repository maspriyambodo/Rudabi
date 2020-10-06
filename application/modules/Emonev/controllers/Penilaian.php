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
 * Description of Penilaian
 *
 * @author centos
 */
class Penilaian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_emonev');
        $this->Authentication = $this->M_emonev->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Rekapitulasi Penilaian KUA | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/monev/Penilaian')
        ];
        $data['content'] = $this->parser->parse('Penilaian_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Tahun() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2016 )
        $data = [
            'title' => 'Detail Penilaian KUA Tahun ' . $param[0] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/monev/Penilaian?Tahun=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Penilaian_Tahun', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
