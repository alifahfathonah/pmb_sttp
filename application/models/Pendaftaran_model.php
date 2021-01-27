<?php

class Pendaftaran_model extends CI_Model
{

  public function get_data($ta)
  {
   $this->db->select('*');
   $this->db->from('pendaftaran');
   $this->db->where('pendaftaran.ta',$ta);
   $query=$this->db->get();
   return $query;
 }

}
?>