<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index(){
        $this->load->view('login');
    }

    public function check_validity(){
        $user = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->user_login->getUserInfo($user,$password);

        if($result != false){
            // set user data in session
            $this->set_session($result);
            // goto to login function

        }else{
            // goto to invalid login function
            $this->invalid_login();
        }
    }
    public function user_login(){
        // $this->load->view('include/header');
        // $this->load->view('include/menu_sidebar');                
        $this->load->view('dashboard');
        // $this->load->view('include/footer');
}

    public function set_session($result)
    {
            //set session here               
            $_SESSION['user_data'] = $result;

            //goto login function
            if (isset($_SESSION['user_data'])) {
                    redirect('dashboard');
            } else {
                    //goto invalid_login function
                    $this->invalid_login();
            }
    }

    public function invalid_login()
    {
            //set invalid paramiter
            $this->session->set_flashdata('error', 'user name or password incorrect!');

            redirect(base_url());
    }

    public function logout()
        {
                //clear session
                $this->session->unset_userdata('user_data');
                $this->session->set_flashdata('logout', 'You are succefully logout');
                redirect(base_url() . 'admin');
                //goto login page

        }

}
