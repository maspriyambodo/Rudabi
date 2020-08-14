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
 * Description of Lptq
 *
 * @author centos
 */
class Dakwah extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Simpenais');
        $this->Authentication = $this->M_Simpenais->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Lembaga Dakwah | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname
        ];
        $data['content'] = $this->parser->parse('PAI/V_dakwah', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi($id, $prov) {
        $data = [
            'title' => 'Lembaga Dakwah | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'id' => $id,
            'provinsi' => str_replace('_', ' ', $prov)
        ];
        $data['content'] = $this->parser->parse('PAI/V_dakwahprov', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Kabupaten($id, $kab) {
        $data = [
            'title' => 'Lembaga Dakwah | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'id' => $id,
            'provinsi' => str_replace('_', ' ', $kab)
        ];
        $data['content'] = $this->parser->parse('PAI/V_dakwahkab', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
