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
 * Description of Satker
 *
 * @author centos
 */
class Satker extends CI_Controller {

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

    public function index() {
        $data = [
            'title' => 'Data SATKER | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => file_get_contents("https://simas.kemenag.go.id/rudabi/datapi/esbsnn?KEY=BOBA")
        ];
        $data['content'] = $this->parser->parse('Sekertariat/Satker/V_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi($param) {
        $dec = $this->Dec($param);
        $value = explode('/', $dec);
        $data = [
            'title' => 'Data SATKER | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'id' => $value[0],
            'provinsi' => str_replace(['_', '%20'], ' ', $value[1]),
            'data' => json_decode(file_get_contents("https://simas.kemenag.go.id/rudabi/datapi/esbsnn?KEY=BOBA&kab_propinsi_id=" . $value[0] . ""))
        ];
        $data['content'] = $this->parser->parse('Sekertariat/Satker/V_Provinsi', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
