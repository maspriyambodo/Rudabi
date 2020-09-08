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
 * Description of Bimwin
 *
 * @author centos
 */
class Bimwin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Bimwin');
        $this->Authentication = $this->M_Bimwin->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Target Catin | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => json_decode(file_get_contents("https://simas.kemenag.go.id/rudabi/datapi/embimwin/targetcatin2020"))
        ];
        $data['content'] = $this->parser->parse('KUA/Bimwin/V_Tcatinpusat', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi($id, $prov) {
        $data = [
            'title' => 'Target CATIN | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'id' => $id,
            'provinsi' => str_replace(['_', '%20'], ' ', $prov)
        ];
        $data['content'] = $this->parser->parse('KUA/Bimwin/V_bimwinprov', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
