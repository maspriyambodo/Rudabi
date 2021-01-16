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
 * Description of Satker
 *
 * @author centos
 */
class Satker extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Sekertariat');
        $this->Authentication = $this->M_Sekertariat->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Data SATKER | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => file_get_contents("https://simas.kemenag.go.id/rudabi/datapi/esbsnn?KEY=boba")
        ];
        $data['content'] = $this->parser->parse('Sekertariat/Satker/V_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // Array ( [0] => 18 [1] => Bali )
        $data = [
            'title' => 'Data SATKER | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel('https://simas.kemenag.go.id/rudabi/datapi/esbsnn?KEY=BOBA&kab_propinsi_id=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Sekertariat/Satker/V_Provinsi', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
