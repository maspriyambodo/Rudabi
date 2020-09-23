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

    private function Dec($enc) {
        $encrypt = str_replace(['-', '_', '~'], ['+', '/', '='], $enc);
        $dec = $this->encryption->decrypt($encrypt);
        return $dec;
    }

    public function index($year) {
        $tahun = $this->Dec($year);
        $data = [
            'title' => 'Data Approved Usulan | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'tahun' => $tahun,
            'pertahun' => read_file("https://simas.kemenag.go.id/rudabi/datapi/esbsnn/pertahun", true),
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/esbsnn/approveusulan?usul_tahun=' . $tahun, true)
        ];
        if ($data['data'] == false) {
            $data['msg'] = "Data Approved Usulan Tahun " . $tahun . " Tidak tersedia!";
        } else {
            $data['msg'] = false;
        }
        $data['content'] = $this->parser->parse('Sekertariat/Approved/Approved_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->input->post_get('key');
        $dec = $this->Dec($param);
        $approve = str_replace(['?propinsi_nama=', '&usul_tahun=', '&usul_propinsi='], ['', ',', ','], $dec);
        $approved = explode(',', $approve);
        //output approved = Array ( [0] => Jawa Timur [1] => 2020 [2] => 16 )
        $data = [
            'title' => 'Data Approved Usulan Provinsi ' . $approved[0] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'provinsi' => $approved[0],
            'tahun' => $approved[1],
            'pertahun' => read_file("https://simas.kemenag.go.id/rudabi/datapi/esbsnn/pertahun", true),
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/esbsnn/approveusulan?usul_tahun=' . $approved[1] . '&usul_propinsi=' . $approved[2] . '', true)
        ];
        $data['content'] = $this->parser->parse('Sekertariat/Approved/Approved_Provinsi', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
