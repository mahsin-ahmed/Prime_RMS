<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Result_entry extends CI_Controller
{
    public function index()
    {
        $this->load->view('check_student');
        $this->load->view('footer');
    }

    public function check_status(){
        $student_id = $this->input->get('stdId');

        $data['stdId'] = $student_id;

        $isStdValid['student_info'] = $this->get_result->check_std($student_id);

        // echo $isStdValid['student_info'];

        if ($isStdValid['student_info'] == 1) {
            // Result Already Exist, set flash data and redirect to result entry page
            $this->session->set_flashdata('exist', 'Result Already Exist !');
            redirect('check-student');
        } else if ($isStdValid['student_info'] == 0) {
            // load result input form
            $this->load->view('result_input', $data);
            $this->load->view('footer');
        } else {
            $this->load->view('result_transfer', $isStdValid);
            $this->load->view('footer');
        }
    }
    
    public function std_result_entry()
    {
        $pDate = $this->input->post('pDate');

        // split date into day month year
        $orderdate = explode('-', $pDate);
        $resultPublishedDate = $orderdate[2] . "." . $orderdate[1] . "." .$orderdate[0];
        // get user name from session
        $user =  $this->session->userdata('user_data')['0']->admin_user_firstname;
        // get ip address
        $ipAddress = $this->input->ip_address();
        // get entry local time
        date_default_timezone_set('Asia/Dhaka');
        $time = date('H:i:s');
        $entryDate = date('Y-m-d');


        $data = array(
            's_resultentry_sid' => $this->input->post('stdId'),
            's_resultentry_sname' => $this->input->post('stdName'),
            's_resultentry_cgpa' => $this->input->post('cgpa'),
            's_resultentry_department' => $this->input->post('stdDpt'),
            's_resultentry_subject' => $this->input->post('stddgr'),
            's_resultentry_batch' => $this->input->post('stdBatch'),
            's_resultentry_semester' => $this->input->post('stdSmtr'),
            's_resultentry_semester_year' => $this->input->post('stdYear'),
            's_resultentry_dte_altered ' => $entryDate,
            's_resultentry_dte_created' => $entryDate,
            's_resultentry_tme_created ' => $time,
            'pdate' => $resultPublishedDate,
            'user' => $user,
            'ip' => $ipAddress,
        );

        $rs = $this->set_result->insertResult($data);

        if($rs){
            // set success message in flash data and redirect to result entry page
            $this->session->set_flashdata('success', 'operation successful !');
            redirect('check-student');
        }else{
            // set failed message in flash data and redirect to result entry page
            $this->session->set_flashdata('error', 'operation failed !');
            redirect('check-student');
        }

    }
    public function new_result_entry()
    {
        $pDate = $this->input->post('pDate');

        // split date into day month year
        $orderdate = explode('-', $pDate);
        $resultPublishedDate = $orderdate[2] . "." . $orderdate[1] . "." .$orderdate[0];
        // get user name from session
        $user =  $this->session->userdata('user_data')['0']->admin_user_firstname;
        // get ip address
        $ipAddress = $this->input->ip_address();
        // get entry local time
        date_default_timezone_set('Asia/Dhaka');
        $time = date('H:i:s');
        $entryDate = date('Y-m-d');


        $data_result_table = array(
            's_resultentry_sid' => $this->input->post('stdId'),
            's_resultentry_sname' => $this->input->post('stdName'),
            's_resultentry_cgpa' => $this->input->post('cgpa'),
            's_resultentry_department' => $this->input->post('stdDpt'),
            's_resultentry_subject' => $this->input->post('stddgr'),
            's_resultentry_batch' => $this->input->post('stdBatch'),
            's_resultentry_semester' => $this->input->post('stdSmtr'),
            's_resultentry_semester_year' => $this->input->post('stdYear'),
            's_resultentry_dte_altered ' => $entryDate,
            's_resultentry_dte_created' => $entryDate,
            's_resultentry_tme_created' => $time,
            'pdate' => $resultPublishedDate,
            'user' => $user,
            'ip' => $ipAddress,
        );

        // student result insert into s_result_entry table
               $rs = $this->set_result->insertResult($data_result_table);

        if($rs){
            // set success message in flash data and redirect to result entry page
            $this->session->set_flashdata('success', 'operation successful !');
            redirect('check-student');
        }else{
            // set failed message in flash data and redirect to result entry page
            $this->session->set_flashdata('error', 'operation failed !');
            redirect('check-student');
        }

    }

    public function  check_result_update(){
        $this->load->view('check_result_update');
    }
}
