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
 * Description of Lintang
 *
 * @author centos
 */
class Lintang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Binsyar');
        $this->Authentication = $this->M_Binsyar->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Data Lintang Kota | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/siihat/datalintang?KEY=BOBA')
        ];
        $data['content'] = $this->parser->parse('Binsyar/V_lintang', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 as nama_propinsi [1] => Aceh as province_title)
        $data = [
            'title' => 'Data Lintang Provinsi ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/siihat/datalintang?KEY=BOBA&nama_propinsi=1'),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Binsyar/V_lintangprov', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
