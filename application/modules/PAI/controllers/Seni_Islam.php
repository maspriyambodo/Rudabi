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
        $this->load->model('M_Simpenais');
        $this->Authentication = $this->M_Simpenais->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Lembaga Seni Islam | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname
        ];
        $data['content'] = $this->parser->parse('PAI/V_seni', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi($id, $prov) {
        $data = [
            'title' => 'Lembaga Seni Islam | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'id' => $id,
            'provinsi' => str_replace('_', ' ', $prov)
        ];
        $data['content'] = $this->parser->parse('PAI/V_seniprov', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Kabupaten($id, $prov) {
        $data = [
            'title' => 'Lembaga Seni Islam | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'id' => $id,
            'kabupaten' => str_replace('_', ' ', $prov)
        ];
        $data['content'] = $this->parser->parse('PAI/V_senikab', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
