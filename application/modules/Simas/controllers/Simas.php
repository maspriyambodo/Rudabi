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
        $this->load->model('M_Simas');
        $this->Authentication = $this->M_Simas->Auth();
    }

    private function Csrf() {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        return $csrf;
    }

    public function index() {
        $data = [
            'title' => 'Data Rumah Ibadah | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname
        ];
        $data['content'] = $this->parser->parse('V_index', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Mushalla() {
        $data = [
            'title' => 'Data Mushalla | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname
        ];
        $data['content'] = $this->parser->parse('V_Mushalla', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Kampret() {
        $data = [
            'title' => 'Data Mushalla | RUDABI SYSTEM OF KEMENAG RI',
            'csrf' => $this->Csrf()
        ];
        $data['content'] = $this->parser->parse('V_Kampret', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    function Save() {
        $config['upload_path'] = './assets/images/kodok';
        $config['file_name'] = date("Y-m-d H_i_s");
        $config['allowed_types'] = 'gif|jpg|png';
        $config['maintain_ratio'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('kodok') == TRUE) {
            echo 'berhasil';
            return $this->upload->data();
        } else {
            $this->output->set_header("HTTP/1.0 400 Bad Request");
            echo "Upload gambar gagal !";
        }
    }

}
