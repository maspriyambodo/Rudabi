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
 * Description of KUA
 *
 * @author centos
 */
class KUA extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_simpenghulu');
        $this->Authentication = $this->M_simpenghulu->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Sistem Informasi Kepenghuluan | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenghulu/kua?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('V_kua', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 16 as kua_province_id [1] => Jawa Timur as province_title )
        $data = [
            'title' => 'Detail Data KUA Provinsi ' . $param[1] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'param' => $param,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenghulu/kua?KEY=boba&kua_province_id=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('V_kuaprov', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Detail() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 225 as kua_city_id [1] => Kab. Malang as city_title [2] => 16 as kua_province_id [3] => Jawa Timur as province_title)
        $data = [
            'title' => 'Detail Data KUA ' . $param[1] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'param' => $param,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenghulu/kua?KEY=boba&kua_city_id=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('V_kuadetail', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
