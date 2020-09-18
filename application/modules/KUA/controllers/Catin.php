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
 * Description of Catin
 *
 * @author centos
 */
class Catin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Bimwin');
        $this->Authentication = $this->M_Bimwin->Auth();
    }

    private function Dec($enc) {
        $encrypt = str_replace(['-', '_', '~'], ['+', '/', '='], $enc);
        $dec = $this->encryption->decrypt($encrypt);
        return $dec;
    }

    public function index($year) {
        if ($year == date("Y")) {
            $enc = str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt($year));
            $dec = $this->Dec($enc);
        } else {
            $dec = $this->Dec($year);
        }
        $data = [
            'title' => 'Target Catin | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'datedex' => $dec,
            'data' => json_decode(file_get_contents("https://simas.kemenag.go.id/rudabi/datapi/embimwin/datacatin")),
            'catin' => json_decode(file_get_contents("https://simas.kemenag.go.id/rudabi/datapi/embimwin/datacatin?tahun_target_pusat=" . $dec . ""))
        ];
        $data['content'] = $this->parser->parse('KUA/Catin/V_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Data($year) {
        $dec = $this->Dec($year);
        if (strlen($year) <= 99) {
            log_message('error', '===================================================================================');
            log_message('error', 'Seseorang mencoba mengambil data ! ' . 'IP ADDRESS ' . $this->input->ip_address());
            log_message('error', '===================================================================================');
            $data = '[{"tahun_target_pusat":0,"target_pusat":0,"jumlah_catin":0,"hadir_suami":0,"nonhadir_istri":0,"hadir_suami_bimwin":0,"hadir_istri_bimwin":0}]';
        } else {
            $data = file_get_contents("https://simas.kemenag.go.id/rudabi/datapi/embimwin/targetcatin2020?id_prop=" . $dec . "");
        }
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output($data)
                ->_display();
        exit;
    }

}
