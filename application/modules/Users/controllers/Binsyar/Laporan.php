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
 * Description of Laporan
 *
 * @author centos
 */
class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Binsyar/M_Binsyar');
        $this->Authentication = $this->M_Binsyar->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Hisab Laporan| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel('https://simas.kemenag.go.id/rudabi/datapi/siihat/hisablaporan?KEY=BOBA')
        ];
        $data['content'] = $this->parser->parse('Users/u_urais/V_laporan', $data, true);
        return $this->parser->parse('Users/u_urais/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 12 as ukur_provinsi [1] => Jawa Barat as province_title)
        $data = [
            'title' => 'Data Hisab Provinsi ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel('https://simas.kemenag.go.id/rudabi/datapi/siihat/hisablaporan?KEY=BOBA&ukur_provinsi=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Users/u_urais/Laporan_Provinsi', $data, true);
        return $this->parser->parse('Users/u_urais/Template', $data);
    }

}
