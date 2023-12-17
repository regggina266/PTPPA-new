<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {


    function check_user($NRP, $password) {
        $this->db->select('*');
        $this->db->from('akun');
        $this->db->where('NRP', $NRP);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return $user; // Return the user data
            }
        }
        return false; // Return false if user not found or password doesn't match
    }
    
    public function update_user_password($id, $new_password) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    
        $data = array(
            'password' => $hashed_password
        );
    
        $this->db->where('idakun', $id);
        $this->db->update('akun', $data);
    }
    
}
