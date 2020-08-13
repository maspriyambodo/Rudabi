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
 * Description of Masjid
 *
 * @author centos
 */
class Masjid extends CI_Controller {

    public function index() {
        $data = [
            'title' => 'Data Masjid | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username')
        ];
        $data['content'] = $this->parser->parse('V_Masjid', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    function Provinsi($id, $prov) {
        $provinsi = str_replace('_', ' ', $prov);
        $data = [
            'title' => 'Data Masjid | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'provinsi' => $provinsi,
            'id' => $id
        ];
        $data['content'] = $this->parser->parse('V_Masjidprov', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Kabupaten($kabupaten, $prov) {
        
    }

}
