<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Modelo_contrato extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Modelo_contrato_model');
        if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }
    }
    private function acceso($id_rol){
        $rolusuario = $this->session_data['rol'];
        if($rolusuario[$id_rol-1]['rolusuario_asignado'] == 1){
            return true;
        }else{
            $data['_view'] = 'login/mensajeacceso';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Listing of modelo_contrato
     */
    function index()
    {
        if($this->acceso(11)) {
            $data['modelo_contrato'] = $this->Modelo_contrato_model->get_all_modelo_contrato();

            $data['_view'] = 'modelo_contrato/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new modelo_contrato
     */
    function add()
    {
        if($this->acceso(12)) {
            $this->load->model('Beca_model');
            $data['all_beca'] = $this->Beca_model->get_all_becacontrato();

            $data['_view'] = 'modelo_contrato/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a modelo_contrato
     */
    function edit($modeloc_id)
    {
        if($this->acceso(13)) {
            // check if the modelo_contrato exists before trying to edit it
            $data['modelo_contrato'] = $this->Modelo_contrato_model->get_modelo_contrato($modeloc_id);

            if(isset($data['modelo_contrato']['modeloc_id']))
            {
                    $this->load->model('Beca_model');
                    $data['all_beca'] = $this->Beca_model->get_all_becacontrato();
                    
                    $data['_view'] = 'modelo_contrato/edit';
                    $this->load->view('layouts/main',$data);
                //}
            }
            else
                show_error('The modelo_contrato you are trying to edit does not exist.');
        }
    }
    /* registrar nuevo modelo de contrato */
    function registrar_modelocontrato()
    {
        //if($this->acceso(103)) {
            if($this->input->is_ajax_request()){
                $params = array(
                    'beca_id'        => $this->input->post('beca_id'),
                    'modeloc_parte1' => $this->input->post('modeloc_parte1'),
                    'modeloc_parte2' => $this->input->post('modeloc_parte2'),
                    'modeloc_parte3' => $this->input->post('modeloc_parte3'),
                    'modeloc_parte4' => $this->input->post('modeloc_parte4'),
                    'modeloc_parte5' => $this->input->post('modeloc_parte5'),
                    'modeloc_parte6' => $this->input->post('modeloc_parte6'),
                    'modeloc_parte7' => $this->input->post('modeloc_parte7'),
                    'modeloc_parte8' => $this->input->post('modeloc_parte8'),
                    'modeloc_parte9' => $this->input->post('modeloc_parte9'),
                    'modeloc_parte10' => $this->input->post('modeloc_parte10'),
                    'modeloc_parte11' => $this->input->post('modeloc_parte11'),
                );
                $modeloc_id = $this->Modelo_contrato_model->add_modelo_contrato($params);
                
                echo json_encode("ok");
            }else{                 
                show_404();
            }
        //}
    }
    /* modificar modelo de contrato */
    function modificar_modelocontrato()
    {
        //if($this->acceso(103)) {
            if($this->input->is_ajax_request()){
                $params = array(
                    'beca_id'        => $this->input->post('beca_id'),
                    'modeloc_parte1' => $this->input->post('modeloc_parte1'),
                    'modeloc_parte2' => $this->input->post('modeloc_parte2'),
                    'modeloc_parte3' => $this->input->post('modeloc_parte3'),
                    'modeloc_parte4' => $this->input->post('modeloc_parte4'),
                    'modeloc_parte5' => $this->input->post('modeloc_parte5'),
                    'modeloc_parte6' => $this->input->post('modeloc_parte6'),
                    'modeloc_parte7' => $this->input->post('modeloc_parte7'),
                    'modeloc_parte8' => $this->input->post('modeloc_parte8'),
                    'modeloc_parte9' => $this->input->post('modeloc_parte9'),
                    'modeloc_parte10' => $this->input->post('modeloc_parte10'),
                    'modeloc_parte11' => $this->input->post('modeloc_parte11'),
                );
                $modeloc_id = $this->input->post('modeloc_id');
                $this->Modelo_contrato_model->update_modelo_contrato($modeloc_id,$params);
                echo json_encode("ok");
            }else{                 
                show_404();
            }
        //}
    }
}
