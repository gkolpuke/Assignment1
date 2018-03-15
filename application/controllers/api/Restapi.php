<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Restapi extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->library('session');
        $this->load->model('master_model');
    }

    public function save_post()
    {
        //print_r($_POST);die;
        $que=$_POST['quest'];
        $type=$_POST['type'];
        $questsize=sizeof($_POST['quest']);
        for ($i=0; $i < $questsize; $i++) 
        { 
            $k=$i+1;
            $data['question']=$que[$i];
            $data['ans_type']=$type[$i];
            $id=$this->master_model->master_insert($data,TB_QUESTION);
            foreach ($_POST['ans'.$k] as $value) 
            {
                $ans_data['answer']=$value;
                $ans_data['ques_id']=$id;
                $ansid=$this->master_model->master_insert($ans_data,TB_ANSWER);
            }
        }

        $result['status']="Succsess";
        $result['message']="Save Record Succsessfully";

        $this->response($result, REST_Controller::HTTP_OK);
    }

    

}
