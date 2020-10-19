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
 * Description of Simpenais
 *
 * @author centos
 */
class Simpenais extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Simpenais');
        $this->Authentication = $this->M_Simpenais->Auth();
    }

    public function index() {
        $data = [
            'title' => 'SIMPENAIS | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenaiss?KEY=boba'),
            'statuskawin' => read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/statuskawin?KEY=boba'),
            'simpenaiss' => read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenaiss?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('PAI/V_Simpenais', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function PNS() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 as province_id [1] => Nanggroe Aceh Darussalam as province_title )
        $data = [
            'title' => 'SIMPENAIS | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/penyuluhpns?KEY=boba&province_id=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('PAI/V_PNS', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Nonpns() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 as province_id [1] => Nanggroe Aceh Darussalam as province_title )
        $data = [
            'title' => 'SIMPENAIS | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenaiss?KEY=boba&penyuluh_nonpns_provinsi=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('PAI/V_Nonpns', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
