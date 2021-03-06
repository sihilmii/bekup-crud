<?php

class M_pegawai extends CI_Model {

    public function tampil_pegawai()
    {
        $query = "SELECT pegawai.id_pegawai,pegawai.nama, pegawai.no_telp, pegawai.status, kota.nama_kota, kelamin.nama_kelamin, posisi.nama_posisi FROM pegawai JOIN kota ON pegawai.kota = kota.id_kota JOIN kelamin ON pegawai.kelamin = kelamin.id_kelamin JOIN posisi ON pegawai.id_posisi = posisi.id_posisi";
        $hasil = $this->db->query($query);
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }

    public function insert_pegawai($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_pegawai($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_pegawai($where, $table)
    {
        return $this->db->get_where($table, $where);
    }


    public function update_pegawai($where, $pegawai, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $pegawai);
    }

}
