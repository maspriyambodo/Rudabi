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
 * Description of Dashboard
 *
 * @author centos
 */
class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Binsyar/M_Binsyar');
        $this->Authentication = $this->M_Binsyar->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Dashboard Urusan Agama Islam & Binsyar | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username')
        ];
        $data['content'] = $this->parser->parse('Users/u_urais/V_Dashboard', $data, true);
        return $this->parser->parse('Users/u_urais/Template', $data);
    }

    public function Sihat() {
//        $data = [
//            'sihat' => $this->bodo->Curel('https://simas.kemenag.go.id/rudabi/datapi/siihat/alat2020?KEY=BOBA', true),
//            'tenaga',
//            'pengukuran',
//            'lokasi',
//            'laporan',
//            'lintang'
//        ];
        $ch = curl_init();

        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://simas.kemenag.go.id/rudabi/datapi/siihat/alat2020?KEY=BOBA");

        // return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string 
        $output = curl_exec($ch);

        // tutup curl 
        curl_close($ch);

        // menampilkan hasil curl
        echo json_encode(json_decode($output, true));
    }

}
