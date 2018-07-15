<?php
/**
 * Created by PhpStorm.
 * User: STEINER
 * Date: 12/07/2018
 * Time: 22:44
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class BagageController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('BagageModel');
        $this->load->model('PassagerModel');
        $this->load->library('session');
    }

    public function _remap($method, $params = array())
    {

        if (method_exists($this, $method)) {

            if ($this->session->userdata("success")) {
                return call_user_func_array(array($this, $method), $params);
            } else {
                redirect("welcome");
            }
        }
        show_404();
    }

    public function index()
    {

        $this->load->view('dashboard');
    }

    public function loadBagage()
    {
      $passager = $this->PassagerModel->getPassager();
        $data["passager"] = $passager;
      $this->load->view('bagage/listBagage',$data);
    }

    public function listBagage()
    {
        // les Variables de datatable
        //
        $draw = intval($this->input->post("draw"));
        // echo $entreprise_id; exit();
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $bagage = $this->BagageModel->listBagage();
       // var_dump($bagage); exit();
        $data = array();
        if(count($bagage)>0)
        {
            foreach( $bagage as $r){

                if($r->statut =="Actif")
                {
                    $tab = array();
                    $tab[] = $r->id_bagage;
                    $tab[] = '<td></td>';
                    $tab[] =$r->description;
                    $tab[] =$r->prix;
                    $tab[] =$r->nom." ".$r->prenom;
                    $tab[] =$r->mobile;
                    $tab[] =$r->lib_gare;
                    $data[] = $tab;
                }
            }

        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => count($bagage),
            "recordsFiltered" => count($bagage),
            "data" => $data
        );

        echo json_encode($output);
    }

    public function saveBagage()
    {
      $data = $this->input->post();
      $data["user_id"] = $this->session->userdata("user_id");
      $data["id_gare"] =  $this->session->userdata("id_gare");
      $data["date"] = date("d/m/Y");

      if ($this->BagageModel->save($data)){
          echo 'inserted';
      }else{
          echo 'failed';
      }
    }

    public function updateBagage($id)
    {

    }

    public function deleteBagage($id)
    {

    }

}