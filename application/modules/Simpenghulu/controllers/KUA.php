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
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/kua?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('V_kua', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 16 as province_id [1] => Jawa Timur as province_title )
        $data = [
            'title' => 'Detail Data KUA Provinsi ' . $param[1] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'param' => $param,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenghulu?KEY=boba&province_id=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('V_kuaprov', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Detail($id) {
        $data = [
            'title' => 'Detail Data KUA | RUDABI SYSTEM OF KEMENAG RI',
            'id' => $id
        ];
        $data['content'] = $this->parser->parse('Kcmowcmw', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
