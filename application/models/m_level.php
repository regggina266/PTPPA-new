 <?php
defined('BASEPATH') or exit('No direct script access allowed');
class m_level extends CI_Model
{
 // -- Update data produk -- //
    public function update($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('level', $data);
    }
 // -- Delete data produk -- //
    public function delete($idlevel)
    {
        $this->db->where('idlevel', $idlevel);
        return $this->db->delete('level');
    }
//tampilan pada table awal level
    public function level_()
    {
        $this->db->select('*');
        $this->db->from('level');
        return $this->db->get()->result();
    }

    public function data_idlevel($where)
    {
        $this->db->select('*');
        $this->db->from('level');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result(); // Execute the query and return results
    }
   
   
    public function updatelevel($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}