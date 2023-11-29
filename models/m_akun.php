<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_akun extends CI_Model
{

    public function delete($idakun)
    {
        $this->db->where('idakun', $idakun);
        return $this->db->delete('akun');  // Removed unnecessary parameters
    }


    public function insert_akun($data)
    {
        // Assuming $data contains the necessary fields for the 'akun' table
        $this->db->insert('akun', $data);  // Corrected usage of insert
        return $this->db->insert_id();
    }
    

    public function akun()
    {
        $this->db->select('akun.*, departemen.devisi, level.level_k ');    
        $this->db->from('akun');
        $this->db->join('level', 'akun.idlevel = level.idlevel');
        $this->db->join('departemen', 'akun.iddepartemen = departemen.iddepartemen');
        return $this->db->get()->result_array();
    }
    


    public function get_levels() {
        $this->db->select('idlevel, level_k');
        $query = $this->db->get('level');

        if ($query->num_rows() > 0) {
            return $query->result_array(); // Return level data
        } else {
            return array(); // Return empty array if no level data found
        }
    }



    
    public function get_departemen() {
        $this->db->select('iddepartemen, devisi');
        $query = $this->db->get('departemen');

        if ($query->num_rows() > 0) {
            return $query->result_array(); // Return department data
        } else {
            return array(); // Return empty array if no department data found
        }
    }


    public function get_akun_by_id($where) {
        $this->db->where($where);
        $query = $this->db->get('akun'); 

        if ($query->num_rows() > 0) {
            return $query->row_array(); 
        } else {
            return null; 
        }
    }



   
    public function update_akun($where, $data) {
        $this->db->where($where);
        $this->db->update('akun', $data);

        return $this->db->affected_rows() > 0; 
    }


}