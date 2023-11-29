<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_ppa extends CI_Model
{

       public function get_data($table)
    {
        return $this->db->get($table);
    }

 //Laporan Models
 public function laporan()
 {
     $this->db->select('laporan.*, akun.nama');
     $this->db->from('laporan');
     $this->db->join('akun', 'akun.idakun = laporan.idakun');
 
     return $this->db->get()->result(); // Execute the query and return results
 }
 
 public function get_laporan()
 {
     $this->db->select('laporan.*, akun.nama');
     $this->db->from('laporan');
     $this->db->join('akun', 'akun.idakun = laporan.idakun');
 
     return $this->db->get()->result_array(); // Execute the query and return results as an array
 }
 
 public function data_idlap($where)
 {
     $this->db->select('laporan.*, akun.nama');
     $this->db->from('laporan');
     $this->db->join('akun', 'akun.idakun = laporan.idakun');
     $this->db->where($where);
     $query = $this->db->get();
     return $query->result(); // Execute the query and return results
 }
 
 public function insert_laporan($data)
 {
     $this->db->insert('laporan', $data);
     return $this->db->insert_id();
 }
 
 public function updatelaporan($where, $data, $table)
 {
     $this->db->where($where);
     $this->db->update($table, $data);
 }
 
//Level Model


    public function level()
    {
        $this->db->select('*');
        $this->db->from('level');
         return $this->db->get();
    }


      public function data_id($where)
    {
        $this->db->select('*');
        $this->db->from('level');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

     
    public function insert_level($data)
    {
        $this->db->insert('level', $data);
        return $this->db->insert_id();
    }


    public function updatelevel($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }


//Akun Models

    public function akun()
    {
        $this->db->select('*');
        $this->db->from('akun');

        return $this->db->get();
    }
    

    public function data_idak($where)
    {
        $this->db->select('*');
        $this->db->from('akun');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }


    public function update($where, $dataakun, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $dataakun);
    }


    public function insert_akun($data)
    {
        // Assuming $data contains the necessary fields for the 'akun' table
        $this->db->insert('akun', $data);  // Corrected usage of insert
        return $this->db->insert_id();
    }
}