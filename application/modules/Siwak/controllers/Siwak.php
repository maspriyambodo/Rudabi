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
 * Description of Siwak
 *
 * @author centos
 */
class Siwak extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Siwak');
        $this->Authentication = $this->M_Siwak->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Sistem Informasi Wakaf | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siwaks/tanahwakaf?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Siwak/Siwak_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 11 as Lokasi_Prop [1] => ACEH as lokasi_nama)
        $data = [
            'title' => 'Data Wakaf Provinsi ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siwaks/tanahwakaf?KEY=boba&Lokasi_Prop=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Siwak/Siwak_Provinsi', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 11 as Lokasi_Prop [1] => ACEH as lokasi_nama [2] => 11.06 as lokasi_kode [3] => KABUPATEN ACEH BARAT as lokasi_nama)
        $data = [
            'title' => 'Data Wakaf Provinsi ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siwaks/tanahwakaf?KEY=boba&lokasi_kode=' . $param[2]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Siwak/Siwak_Kabupaten', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Kecamatan() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 11 [1] => ACEH as lokasi_nama [2] => 11.05 as lokasi_kode [3] => KABUPATEN ACEH TENGAH as lokasi_nama [4] => 68679 as lokasi_ID [5] => KOTA TAKENGON as lokasi_nama)
        $data = [
            'title' => 'Data Wakaf Provinsi ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siwaks/tanahwakaf?KEY=boba&lokasi_ID=' . $param[4]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Siwak/Siwak_Kecamatan', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
