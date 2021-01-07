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
 * Description of Usulan
 *
 * @author centos
 */
class Usulan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Sekertariat');
        $this->Authentication = $this->M_Sekertariat->Auth();
    }

    public function index() {
        $param = $this->bodo->Url($this->input->post_get('key')); // Array ( [0] => 2021 )
        $data = [
            'title' => 'Data Usulan Triwulan | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'param' => $param,
            'pertahun' => read_file("https://simas.kemenag.go.id/rudabi/datapi/esbsnn/pertahun?KEY=BOBA", true),
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/esbsnn/usulantriwulan?KEY=BOBA&usul_tahun=' . $param[0] . '', true)
        ];
        if ($data['data'] == false) {
            $data['msg'] = "Data Usulan Triwulan Tahun " . $param[0] . " Tidak tersedia!";
        } else {
            $data['msg'] = "";
        }
        $data['content'] = $this->parser->parse('Sekertariat/Usulan/V_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // Array ( [0] => 2021 as usul_tahun [1] => 18 as usul_propinsi[2] => Bali as propinsi_nama)
        $data = [
            'title' => 'Data Usulan Triwulan  Provinsi ' . $param[2] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'param' => $param,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/esbsnn/usulantriwulan?KEY=BOBA&usul_tahun=' . $param[0] . '&usul_propinsi=' . $param[1] . '', true)
        ];
        if ($data['data'] == false) {
            $data['msg'] = "Data Usulan Triwulan Tahun " . $data['tahun'] . " Tidak tersedia!";
            $data['hide'] = "hidden";
        } else {
            $data['msg'] = null;
            $data['hide'] = null;
        }
        $data['content'] = $this->parser->parse('Sekertariat/Usulan/V_Provinsi', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
