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
 * Description of Auth
 *
 * @author centos
 */
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Auth');
    }

    private function Csrf() {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        return $csrf;
    }

    private function Role_users() {
        switch ($this->session->userdata('lvl')) {
            case 1://super admin
                return redirect(base_url('Dashboard/index'), 'refresh');
            case 2://Sub Direktorat Sekertariat
                return redirect(base_url('Sekertariat/index/'), 'refresh');
            case 3://DIREKTORAT URUSAN AGAMA ISLAM DAN PEMBINAAN SYARIAH
                return redirect(base_url('Binsyar/index/'), 'refresh');
            case 4://DIREKTORAT BINA KUA DAN KELUARGA SAKINAH
                return redirect(base_url('KUA/index/'), 'refresh');
            case 5://DIREKTORAT PENERANGAN AGAMA ISLAM
                return redirect(base_url('PAI/index/'), 'refresh');
            case 6://DIREKTORAT PEMBERDAYAAN ZAKAT DAN WAKAF
                return redirect(base_url('Siwak/index/'), 'refresh');
            default ://Login
                $this->session->sess_destroy();
                return $this->parser->parse('V_Auth', ['csrf' => $this->Csrf()]);
        }
    }

    private function Dec($enc) {
        $encrypt = str_replace(['-', '_', '~'], ['+', '/', '='], $enc);
        $dec = $this->encryption->decrypt($encrypt);
        return $dec;
    }

    public function index() {
        return $this->Role_users();
    }

    function Get($id) {
        $dec = $this->Dec($id);
        $exec = $this->M_Auth->Get($dec);
        if ($exec[0]->id > 0) {
            $header = 200;
        } else {
            $header = 201;
        }
        $this->output
                ->set_status_header($header)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($exec, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Management() {
        $data = [
            'title' => 'User Management | RUDABI SYSTEM OF KEMENAG RI',
            'user' => $this->M_Auth->Management(),
            'subdit' => $this->M_Auth->Subdit(),
            'csrf' => $this->Csrf()
        ];
        $data['content'] = $this->parser->parse('V_management', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Management_save() {
        $subdit = $this->Dec($this->input->post('subdit', true));
        $data = [
            'auth.uname' => $this->input->post('uname', true),
            'auth.pwd' => sha1('a'),
            'auth.hak_akses' => $subdit,
            'auth.stat' => 1,
            'auth.syscreateuser' => $this->session->userdata('id'),
            'auth.syscreatedate' => date('Y-m-d H:i:s')
        ];
        $exec = $this->M_Auth->Management_save($data);
        if ($exec == true) {
            return redirect(base_url('Auth/Management/'), $this->session->set_flashdata('message', 'User berhasil disimpan !'));
        } else {
            return redirect(base_url('Auth/Management/'), $this->session->set_flashdata('error', 'User gagal disimpan !'));
        }
    }

    public function Management_Update() {
        $id = $this->Dec($this->input->post('e_id', true));
        $data = [
            'auth.uname' => $this->input->post('e_uname', true),
            'auth.hak_akses' => $this->input->post('e_subdit', true),
            'auth.sysupduser' => $this->session->userdata('id', true),
            'auth.sysupddate' => date('Y-m-d H:i:s')
        ];
        $exec = $this->M_Auth->Management_Update($id, $data);
        if ($exec == true) {
            return redirect(base_url('Auth/Management/'), $this->session->set_flashdata('message', 'User berhasil diperbarui !'));
        } else {
            return redirect(base_url('Auth/Management/'), $this->session->set_flashdata('error', 'User gagal diperbarui !'));
        }
    }

    public function Management_Delete() {
        $id = $this->Dec($this->input->post('h_id', true));
        $data = [
            'auth.stat' => 2,
            'auth.sysdeleteuser' => $this->session->userdata('id'),
            'auth.sysdeletedate' => date('Y-m-d H:i:s')
        ];
        $exec = $this->M_Auth->Management_Update($id, $data);
        if ($exec == true) {
            return redirect(base_url('Auth/Management/'), $this->session->set_flashdata('message', 'Data User berhasil dihapus !'));
        } else {
            return redirect(base_url('Auth/Management/'), $this->session->set_flashdata('error', 'Data User gagal dihapus !'));
        }
    }

    public function Get_subdit($id) {
        $dec = $this->Dec($id);
        $exec = $this->M_Auth->Get_subdit($dec);
        if ($exec[0]->id > 0) {
            $header = 200;
        } else {
            $header = 201;
        }
        $this->output
                ->set_status_header($header)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($exec, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Subdit() {
        $data = [
            'title' => 'Data Sub Direktorat | RUDABI SYSTEM OF KEMENAG RI',
            'subdit' => $this->M_Auth->Subdit(),
            'csrf' => $this->Csrf()
        ];
        $data['content'] = $this->parser->parse('V_subdit', $data, true);
        return $this->parser->parse('Dashboard/Template', $data);
    }

    public function Subdit_save() {
        $data = [
            'subdit.nama' => $this->input->post('nama', true),
            'subdit.keterangan' => $this->input->post('keterangan', true),
            'subdit.stat' => 1,
            'subdit.syscreateuser' => $this->session->userdata('id'),
            'subdit.syscreatedate' => date('Y-m-d H:i:s')
        ];
        $exec = $this->M_Auth->Subdit_save($data);
        if ($exec == true) {
            return redirect(base_url('Auth/Subdit/'), $this->session->set_flashdata('message', 'Sub Direktorat berhasil disimpan !'));
        } else {
            return redirect(base_url('Auth/Subdit'), $this->session->set_flashdata('error', 'Sub Direktorat gagal disimpan !'));
        }
    }

    public function Subdit_update() {
        $id = $this->Dec($this->input->post('e_id', true));
        $data = [
            'subdit.nama' => $this->input->post('e_nama', true),
            'subdit.keterangan' => $this->input->post('e_keterangan', true),
            'subdit.sysupdateuser' => $this->session->userdata('id', true),
            'subdit.sysupdatedate' => date('Y-m-d H:i:s')
        ];
        $exec = $this->M_Auth->Subdit_update($id, $data);
        if ($exec == true) {
            return redirect(base_url('Auth/Subdit/'), $this->session->set_flashdata('message', 'Sub Direktorat berhasil diperbarui !'));
        } else {
            return redirect(base_url('Auth/Subdit/'), $this->session->set_flashdata('error', 'Sub Direktorat gagal diperbarui !'));
        }
    }

    public function Subdit_Delete() {
        $id = $this->Dec($this->input->post('h_id', true));
        $data = [
            'subdit.stat' => 2,
            'subdit.sysdeleteuser' => $this->session->userdata('id'),
            'subdit.sysdeletedate' => date('Y-m-d H:i:s')
        ];
        $exec = $this->M_Auth->Subdit_update($id, $data);
        if ($exec == true) {
            return redirect(base_url('Auth/Subdit/'), $this->session->set_flashdata('message', 'Sub Direktorat berhasil dihapus !'));
        } else {
            return redirect(base_url('Auth/Subdit/'), $this->session->set_flashdata('error', 'Sub Direktorat gagal dihapus !'));
        }
    }

    public function Reset() {
        $id = $this->Dec($this->input->post('r_id', true));
        $data = [
            'auth.pwd' => sha1('a'),
            'auth.sysupduser' => $this->session->userdata('id'),
            'auth.sysupddate' => date('Y-m-d H:i:s')
        ];
        $exec = $this->M_Auth->Management_Update($id, $data);
        if ($exec == true) {
            return redirect(base_url('Auth/Management/'), $this->session->set_flashdata('message', 'Password berhasil direset !'));
        } else {
            return redirect(base_url('Auth/Management/'), $this->session->set_flashdata('error', 'Password gagal direset !'));
        }
    }

    public function Login() {
        $data = [
            'auth.uname' => $this->input->post('username', true),
            'auth.pwd' => sha1($this->input->post('password', true))
        ];
        $result = $this->M_Auth->Process($data);
        if ($result == false) {
            return redirect(base_url('Auth/index'), $this->session->set_flashdata('message', '<small id="errmsg" style="color:#ed4956;"> Maaf, username dan password Anda salah. Harap periksa kembali username dan password Anda. </small>'));
        } else {
            $session = [
                'login_stat' => 1,
                'id' => $result[0]->id,
                'username' => $result[0]->uname,
                'lvl' => $result[0]->hak_akses
            ];
            $this->session->set_userdata($session);
            return $this->Role_users();
        }
    }

    public function Logout() {
        $this->session->sess_destroy();
        return redirect(base_url('Auth/index/'), 'refresh');
    }

}
