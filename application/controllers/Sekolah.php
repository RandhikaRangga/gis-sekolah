<?php

class Sekolah extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sekolah');
        
    }
    

    public function index()
    {
        $data = array(
            'title' => 'Data Sekolah di Kecamatan Cibinong',
            'sekolah' => $this->m_sekolah->tampil(),
            'isi'   => 'v_datasekolah'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function input()
    {
        $this->user_login->cek_login();
        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required',array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('jenjang', 'Jenjang Sekolah', 'required',array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required',array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('status_sekolah', 'Status Sekolah', 'required',array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('akreditasi', 'Akreditasi', 'required',array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('latitude', 'Latitude', 'required',array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('longitude', 'Longitude', 'required',array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('ket', 'Keterangan', 'required',array(
            'required' => '%s Harus Diisi !!!'
        ));
        
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Input Data Sekolah',
                'isi'   => 'v_input_datasekolah'
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        }else{
            $data = array(
                            'nama_sekolah'  => $this->input->post('nama_sekolah'),
                            'jenjang'       => $this->input->post('jenjang'),
                            'alamat'        => $this->input->post('alamat'),
                            'status_sekolah'=> $this->input->post('status_sekolah'),
                            'akreditasi'    => $this->input->post('akreditasi'),
                            'latitude'      => $this->input->post('latitude'),
                            'longitude'     => $this->input->post('longitude'),
                            'ket'           => $this->input->post('ket'),
                        );
            $this->m_sekolah->simpan($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
            redirect('sekolah/input');
        }
        
    }

    public function edit($id_sekolah)
    {
        $this->user_login->cek_login();
        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required',array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('jenjang', 'Jenjang Sekolah', 'required',array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required',array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('status_sekolah', 'Status Sekolah', 'required',array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('akreditasi', 'Akreditasi', 'required',array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('latitude', 'Latitude', 'required',array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('longitude', 'Longitude', 'required',array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('ket', 'Keterangan', 'required',array(
            'required' => '%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run()==FALSE) {
            $data = array(
                'title' => 'Edit Data Sekolah',
                'sekolah'=> $this->m_sekolah->detail($id_sekolah),
                'isi'   => 'v_edit_datasekolah'
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        }else{
            $data = array(
                            'id_sekolah'    => $id_sekolah,
                            'nama_sekolah'  => $this->input->post('nama_sekolah'),
                            'jenjang'       => $this->input->post('jenjang'),
                            'alamat'        => $this->input->post('alamat'),
                            'status_sekolah'=> $this->input->post('status_sekolah'),
                            'akreditasi'    => $this->input->post('akreditasi'),
                            'latitude'      => $this->input->post('latitude'),
                            'longitude'     => $this->input->post('longitude'),
                            'ket'           => $this->input->post('ket'),
                        );
            $this->m_sekolah->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit!');
            redirect('sekolah');
        }
    }

    public function hapus($id_sekolah)
    {
        $this->user_login->cek_login();
        $data = array('id_sekolah'=>$id_sekolah);
        $this->m_sekolah->hapus($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
        redirect('sekolah');
    }

}

/* End of file Controllername.php */
