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
 * Description of Pegawai
 *
 * @author centos
 */
class Pegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Sekertariat');
        $this->Authentication = $this->M_Sekertariat->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Data Pegawai | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/sicakepp', true)
        ];
        $data['content'] = $this->parser->parse('Sekertariat/Sicakep/Pegawai/Pegawai_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); //output param Array ( [0] => DKI Jakarta [1] => 12 ) 
        $data = [
            'title' => 'Data Pegawai ' . $param[0] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'param' => $param,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/sicakepp?peg_provinsi=' . $param[1], true)
        ];
        $data['content'] = $this->parser->parse('Sekertariat/Sicakep/Pegawai/Pegawai_provinsi', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); //output param Array ( [0] => Jakarta Selatan [1] => 124 )
        $data = [
            'title' => 'Data Pegawai ' . $param[0] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'param' => $param,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/sicakepp?peg_kabupaten=' . $param[1], true)
        ];
        $data['content'] = $this->parser->parse('Sekertariat/Sicakep/Pegawai/Pegawai_Kabupaten', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Detail() {
        $param = $this->bodo->Url($this->input->post_get('key'));
        $data = [
            'title' => 'Detail ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'param' => $param,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/sicakepp?peg_id=' . $param[0], true)
        ];
        $data['content'] = $this->parser->parse('Sekertariat/Sicakep/Pegawai/Pegawai_Detail', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
