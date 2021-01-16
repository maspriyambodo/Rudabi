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
            'data' => $this->bodo->Curel('https://simas.kemenag.go.id/rudabi/datapi/sicakepp/pensiun?KEY=BOBA'),
            'gol' => $this->bodo->Curel('https://simas.kemenag.go.id/rudabi/datapi/sicakepp/golongan?KEY=BOBA')
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
            'data' => $this->bodo->Curel('https://simas.kemenag.go.id/rudabi/datapi/sicakepp/pensiun?KEY=BOBA&peg_provinsi=' . $param[0]),
            'gol' => $this->bodo->Curel('https://simas.kemenag.go.id/rudabi/datapi/sicakepp/golongan?KEY=BOBA')
        ];
        $data['content'] = $this->parser->parse('Pensiun/Provinsi', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 126 as kab_id [1] => Jakarta Pusat as kab_nama [2] => 12 as peg_provinsi [3] => DKI Jakarta as propinsi_nama ) 
        $data = [
            'title' => 'Data Pensiun Kabupaten ' . $param[1] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => $this->bodo->Curel('https://simas.kemenag.go.id/rudabi/datapi/sicakepp/pensiun?KEY=boba&kab_id=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Pensiun/V_Kabupaten', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Golongan() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 126 as kab_id [1] => Jakarta Pusat as kab_nama [2] => 217 as item_id [3] => I/a - Juru Muda as item_name [4] => 12 as peg_provinsi [5] => DKI Jakarta as propinsi_nama )
        $data = [
            'title' => 'Detail Pegawai Golongan ' . $param[3] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => $this->bodo->Curel('https://simas.kemenag.go.id/rudabi/datapi/sicakepp/pensiun?KEY=boba&kab_id=' . $param[0] . '&item_id=' . $param[2] . '')
        ];
        $data['content'] = $this->parser->parse('Pensiun/Golongan', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
