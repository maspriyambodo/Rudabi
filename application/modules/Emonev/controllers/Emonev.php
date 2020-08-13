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
 * Description of Emonev
 *
 * @author centos
 */
class Emonev extends CI_Controller {

    public function index() {
        $data = [
            'title' => 'E-Monev | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username')
        ];
        $data['content'] = $this->parser->parse('V_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Detail($id, $prov) {
        $provinsi = str_replace('_', ' ', $prov);
        $data = [
            'title' => 'E-Monev | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'id' => $id,
            'prov' => $provinsi
        ];
        $data['content'] = $this->parser->parse('V_Detail', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
