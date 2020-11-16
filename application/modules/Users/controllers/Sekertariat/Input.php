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

    private function Dec($enc) {
        $encrypt = str_replace(['-', '_', '~'], ['+', '/', '='], $enc);
        $dec = $this->encryption->decrypt($encrypt);
        return $dec;
    }

    public function index($year) {
        $tahun = $this->Dec($year);
        $data = [
            'title' => 'Data Input Triwulan | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'tahun' => $tahun,
            'pertahun' => read_file("https://simas.kemenag.go.id/rudabi/datapi/esbsnn/pertahun?KEY=BOBA", true),
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/esbsnn/inputusulan?KEY=BOBA&usul_tahun=' . $tahun . '', true)
        ];
        if ($data['data'] == false) {
            $data['msg'] = "Data Input Triwulan Tahun " . $tahun . " Tidak tersedia!";
        } else {
            $data['msg'] = "";
        }
        $data['content'] = $this->parser->parse('Sek/Input_index', $data, true);
        return $this->parser->parse('Sek/Template', $data);
    }

    public function Provinsi($param) {
        $dec = $this->Dec($param);
        $value = explode('/', $dec);
        $data = [
            'title' => 'Data Input Triwulan  Provinsi ' . $value[2] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'id' => $value[1],
            'tahun' => $value[0],
            'provinsi' => $value[2],
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/esbsnn/inputusulan?KEY=BOBA&usul_tahun=' . $value[0] . '&usul_propinsi=' . $value[1] . '', true)
        ];
        if ($data['data'] == false) {
            $data['msg'] = "Data Input Triwulan Tahun " . $data['tahun'] . " Tidak tersedia!";
            $data['hide'] = "hidden";
        } else {
            $data['msg'] = null;
            $data['hide'] = null;
        }
        $data['content'] = $this->parser->parse('Sek/Input_Provinsi', $data, true);
        return $this->parser->parse('Sek/Template', $data);
    }

    public function Kabupaten() {
        $dec = $this->Dec($this->input->post_get('param', true));
        $value = str_replace(['kab_nama=', '&usul_tahun=', '&usul_propinsi=', '&usul_kabupaten=', '&provinsi='], ['', ',', ',', ',', ','], $dec);
        $param = explode(',', $value);
        $data = [
            'title' => 'Data Input Triwulan ' . $param[0] . ' Tahun ' . $param[1] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'id_provinsi' => $param[2],
            'kab_nama' => $param[0],
            'provinsi' => $param[4],
            'tahun' => $param[1],
            'kabupaten' => str_replace(['Kab.', 'kabupaten'], ' ', $param[0]),
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/esbsnn/inputusulan?KEY=BOBA&usul_tahun=' . $param[1] . '&usul_propinsi=' . $param[2] . '&usul_kabupaten=' . $param[3], true)
        ];
        $data['content'] = $this->parser->parse('Sek/Input_Kabupaten', $data, true);
        return $this->parser->parse('Sek/Template', $data);
    }

}
