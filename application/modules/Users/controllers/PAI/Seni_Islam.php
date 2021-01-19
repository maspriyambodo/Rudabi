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
 * Description of Seni_Islam
 *
 * @author centos
 */
class Seni_Islam extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PAI/M_Simpenais');
        $this->Authentication = $this->M_Simpenais->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Lembaga Seni Islam | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/lembagaseni?KEY=BOBA')
        ];
        $data['content'] = $this->parser->parse('Users/u_pai/V_seni', $data, true);
        return $this->parser->parse('Users/u_pai/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 16 as lembaga_seni_provinsi [1] => Jawa Timur as province_title)
        $data = [
            'title' => 'Lembaga Seni Islam Provinsi' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/lembagaseni?KEY=BOBA&lembaga_seni_provinsi=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Users/u_pai/V_seniprov', $data, true);
        return $this->parser->parse('Users/u_pai/Template', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 16 as lembaga_seni_provinsi [1] => Jawa Timur as province_title [2] => 215 as city_id [3] => Bojonegoro as city_title)
        $data = [
            'title' => 'Lembaga Seni Islam' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/lembagaseni?KEY=BOBA&city_id=' . $param[2]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Users/u_pai/V_senikab', $data, true);
        return $this->parser->parse('Users/u_pai/Template', $data);
    }

}
