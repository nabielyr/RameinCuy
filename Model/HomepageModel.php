<?php

class HomepageModel {
    public function getEvent($id) {
        $db = getDatabaseConnection();
        $query = "SELECT id, poster, nama_event, tanggal_event, waktu_event, lokasi_event, deskripsi_event, 
                     nama_tiket, jumlah_tiket, harga_tiket, deskripsi_tiket, 
                     tanggal_mulai_jual, waktu_mulai_jual, tanggal_berakhir_jual, waktu_berakhir_jual 
              FROM events WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
        return $event ?: false;
    }

    public function getEvents() {
        $db = getDatabaseConnection();
        $query = "SELECT id, poster, nama_event, tanggal_event, waktu_event, lokasi_event FROM events ORDER BY id DESC";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}