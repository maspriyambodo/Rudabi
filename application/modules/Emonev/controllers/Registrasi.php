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
 * Description of Registrasi
 *
 * @author centos
 */
class Registrasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_emonev');
        $this->Authentication = $this->M_emonev->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Rekapitulasi Registrasi KANKEMENAG | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/monev/regmenag'),
            'regkua' => read_file('https://simas.kemenag.go.id/rudabi/datapi/monev/regkua')
        ];
        $data['content'] = $this->parser->parse('Regis_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Status() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param =Array ( [0] => 0 [1] => akun tidak aktif )
        $data = [
            'title' => 'Registrasi Kankemenag ' . $param[1] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/monev/regmenag?status=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Regis_Status', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Statuskua() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 [1] => akun butuh approval )
        $data = [
            'title' => 'Registrasi KUA ' . $param[1] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/monev/regkua?status=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Regis_Statuskua', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
