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
 * Description of Nikah_Rujuk
 *
 * @author centos
 */
class Nikah_Rujuk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_simpenghulu');
        $this->Authentication = $this->M_simpenghulu->Auth();
    }

    public function index() {
        $param = $this->bodo->Url($this->input->post_get('key'));
        $a[0] = (object) ['rekap_tahun' => 'Semua Tahun'];
        $b = json_decode(read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenghulu/kategoritahun?KEY=boba'));
        if (!isset($param)) {
            $url = read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenghulu/nikahrujuk?KEY=boba');
        } elseif ($param[0] == "Semua Tahun") {
            $url = read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenghulu/nikahrujuk?KEY=boba');
        } else {
            $url = read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenghulu/nikahrujuk?KEY=boba&rekap_tahun=' . $param[0]);
        }
        $data = [
            'title' => 'Sistem Informasi Kepenghuluan | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'param' => $param,
            'data' => $url,
            'rekap_tahun' => array_merge($a, $b)
        ];
        $data['content'] = $this->parser->parse('Rujuk_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2020 as rekap_tahun [1] => 1 as rekap_province [2] => ACEH province_title)
        $data = [
            'title' => 'Sistem Informasi Kepenghuluan | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenghulu/nikahrujuk?KEY=boba&rekap_province=' . $param[1] . '&rekap_tahun=' . $param[0])
        ];
        if ($data['data'] == null) {
            $data['content'] = $this->parser->parse('Rujuk_undifined', $data, true);
        } else {
            $data['content'] = $this->parser->parse('Rujuk_Provinsi', $data, true);
        }
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2020 as rekap_tahun [1] => 1 as rekap_province [2] => Aceh as province_title [3] => 13 as city_id [4] => Kab. Aceh Gayo Lues as city_title ) 
        $data = [
            'title' => 'Rekap Data Nikah & Rujuk ' . $param[4] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'param' => $param,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/simpenghulu/nikahrujuk?KEY=boba&city_id=' . $param[3] . '&rekap_tahun=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Rujuk_Kabupaten', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
