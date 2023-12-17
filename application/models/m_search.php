<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_search extends CI_Model
{
    public function search($keyword)
    {
        if(!$keyword){
            return null;
        }
        $this->db->like('title', $keyword);
        $this->db->or_like('content', $keyword);
        $query = $this->db->get($this->_table);
        return $query->result();
    }
}