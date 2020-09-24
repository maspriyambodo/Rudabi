<?php

defined('BASEPATH')OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Approved
 *
 * @author testinghumas
 */
class Approved extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Sekertariat');
        $this->Authentication = $this->M_Sekertariat->Auth();
    }

    public function index($year) {
        $data = [
            'title' => 'Data Approved Usulan | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'tahun' => $this->bodo->Dec($year),
            'pertahun' => read_file("https://simas.kemenag.go.id/rudabi/datapi/esbsnn/pertahun", true),
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/esbsnn/approveusulan?usul_tahun=' . $this->bodo->Dec($year), true)
        ];
        if ($data['data'] == false) {
            $data['msg'] = "Data Approved Usulan Tahun " . $this->bodo->Dec($year) . " Tidak tersedia!";
        } else {
            $data['msg'] = false;
        }
        $data['content'] = $this->parser->parse('Sekertariat/Approved/Approved_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key'));
        $data = [
            'title' => 'Data Approved Usulan Provinsi ' . $param[0] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'provinsi' => $param[0],
            'tahun' => $param[1],
            'id_provinsi' => $param[2],
            'pertahun' => read_file("https://simas.kemenag.go.id/rudabi/datapi/esbsnn/pertahun", true),
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/esbsnn/approveusulan?usul_tahun=' . $param[1] . '&usul_propinsi=' . $param[2] . '', true)
        ];
        $data['content'] = $this->parser->parse('Sekertariat/Approved/Approved_Provinsi', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Kabupaten() {
        $kabupaten = $this->bodo->Url($this->input->post_get('key'));
        $data = [
            'title' => 'Data Approved Usulan ' . $kabupaten[3] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'param' => $kabupaten,
            'pertahun' => read_file("https://simas.kemenag.go.id/rudabi/datapi/esbsnn/pertahun", true),
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/esbsnn/approveusulan?usul_tahun=' . $kabupaten[0] . '&usul_propinsi=' . $kabupaten[1] . '&usul_kabupaten=' . $kabupaten[2] . '', true)
        ];
        $data['content'] = $this->parser->parse('Sekertariat/Approved/Approved_Kabupaten', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
