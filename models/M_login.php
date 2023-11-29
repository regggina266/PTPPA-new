<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
    function check_user($nama, $password) {
        $this->db->select('*');
        $this->db->from('akun');
        $this->db->where('nama',$nama);
        $this->db->where('password',($password));
        $query = $this->db->get();
        return $query;
    }
     public function update_user($id, $NRP, $password)
    {
       $this->db->trans_start();

       $this->db->query("UPDATE akun SET NRP ='$NRP', password='$password' WHERE idakun='$id'");
      
       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }
}
