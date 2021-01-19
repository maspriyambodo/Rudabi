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
 * Description of Pengukuran
 *
 * @author centos
 */
class Pengukuran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Binsyar');
        $this->Authentication = $this->M_Binsyar->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Hisab Pengukuran | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siihat/hisabpengukuran?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Binsyar/V_Pengukuran', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 as ukur_provinsi [1] => Aceh as province_title) 
        $data = [
            'title' => 'Hisab Pengukuran | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siihat/hisabpengukuran?KEY=boba&ukur_provinsi=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Binsyar/V_Pengukuranprov', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
