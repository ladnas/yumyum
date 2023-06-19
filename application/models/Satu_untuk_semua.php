<?php 
defined('BASEPATH') OR exit('NO direct script access allowed');
class Satu_untuk_semua extends CI_Model {
    
    public function get_data($table) 
    {
        return $this->db->get($table);
    }
    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_data_update($where,$table)
    {
        return $this->db->get_where($table,$where);
    }
    
    // Section 1 / Header //
    public function update_data_st1($data,$table,$id_st)
    {
        $this->db->where('id_st', $id_st);
        $this->db->update($table, $data);
    }
    public function delete_data_st1($id_st)
    {
        return $this->db->delete('section1', ['id_st' => $id_st]);
    }

    public function cek_data_st1($id_st)
    {
       $query = $this->db->get_where('section1', ['id_st' => $id_st]);
       return $query->row();
    }
    /////////////////////////////////////////////////////////////// //

    // Section 2 judul dan img //
    public function update_data_st2($data,$table,$id_st2)
    {
        $this->db->where('id_st2', $id_st2);
        $this->db->update($table, $data);
    }
    public function delete_st2($id_st2)
    {
        return $this->db->delete('section2', ['id_st2' => $id_st2]);
    }

    public function cek_data_st2($id_st2)
    {
       $query = $this->db->get_where('section2', ['id_st2' => $id_st2]);
       return $query->row();
    }

    // Section 2 sub teks //
    public function update_data_subteks($data,$table)
    {
        $this->db->where('id_sub', $data['id_sub']);
        $this->db->update($table, $data);
    }

     // Section 2 sub teks //
     public function update_data_subteks2($data,$table)
     {
         $this->db->where('id_sub2', $data['id_sub2']);
         $this->db->update($table, $data);
     }
    // ///////////////////////////////////////////////////////// //

    // Section 3 judul //
    public function update_data_st3($data,$table)
    {
        $this->db->where('id_st3', $data['id_st3']);
        $this->db->update($table, $data);
    }

    // Section 3 item jual //
    public function update_data_item($data,$table,$id_item)
    {
        $this->db->where('id_item', $id_item);
        $this->db->update($table, $data);
    }
    public function delete_item($id_item)
    {
        return $this->db->delete('section3_items', ['id_item' => $id_item]);
    }

    public function cek_data_item($id_item)
    {
       $query = $this->db->get_where('section3_items', ['id_item' => $id_item]);
       return $query->row();
    }

    // //////////////////////////////////////////////////////// //

    // Section 4 judul //
    public function update_data_st4($data,$table)
    {
        $this->db->where('id_st4', $data['id_st4']);
        $this->db->update($table, $data);
    }

    // Section 4 item card // 
    public function update_data_card($data,$table)
    {
        $this->db->where('id_card', $data['id_card']);
        $this->db->update($table, $data);
    }

    // //////////////////////////////////////////////////////// //

    // Section 5 judul //
    public function update_data_st5($data,$table)
    {
        $this->db->where('id_st5', $data['id_st5']);
        $this->db->update($table, $data);
    }

    // Section 5 testimoni // 
    public function update_data_testi($data,$table,$id_testi)
    {
        $this->db->where('id_testi', $id_testi);
        $this->db->update($table, $data);
    }
    public function delete_data_testi($id_testi)
    {
        return $this->db->delete('section5_testimoni', ['id_testi' => $id_testi]);
    }

    public function cek_data_testi($id_testi)
    {
       $query = $this->db->get_where('section5_testimoni', ['id_testi' => $id_testi]);
       return $query->row();
    }

    // //////////////////////////////////////////////////////// //

    // Section 6 / footer?? //
    public function update_data_st6($data,$table,$id_st6)
    {
        $this->db->where('id_st6', $id_st6);
        $this->db->update($table, $data);
    }
    public function delete_data_st6($id_st6)
    {
        return $this->db->delete('section6', ['id_st6' => $id_st6]);
    }

    public function cek_data_st6($id_st6)
    {
       $query = $this->db->get_where('section6', ['id_st6' => $id_st6]);
       return $query->row();
    }
   // //////////////////////////////////////////////////////// // 

    // Pop up wa //
    public function update_data_wa($data,$table,$id_wa)
    {
        $this->db->where('id_wa', $id_wa);
        $this->db->update($table, $data);
    }
    public function delete_wa($id_wa)
    {
        return $this->db->delete('wa', ['id_wa' => $id_wa]);
    }

    public function cek_data_wa($id_wa)
    {
       $query = $this->db->get_where('wa', ['id_wa' => $id_wa]);
       return $query->row();
    }

    // //////////////////////////////////////////////////////// // 
}