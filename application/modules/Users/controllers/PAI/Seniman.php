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
 * Description of Seniman
 *
 * @author centos
 */
class Seniman extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PAI/M_Simpenais');
        $this->Authentication = $this->M_Simpenais->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Data Seniman | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/seniman?KEY=BOBA')
        ];
        $data['content'] = $this->parser->parse('Users/u_pai/V_Seniman', $data, true);
        return $this->parser->parse('Users/u_pai/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 8 as province_id [1] => Bengkulu as province_title)
        $data = [
            'title' => 'Data Seniman Islam ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/seniman?KEY=BOBA&province_id=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Users/u_pai/V_Senimanprov', $data, true);
        return $this->parser->parse('Users/u_pai/Template', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 17 as province_id [1] => Banten as province_title [2] => 233 as city_id [3] => Lebak city_title)
        $data = [
            'title' => 'Data Seniman Islam ' . $param[3] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/seniman?KEY=BOBA&city_id=' . $param[2]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Users/u_pai/V_Senimankab', $data, true);
        return $this->parser->parse('Users/u_pai/Template', $data);
    }

}
