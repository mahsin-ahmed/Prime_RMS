<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Insert_new_student extends CI_Controller{
    public function index(){
        // get last student
        $stdLast['data'] = $this->Student_entry->getStudetnt();
        // print_r($stdLast);
        
        $this->load->view('insert_student',$stdLast);
        $this->load->view('footer');
    }
    
    public function insert(){
        //receive data
        $data = array();

        $data['student_user_name'] = $this->input->post('stdName', true);
        $data['student_user_sid'] = $this->input->post('stdId', true); 
        $data['student_user_batch'] = $this->input->post('stdBatch', true);
        $data['student_user_fathers_name'] = $this->input->post('FName', true);
        $data['student_user_mothers_name'] = $this->input->post('MName', true);
        $data['student_user_department'] = $this->input->post('stdDpt', true); 
        $data['student_user_program'] = $this->input->post('stdProg', true); 
        $data['student_user_bsemester'] = $this->input->post('stdSmtr', true);  

        // get user name from session
        $user =  $this->session->userdata('user_data')['0']->admin_user_firstname;
        // get ip address
        $ipAddress = $this->input->ip_address();
        // get entry local time
        date_default_timezone_set('Asia/Dhaka');
        $time = date('H:i:s');
        $entryDate = date('Y-m-d');
        
        $data['student_user_username'] = $data['student_user_sid'];
        $data['student_user_dte_created'] = $entryDate;
        $data['student_user_tme_created'] = $time; 
        $data['user'] = $user; 
        $data['ip'] = $ipAddress; 

        $sdata = false;
        $insert_result = false;
        // echo"<pre>";
        // print_r($data);
        $config['file_name']   = $data['student_user_sid']; 
        $config['upload_path']   = './../070513/admin/upload_spic/'; 
        $config['allowed_types'] = 'jpg|png'; 
        $config['max_size']      = 1024; 
        $config['max_width']     = 768; 
        $config['max_height']    = 1024;  
        $this->load->library('upload');
        $this->upload->initialize($config);

        if(! $this->upload->do_upload('stdImage')){
            $error = $this->upload->display_errors();
        }else{
            $sdata = $this->upload->data();
            if($sdata){
                $data['path'] = 'upload_spic/'.$sdata['file_name'];
                $insert_result = $this->Student_entry->insertStudentData($data);

                if($insert_result){
                    // set success message in flash data and redirect to result entry page
                    $this->session->set_flashdata('success', 'operation successful!');
                    redirect('insert-student');
                }else{
                    // set failed message in flash data and redirect to result entry page
                    $this->session->set_flashdata('error', 'operation failed!');
                    redirect('insert-student');
                }
            }
        }
    }

}
