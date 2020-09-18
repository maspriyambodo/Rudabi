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
 * Description of M_Auth
 *
 * @author centos
 */
class M_Auth extends CI_Model {

    function Process($data) {
        $exec = $this->db->select('auth.id, auth.uname, auth.hak_akses')
                ->from('auth')
                ->where($data)
                ->limit(1)
                ->get();
        if ($exec->num_rows() == 1) {
            return $exec->result();
        } else {
            return false;
        }
    }

    function Get($id) {
        $exec = $this->db->select('auth.id, auth.uname, auth.hak_akses,subdit.nama,subdit.keterangan')
                ->from('auth')
                ->join('subdit', 'auth.hak_akses = subdit.id', 'LEFT')
                ->where(['auth.id' => $id, 'auth.stat' => 1])
                ->limit(1)
                ->get()
                ->result();
        return $exec;
    }

    function Get_subdit($id) {
        $exec = $this->db->select('subdit.id, subdit.nama, subdit.keterangan')
                ->from('subdit')
                ->where(['subdit.id' => $id, 'subdit.stat' => 1])
                ->limit(1)
                ->get()
                ->result();
        return $exec;
    }

    function Subdit() {
        $exec = $this->db->select('subdit.id, subdit.nama, subdit.keterangan')
                ->from('subdit')
                ->where([
                    '`subdit`.`stat`' => 1 + false,
                    '`subdit`.`id` <>' => 1 + false
                ])
                ->get()
                ->result();
        return $exec;
    }

    function Subdit_save($data) {
        $this->db->trans_begin();
        $this->db->insert('subdit', $data);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    function Management() {
        $exec = $this->db->select('auth.id,auth.uname,subdit.nama')
                ->from('auth')
                ->join('subdit', 'auth.hak_akses = subdit.id', 'LEFT')
                ->where([
                    '`auth`.`stat`' => 1 + false,
                    '`auth`.`hak_akses` <>' => 1 + false
                ])
                ->get()
                ->result();
        return $exec;
    }

    function Management_save($data) {
        $this->db->trans_begin();
        $this->db->insert('auth', $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    function Management_Update($id, $data) {
        $this->db->trans_begin();
        $this->db->set($data)
                ->where('auth.id', $id)
                ->update('auth');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    function Subdit_update($id, $data) {
        $this->db->trans_begin();
        $this->db->set($data)
                ->where('subdit.id', $id)
                ->update('subdit');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    function SU() {
        $exec = $this->db->select('auth.id')
                ->from('auth')
                ->where('`auth`.`id`', $this->session->userdata('id'), false)
                ->get()
                ->result();
        return $exec;
    }

}
