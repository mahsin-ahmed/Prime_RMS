<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Result_update extends CI_Controller
{
    public function index()
    {
        $this->load->view('result_update');
        $this->load->view('footer');
    }

    public function check_result()
    {
        // catch std id from input
        $stdId = $this->input->get('stdId');

        // send stdid to the model for checking result
        $std_result['student_inf'] = $this->get_result->search_student_result($stdId);

        // echo "<pre>";
        // print_r($std_result);

        // load veiw page with result
        $this->load->view('result_update_form', $std_result);
        $this->load->view('footer');
    }

    public function set_update_result(){
        // receive pDate and pDate_new values from submit  
        $pDate = $this->input->post('pDate');
        $pDate_new = $this->input->post('pDate_new');

        if ($pDate_new != "") {
            // split date into day month year
            $orderdate = explode('-', $pDate_new);
            $resultPublishedDate = $orderdate[2] . "." . $orderdate[1] . "." . $orderdate[0];
        }else{
            // if date unchanged
            $resultPublishedDate = $pDate;
        }

        // get user name from session
        $user =  $this->session->userdata('user_data')['0']->admin_user_firstname;
        // get ip address
        $ipAddress = $this->input->ip_address();
        // get entry local time
        date_default_timezone_set('Asia/Dhaka');
        $time = date('H:i:s');
        $entryDate = date('Y-m-d');

        // data convert into array
        $data = array(
            's_resultentry_sid' => $this->input->post('stdId'),
            's_resultentry_sname' => $this->input->post('stdName'),
            's_resultentry_cgpa' => $this->input->post('cgpa'),
            's_resultentry_department' => $this->input->post('stdDpt'),
            's_resultentry_subject' => $this->input->post('stddgr'),
            's_resultentry_batch' => $this->input->post('stdBatch'),
            's_resultentry_semester' => $this->input->post('semester'),
            's_resultentry_semester_year' => $this->input->post('year'),
            's_resultentry_dte_altered ' => $entryDate,
            's_resultentry_dte_created' => $entryDate,
            's_resultentry_tme_created ' => $time,
            'pdate' => $resultPublishedDate,
            'user' => $user,
            'ip' => $ipAddress,
        );

        $rs = $this->set_result->updateResult($data);

        if($rs){
            // set success message in flash data and redirect to result entry page
            $this->session->set_flashdata('success', 'successful updated!');
            redirect('result-update');
        }else{
            // set failed message in flash data and redirect to result entry page
            $this->session->set_flashdata('error', 'operation failed !');
            redirect('result-update');
        }
    }
}
