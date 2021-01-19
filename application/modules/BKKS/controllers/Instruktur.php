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
 * Description of Instruktur
 *
 * @author centos
 */
class Instruktur extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Bimwin');
        $this->Authentication = $this->M_Bimwin->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Data Instruktur | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'embimwin/instruktur?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Instruktur/index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

}
