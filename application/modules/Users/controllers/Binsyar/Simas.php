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
 * Description of Simas
 *
 * @author centos
 */
class Simas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Binsyar/M_Binsyar');
        $this->Authentication = $this->M_Binsyar->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Sistem Informasi Masjid | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'eimas/datamasjid?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Users/u_urais/Simas_index', $data, true);
        return $this->parser->parse('Users/u_urais/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 13 provinsi_id [1] => JAWA BARAT as provinsi_name)
        $data = [
            'title' => 'Data Masjid Provinsi ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'eimas/datamasjid?KEY=boba&provinsi_id=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Users/u_urais/Simas_Provinsi', $data, true);
        return $this->parser->parse('Users/u_urais/Template', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 13 as provinsi_id [1] => JAWA BARAT as provinsi_name [2] => 165 as kabupaten_id [3] => KAB. SUKABUMI as kabupaten_name)
        $data = [
            'title' => 'Data Masjid Provinsi ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'eimas/datamasjid?KEY=boba&kabupaten_id=' . $param[2]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Users/u_urais/Simas_Kabupaten', $data, true);
        return $this->parser->parse('Users/u_urais/Template', $data);
    }

    public function Kecamatan() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 13 as provinsi_id [1] => JAWA BARAT as provinsi_name [2] => 165 as kabupaten_id [3] => KAB. SUKABUMI as kabupaten_name [4] => 2075 as kecamatan_id [5] => Surade as kecamatan_name ) 
        $data = [
            'title' => 'Data Masjid Provinsi ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'eimas/datamasjid?KEY=boba&kecamatan_id=' . $param[4]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Users/u_urais/Simas_Kecamatan', $data, true);
        return $this->parser->parse('Users/u_urais/Template', $data);
    }

}
