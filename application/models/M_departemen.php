<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_departemen extends CI_Model
{

    public function delete($iddepartemen)
    {
        $this->db->where('iddepartemen', $iddepartemen);
        return $this->db->delete('departemen');  // Removed unnecessary parameters
    }


    public function data_iddep($where)
    {
        $this->db->select('*');
        $this->db->from('departemen');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result(); // Execute the query and return results
    }
   
   
    public function updatedep($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    
    public function insert_dep($data)
    {
        // Assuming $data contains the necessary fields for the 'akun' table
        $this->db->insert('departemen', $data);  // Corrected usage of insert
        return $this->db->insert_id();
    }
}