<?php
    class AbsensiController extends CI_Controller {
        public function __construct(){
            parent::__construct();
        }

        public function vAbsensi(){
            $data['title'] = 'Absensi | eAkademik';
            $this->template->view('absensi/vAbsensi', $data);
        }
    }
?>