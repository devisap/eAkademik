<?php
    require 'vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet;

    class AbsensiController extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('Absensi');
            $this->load->library(array('upload'));
            $this->load->helper('download');
        }

        public function vAbsensi(){
            $data['title']      = 'Absensi | eAkademik';
            $data['absensis']   = $this->Absensi->getAll(['deleted_at' => null]); 

            $this->template->view('absensi/vAbsensi', $data);
        }
        public function upload(){
            $config['upload_path'] = './uploads/fileAbsensi/'; //path folder
            $config['allowed_types'] = 'xls|xlsx|csv'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
    
            $this->upload->initialize($config);
            if(!empty($_FILES['FILEABSENSI']['name'])){
                if($this->upload->do_upload('FILEABSENSI')){
                    $fileAbsensi    = $this->upload->data();
                    $filePath       = './uploads/fileAbsensi/'.$fileAbsensi['file_name'];
                    $spreadsheet    = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
                    $arrSpreadsheet = $spreadsheet->getActiveSheet()->toArray();
                    $highestRow     = $spreadsheet->getActiveSheet()->getHighestRow();

                    $jamSekolah     = date('H:i:s', strtotime('07:00:00'));
                    $dataAbsensi    = array();
                    for($i = 5; $i < $highestRow; $i++){
                        $jamKedatangan = date('H:i:s', strtotime($arrSpreadsheet[$i][3]));
                        $ket = ($jamKedatangan > $jamSekolah ? 'Terlambat' : 'Tepat Waktu');

                        // $data['ID_ABSENSI']                 = $resIdAbsensi;
                        $data['NIS_SISWA']                  = $arrSpreadsheet[$i][1];
                        $data['NAMA_SISWA']                 = $arrSpreadsheet[$i][2];
                        $data['JAMKEDATANGAN_ABSENSI']      = $arrSpreadsheet[$i][3];
                        $data['KETERANGAN_ABSENSI']         = $ket;
                        array_push($dataAbsensi, $data);
                    }
                    print_r($dataAbsensi);
                    $this->Absensi->insertBatch($dataAbsensi);
                }else {
                    echo $this->upload->display_errors();	
                }
            }
            redirect('absensi');
        }

        public function download(){
            force_download('./assets/templates/FORMAT_ABSENSI.xlsx', NULL);
        }
    }
?>