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
 * Description of Pns
 *
 * @author centos
 */
class Pns extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Simpenais');
        $this->Authentication = $this->M_Simpenais->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Data Penyuluh Islam PNS | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/datapns?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Penyuluh/Penyuluh_pns', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 17 as penyuluh_pns_provinsi [1] => Banten as province_title)
        $data = [
            'title' => 'Data Penyuluh Provinsi ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/datapns?KEY=boba&penyuluh_pns_provinsi=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Penyuluh/Penyuluh_provinsi', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
