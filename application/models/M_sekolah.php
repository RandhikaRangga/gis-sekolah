<?php

class M_sekolah extends CI_Model {

    public function simpan($data)
    {
        $this->db->insert('tbl_sekolah', $data);
        
    }

    public function tampil(){
        $this->db->select('*');
        $this->db->from('tbl_sekolah');
        $this->db->order_by('id_sekolah', 'desc');
        return $this->db->get()->result();
    }

    public function detail($id_sekolah)
    {
        $this->db->select('*');
        $this->db->from('tbl_sekolah');
        $this->db->where('id_sekolah', $id_sekolah);
        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id_sekolah', $data['id_sekolah']);
        $this->db->update('tbl_sekolah', $data);
    }

    public function hapus($data)
    {
        $this->db->where('id_sekolah', $data['id_sekolah']);
        $this->db->delete('tbl_sekolah', $data);
    }

}

/* End of file ModelName.php */
