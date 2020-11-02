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
 * Description of Mushalla
 *
 * @author centos
 */
class Mushalla extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Binsyar');
        $this->Authentication = $this->M_Binsyar->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Data Mushalla | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/eimas/datamushalla?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Binsyar/Mushalla/Mushalla_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 as provinsi_id [1] => ACEH as provinsi_name )
        $data = [
            'title' => 'Data Mushalla Provinsi ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/eimas/datamushalla?KEY=boba&provinsi_id=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Binsyar/Mushalla/Mushalla_Provinsi', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 16 as provinsi_id [1] => JAWA TIMUR as provinsi_name [2] => 236 as kabupaten_id [3] => KAB. MALANG as kabupaten_name)
        $data = [
            'title' => 'Data Mushalla ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/eimas/datamushalla?KEY=boba&kabupaten_id=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Binsyar/Mushalla/Mushalla_Kabupaten', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Detail() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 16 as provinsi_id [1] => JAWA TIMUR as provinsi_name [2] => 236 as kabupaten_id [3] => KAB. MALANG as kabupaten_name [4] => 239 as kecamatan_id [5] => Rantau as kecamatan_name)
        $data = [
            'title' => 'Data Mushalla ' . $param[1] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => read_file('https://simas.kemenag.go.id/rudabi/datapi/eimas/datamushalla?KEY=boba&kecamatan_id=' . $param[4]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Binsyar/Mushalla/Mushalla_Detail', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
