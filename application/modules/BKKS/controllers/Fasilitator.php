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
 * Description of Fasilitator
 *
 * @author centos
 */
class Fasilitator extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Bimwin');
        $this->Authentication = $this->M_Bimwin->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Data Fasilitator | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/embimwin/fasilitator?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Fasilitator/index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 as id_j_kegiatan [1] => Bimbingan Pra Nikah as jenis_kegiatan)
        $data = [
            'title' => 'Kegiatan - ' . $param[1] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/embimwin/fasilitator?KEY=boba&id_j_kegiatan=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('BKKS/Fasilitator/Provinsi', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
