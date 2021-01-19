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
 * Description of Lokasi
 *
 * @author testinghumas
 */
class Lokasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Binsyar/M_Binsyar');
        $this->Authentication = $this->M_Binsyar->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Hisab Lokasi | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siihat/hisablokasi?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Users/u_urais/V_Lokasi', $data, true);
        return $this->parser->parse('Users/u_urais/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2 as lokasi_provinsi [1] => Sumatera Utara as province_title)
        $data = [
            'title' => 'Hisab Pengukuran | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siihat/hisablokasi?KEY=boba&lokasi_provinsi=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Users/u_urais/V_Lokasiprov', $data, true);
        return $this->parser->parse('Users/u_urais/Template', $data);
    }

}
