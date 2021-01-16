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
 * Description of Guru_ngaji
 *
 * @author centos
 */
class Penulis extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PAI/M_Simpenais');
        $this->Authentication = $this->M_Simpenais->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Penulis Islam | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel('https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/penulis?KEY=BOBA')
        ];
        $data['content'] = $this->parser->parse('Users/u_pai/V_penulis', $data, true);
        return $this->parser->parse('Users/u_pai/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 as province_id [1] => Nanggroe Aceh Darussalam as province_title)
        $data = [
            'title' => 'Penulis Islam ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel('https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/penulis?KEY=BOBA&province_id=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Users/u_pai/V_penulisprov', $data, true);
        return $this->parser->parse('Users/u_pai/Template', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 16 as province_id [1] => Jawa Timur as province_title [2] => 202 as city_id [3] => Jember as city_title)
        $data = [
            'title' => 'Penulis Islam ' . $param[3] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel('https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/penulis?KEY=BOBA&city_id=' . $param[2]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Users/u_pai/V_penuliskab', $data, true);
        return $this->parser->parse('Users/u_pai/Template', $data);
    }

}
