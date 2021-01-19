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
 * Description of Tipologi
 *
 * @author centos
 */
class Tipologi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Binsyar/M_Binsyar');
        $this->Authentication = $this->M_Binsyar->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Masjid Tipologi | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'eimas/tipologimasjid?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Users/u_urais/Tipologi_masjid', $data, true);
        return $this->parser->parse('Users/u_urais/Template', $data);
    }

    public function Mushalla() {
        $data = [
            'title' => 'Mushalla Tipologi | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'eimas/tipologimushalla?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Users/u_urais/Tipologi_mushalla', $data, true);
        return $this->parser->parse('Users/u_urais/Template', $data);
    }

}
