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
 * Description of Input
 *
 * @author centos
 */
class Input extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Sekertariat/M_Sekertariat');
        $this->Authentication = $this->M_Sekertariat->Auth();
    }

    public function index() {
        $param = $this->bodo->Url($this->input->post_get('key')); // Array ( [0] => 2021 )
        $data = [
            'title' => 'Data Input Triwulan | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'param' => $param,
            'pertahun' => $this->bodo->Curel("https://simas.kemenag.go.id/rudabi/datapi/esbsnn/pertahun?KEY=BOBA"),
            'data' => $this->bodo->Curel('https://simas.kemenag.go.id/rudabi/datapi/esbsnn/inputusulan?KEY=BOBA&usul_tahun=' . $param[0] . '')
        ];
        if ($data['data'] == false) {
            $data['msg'] = "Data Input Triwulan Tahun " . $param[0] . " Tidak tersedia!";
        } else {
            $data['msg'] = "";
        }
        $data['content'] = $this->parser->parse('Users/u_sekretariat/Input_index', $data, true);
        return $this->parser->parse('Users/u_sekretariat/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // Array ( [0] => as year [1] => 17 as usul_propinsi [2] => Banten as propinsi_nama)
        $data = [
            'title' => 'Data Input Triwulan  Provinsi ' . $param[2] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'param' => $param,
            'data' => $this->bodo->Curel('https://simas.kemenag.go.id/rudabi/datapi/esbsnn/inputusulan?KEY=BOBA&usul_tahun=' . $param[0] . '&usul_propinsi=' . $param[1] . '')
        ];
        if ($data['data'] == false) {
            $data['msg'] = "Data Input Triwulan Tahun " . $data['tahun'] . " Tidak tersedia!";
            $data['hide'] = "hidden";
        } else {
            $data['msg'] = null;
            $data['hide'] = null;
        }
        $data['content'] = $this->parser->parse('Users/u_sekretariat/Input_Provinsi', $data, true);
        return $this->parser->parse('Users/u_sekretariat/Template', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key'));// Array ( [0] => Kab. Pandeglang [1] => 2021 as year [2] => 17 as usul_propinsi [3] => 232 as usul_kabupaten [4] => Banten as propinsi_nama)
        $data = [
            'title' => 'Data Input Triwulan ' . $param[0] . ' Tahun ' . $param[1] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'param' => $param,
            'data' => $this->bodo->Curel('https://simas.kemenag.go.id/rudabi/datapi/esbsnn/inputusulan?KEY=BOBA&usul_tahun=' . $param[1] . '&usul_propinsi=' . $param[2] . '&usul_kabupaten=' . $param[3])
        ];
        $data['content'] = $this->parser->parse('Users/u_sekretariat/Input_Kabupaten', $data, true);
        return $this->parser->parse('Users/u_sekretariat/Template', $data);
    }

}
