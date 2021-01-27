<?php

class Tahun_model extends CI_Model
{

  public function get_data()
  {
   $this->db->select('*');
   $this->db->from('tahun');
   $query=$this->db->get();
   return $query;
 }

}
?>