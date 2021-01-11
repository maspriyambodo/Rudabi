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
 * Description of M_Manage
 *
 * @author centos
 */
class M_Manage extends CI_Model {

    public function Auth() {
        $exec = $this->db->select('auth.id,auth.uname, auth.hak_akses, auth.stat')
                ->from('auth')
                ->where(['auth.uname' => $this->session->userdata('username'), 'auth.hak_akses !=' => 1, 'auth.stat' => 1])
                ->get()
                ->result();
        if (sizeof($exec) >= 1) {
            return $exec;
        } else {
            return redirect(base_url('Auth/index/'), 'refresh');
        }
    }

    public function Save($data) {
        $this->db->trans_begin();
        $this->db->set([
            'auth.uname' => $data['uname'],
            'auth.pwd' => $data['pwd'],
            '`auth`.`sysupduser`' => $this->session->userdata('id') + false,
            'auth.sysupddate' => date('Y-m-d H:i:s')
        ]);
        $this->db->where('auth.id', $data['id'], false);
        $this->db->update('auth');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

}
