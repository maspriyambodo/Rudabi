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
 * Description of Ahli
 *
 * @author centos
 */
class Ahli extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Binsyar');
        $this->Authentication = $this->M_Binsyar->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Tenaga Ahli | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siihat/tenagaahli?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Binsyar/V_tenaga', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 as tenaga_provinsi [1] => Aceh as province_title)
        $data = [
            'title' => 'Tenaga Ahli Provinsi ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siihat/tenagaahli?KEY=boba&tenaga_provinsi=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Binsyar/V_tenagaprov', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
