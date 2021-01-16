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
class Guru_ngaji extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PAI/M_Simpenais');
        $this->Authentication = $this->M_Simpenais->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Guru Ngaji | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel('https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/tokoh?KEY=BOBA')
        ];
        $data['content'] = $this->parser->parse('Users/u_pai/V_guru', $data, true);
        return $this->parser->parse('Users/u_pai/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 16 as province_id [1] => Jawa Timur as province_title)
        $data = [
            'title' => 'Guru Ngaji Provinsi' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel('https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/tokoh?KEY=BOBA&province_id=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Users/u_pai/V_guruprov', $data, true);
        return $this->parser->parse('Users/u_pai/Template', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 16 as province_id [1] => Jawa Timur as province_title [2] => 215 as city_id [3] => Bojonegoro as city_title )
        $data = [
            'title' => 'Guru Ngaji ' . $param[3] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel('https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/tokoh?KEY=BOBA&city_id=' . $param[2]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Users/u_pai/V_gurukab', $data, true);
        return $this->parser->parse('Users/u_pai/Template', $data);
    }

}
