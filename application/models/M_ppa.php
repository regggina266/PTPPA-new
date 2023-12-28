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
        $this->db->select('permohonan.*, akun.nama, akun.dept' );
        $this->db->from('permohonan');
        $this->db->join('akun', 'akun.NRP = permohonan.nrp');
        return $this->db->get()->result(); // Execute the query and return results
    }
    public function get_last_permohonan(){
        $this->db->select('id');
        $this->db->from('permohonan');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        return $this->db->get()->row();   
    }
    public function insert_list_item($data){
        $query = $this->db->insert_batch('list_item', $data);
        return $query;
    }
    public function insert_new_permohonan($data){
        $this->db->insert('permohonan', $data);
        return $this->db->insert_id();
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

    //model Approval

    public function approval()
    {
        $this->db->select('laporan.*, tb_barang.NRP , tb_barang.agenda');
        $this->db->from('laporan');
        $this->db->join('tb_barang', 'laporan.idbarang = tb_barang.idbarang');
    
        return $this->db->get()->result(); // Execute the query and return results
    }

    public function data_idbar($where)
    {
        $this->db->select('tb_barang.*, akun.nama');
        $this->db->from('tb_barang');
        $this->db->join('akun', 'akun.idakun = tb_barang.idakun');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result(); // Execute the query and return results
    }
    
    // public function get_data_by_id($table, $id) {
    //     $this->db->where('id', $id);
    //     return $this->db->get($table);
    // }
    



    public function updatebarang($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    
    public function insert_barang($data)
    {
        $this->db->insert('tb_barang', $data);
        return $this->db->insert_id();
    }

    public function departemen()
        {
            $this->db->select('*');
            $this->db->from('departemen');

            return $this->db->get();
        }
    
    public function get_data_by_id($table, $id) 
    {
        if($table == 'permohonan'){
            $this->db->select('*');
            $this->db->from('permohonan');
            $this->db->join('akun', 'akun.NRP = permohonan.nrp');
            $this->db->where('permohonan.id', $id);
        } else if($table == 'list_item'){
            $this->db->select('*');
            $this->db->from('list_item');
            $this->db->where('id_permohonan', $id);
        }
        // $this->db->query('SELECT la.*, ak.* FROM permohonan la left join akun ak on la.nrp = ak.NRP where la.id = 1');
        return $this->db->get();
    }
    public function get_data_akun($table, $id) {
        $this->db->where('idakun', $id);
        return $this->db->get($table);
    }
}