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
 * Description of Security
 *
 * @author centos
 */
class Security extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_security');
        $this->M_security->Auth();
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
            'title' => 'Security | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'csrf' => $this->Csrf(),
            'data' => $this->M_security->index()
        ];
        $data['content'] = $this->parser->parse('V_security', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Save() {
        $data = [
            'old_pwd' => sha1($this->input->post('old_pwd', true)),
            'new_pwd' => sha1($this->input->post('new_pwd', true)),
        ];
        $exec = $this->M_security->Old_pwd($data);
        if (empty($exec)) {
            redirect(base_url('Auth/Security/index/'), $this->session->set_flashdata('gagal', 'Mohon masukkan kata sandi dengan benar!'));
        } else {
            return $this->M_security->Save($data);
        }
    }

}
