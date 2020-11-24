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
 * Description of Sihat
 *
 * @author centos
 */
class Sihat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Binsyar/M_Binsyar');
        $this->Authentication = $this->M_Binsyar->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Hisab Rukyat | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname
        ];
        $data['content'] = $this->parser->parse('Bins/V_sihat', $data, true);
        return $this->parser->parse('Bins/Template', $data);
    }

    public function Provinsi($id, $prov) {
        $data = [
            'title' => 'Hisab Rukyat | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'id' => $id,
            'provinsi' => str_replace(['_', '%20'], ' ', $prov)
        ];
        $data['content'] = $this->parser->parse('Binsyar/V_sihatprov', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
