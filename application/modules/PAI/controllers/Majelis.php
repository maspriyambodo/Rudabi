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
 * Description of Majelis
 *
 * @author centos
 */
class Majelis extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Simpenais');
        $this->Authentication = $this->M_Simpenais->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Majelis Taklim | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/majelistaklim?KEY=BOBA')
        ];
        $data['content'] = $this->parser->parse('PAI/V_majelis', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 30 as province_id [1] => Gorontalo as province_title) 
        $data = [
            'title' => 'Data Majelis Taklim Provinsi ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/majelistaklim?KEY=BOBA&province_id=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('PAI/V_majelisprov', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 13 as province_id [1] => Jawa Barat as province_title [2] => 7 as city_id [3] => Aceh Barat as city_title )
        $data = [
            'title' => 'Data Majelis Taklim Provinsi ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/majelistaklim?KEY=BOBA&city_id=' . $param[2]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('PAI/V_majeliskab', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
