<?php

class Jurusan_model extends CI_Model
{

  public function get_data()
  {
   $this->db->select('*');
   $this->db->from('jurusan');
   $query=$this->db->get();
   return $query;
 }

}
?>