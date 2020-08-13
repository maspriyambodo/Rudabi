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

    public function index() {
        $data = [
            'title' => 'KUA Menurut Kondisi Bangunan | RUDABI SYSTEM OF KEMENAG RI'
        ];
        $data['content'] = $this->parser->parse('V_kua', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi($id) {
        $data = [
            'title' => 'Detail Data KUA | RUDABI SYSTEM OF KEMENAG RI',
            'id' => $id
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
