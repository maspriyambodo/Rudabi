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
 * Description of Lokasi
 *
 * @author testinghumas
 */
class Lokasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Binsyar');
        $this->Authentication = $this->M_Binsyar->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Hisab Lokasi | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname
        ];
        $data['content'] = $this->parser->parse('Binsyar/V_Lokasi', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi($id, $prov) {
        $data = [
            'title' => 'Hisab Lokasi | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'id' => $id,
            'provinsi' => str_replace(['_', '%20'], ' ', $prov)
        ];
        $data['content'] = $this->parser->parse('Binsyar/V_Lokasiprov', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
