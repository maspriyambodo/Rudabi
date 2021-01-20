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
 * Description of M_security
 *
 * @author centos
 */
class M_security extends CI_Model {

    public function Auth() {
        $exec = $this->db->select('auth.id')
                ->from('auth')
                ->where(['auth.uname' => $this->session->userdata('username'), 'auth.hak_akses' => 1, 'auth.stat' => 1])
                ->limit(1)
                ->get()
                ->result();
        if (empty($exec)) {
            $this->session->sess_destroy();
            redirect(base_url('Auth/index/'), 'refresh');
        } else {
            return true;
        }
    }

    public function index() {
        $exec = $this->db->select('auth.id')
                ->from('auth')
                ->where([
                    '`auth`.`id`' => $this->session->userdata('id') + false,
                    'auth.uname' => $this->session->userdata('username'),
                    '`auth`.`hak_akses`' => 1 + false,
                    '`auth`.`stat`' => 1 + false
                ])
                ->limit(1)
                ->get()
                ->result();
        return $exec;
    }

    public function Old_pwd($data) {
        $exec = $this->db->select('auth.id')
                ->from('auth')
                ->where([
                    '`auth`.`id`' => $this->session->userdata('id') + false,
                    'auth.uname' => $this->session->userdata('username'),
                    'auth.pwd' => $data['old_pwd']
                ])
                ->get()
                ->result();
        return $exec;
    }

    public function Save($data) {
        $this->db->trans_begin();
        $this->db->set([
            'auth.pwd' => $data['new_pwd'],
            '`auth`.`sysupduser`' => $this->session->userdata('id') + false,
            'auth.sysupddate' => date("Y-m-d H:i:s")
        ]);
        $this->db->where('auth.id', $this->session->userdata('id'));
        $this->db->update('auth');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            redirect(base_url('Auth/Security/index/'), $this->session->set_flashdata('gagal', 'Gagal saat mengubah data, mohon ulangi kembali.'));
        } else {
            $this->db->trans_commit();
            $this->session->sess_destroy();
            redirect(base_url('Auth/index/'));
        }
    }

}
