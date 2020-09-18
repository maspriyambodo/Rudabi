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

    private function Dec($enc) {
        $encrypt = str_replace(['-', '_', '~'], ['+', '/', '='], $enc);
        $dec = $this->encryption->decrypt($encrypt);
        return $dec;
    }

    public function index($year) {
        $tahun = $this->Dec($year);
        $data = [
            'title' => 'Data Usulan Triwulan | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'tahun' => $tahun,
            'pertahun' => read_file("https://simas.kemenag.go.id/rudabi/datapi/esbsnn/pertahun", true),
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/esbsnn/usulantriwulan?usul_tahun=' . $tahun . '', true)
        ];
        if ($data['data'] == false) {
            $data['msg'] = "Data Usulan Triwulan Tahun " . $tahun . " Tidak tersedia!";
        } else {
            $data['msg'] = "";
        }
        $data['content'] = $this->parser->parse('Sekertariat/Usulan/V_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi($param) {
        $dec = $this->Dec($param);
        $value = explode('/', $dec);
        $data = [
            'title' => 'Data Usulan Triwulan  Provinsi ' . $value[2] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'id' => $value[1],
            'tahun' => $value[0],
            'provinsi' => str_replace(['_', '%20'], ' ', $value[2]),
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/esbsnn/usulantriwulan?usul_tahun=' . $value[0] . '&usul_propinsi=' . $value[1] . '', true)
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
