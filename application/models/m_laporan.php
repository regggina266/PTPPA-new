 <?php
defined('BASEPATH') or exit('No direct script access allowed');
class m_laporan extends CI_Model
{
  // -- Update data produk -- //
    public function update($idbarang, $data)
    {
        $this->db->where($idbarang);
        return $this->db->update('tb_barang', $data);
    }
 // -- Delete data produk -- //
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('permohonan');
    }

    public function get_akun() {
        $this->db->select('idakun, nama');
        $query = $this->db->get('akun');

        if ($query->num_rows() > 0) {
            return $query->result_array(); // Return department data
        } else {
            return array(); // Return empty array if no department data found
        }
    }
}