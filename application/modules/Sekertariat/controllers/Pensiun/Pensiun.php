<?php

defined('BASEPATH')OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pensiun
 *
 * @author testinghumas
 */
class Pensiun extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Sekertariat');
        $this->Authentication = $this->M_Sekertariat->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Data Mutasi Pensiun Pegawai | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/sicakepp/pensiun?KEY=BOBA'),
            'gol' => read_file('https://simas.kemenag.go.id/rudabi/datapi/sicakepp/golongan?KEY=BOBA')
        ];
        $data['content'] = $this->parser->parse('Pensiun/index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 17 [1] => Banten )
        $data = [
            'title' => 'Data Pensiun Provinsi ' . $param[1] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/sicakepp/pensiun??KEY=BOBA&peg_provinsi=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Pensiun/Provinsi', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }
    
    public function Golongan() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 17 [1] => Banten )
        $data = [
            'title' => 'Data Pensiun Provinsi ' . $param[1] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/sicakepp/pensiun??KEY=BOBA&peg_provinsi=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Pensiun/Provinsi', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
