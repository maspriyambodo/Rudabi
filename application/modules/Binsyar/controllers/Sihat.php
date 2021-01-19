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
        $this->load->model('M_Binsyar');
        $this->Authentication = $this->M_Binsyar->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Data Hisab Rukyat | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siihat/alat2020?KEY=BOBA')
        ];
        $data['content'] = $this->parser->parse('Binsyar/Sihat_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 12 as alat_provinsi[1] => Jawa Barat as province_title )
        $data = [
            'title' => 'Sihat Provinsi ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siihat/alat2020?KEY=BOBA&alat_provinsi=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Binsyar/Sihat_provinsi', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
