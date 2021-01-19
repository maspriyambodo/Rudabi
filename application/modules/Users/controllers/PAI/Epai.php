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
 * Description of Epai
 *
 * @author centos
 */
class Epai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PAI/M_Epai');
        $this->Authentication = $this->M_Epai->Auth();
    }

    public function index() {
        $data = [
            'title' => 'E-PAI | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'epay?KEY=BOBA')
        ];
        $data['content'] = $this->parser->parse('Users/u_pai/V_Epai', $data, true);
        return $this->parser->parse('Users/u_pai/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => AC as provinsi_kode [1] => Aceh as provinsi_nama)
        $data = [
            'title' => 'Data PAI Provinsi ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'epay?KEY=BOBA&provinsi_kode=%27' . $param[0] . '%27'),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Users/u_pai/V_Epaiprov', $data, true);
        return $this->parser->parse('Users/u_pai/Template', $data);
    }

    public function Detail() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => JK as provinsi_kode [1] => Jakarta as provinsi_nama [2] => JK01 as penyuluh_KabKota_Kode [3] => Kepulauan Seribu as kabkota_nama)
        $data = [
            'title' => 'Data PAI ' . $param[3] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'epay/penyuluh?KEY=BOBA&penyuluh_KabKota_Kode=%27' . $param[2] . '%27'),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Users/u_pai/V_Epaidetail', $data, true);
        return $this->parser->parse('Users/u_pai/Template', $data);
    }

}
