 <?php
defined('BASEPATH') or exit('No direct script access allowed');
class m_laporan extends CI_Model
{
  // -- Update data produk -- //
    public function update($idlaporan, $data)
    {
        $this->db->where($idlaporan);
        return $this->db->update('laporan', $data);
    }
 // -- Delete data produk -- //
    public function delete($idlaporan)
    {
        $this->db->where('idlaporan', $idlaporan);
        return $this->db->delete('laporan');
    }
}