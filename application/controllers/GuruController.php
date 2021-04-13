<?php
    class GuruController extends CI_Controller {
        public function __construct(){
            parent::__construct();
        }

        public function vGuru(){
            $data['title'] = 'Guru | eAkademik';
            $this->template->view('guru/vGuru', $data);
        }
    }
?>