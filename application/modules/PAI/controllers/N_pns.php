<?php

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
 * Description of N_pns
 *
 * @author centos
 */
class N_pns extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Simpenais');
        $this->Authentication = $this->M_Simpenais->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Data Penyuluh Islam Non-PNS | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/datanonpns?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Penyuluh/Nonpns_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 17 as penyuluh_nonpns_provinsi [1] => Banten as province_title)
        $data = [
            'title' => 'Data Penyuluh Provinsi ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/datanonpns?KEY=boba&penyuluh_nonpns_provinsi=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Penyuluh/Nonpns_provinsi', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
