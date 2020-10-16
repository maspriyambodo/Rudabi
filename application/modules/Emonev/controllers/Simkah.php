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
 * Description of Simkah
 *
 * @author centos
 */
class Simkah extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_emonev');
        $this->Authentication = $this->M_emonev->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Rekap Penggunaan SIMKAH | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/monev/simkah?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Simkah_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Detail() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 0 [1] => belum mengisi simkah )
        $data = [
            'title' => 'Penggunaan SIMKAH ' . $param[1] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/monev/simkah?KEY=boba&simkah=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Simkah_Detail', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
