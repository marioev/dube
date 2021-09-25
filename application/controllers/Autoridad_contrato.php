<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Autoridad_contrato extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Autoridad_contrato_model');
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
     * Listing of autoridad_contrato
     */
    function index()
    {
        if($this->acceso(11)) {
            $data['autoridad_contrato'] = $this->Autoridad_contrato_model->get_all_autoridad_contrato();

            $data['_view'] = 'autoridad_contrato/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new autoridad_contrato
     */
    function add()
    {
        if($this->acceso(12)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('autoridadc_nombre','Autoridad nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('autoridadc_cargo','Autoridad cargo','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            if($this->form_validation->run())     
            {
                $estado_id = 9;
                $params = array(
                    'gestion_id' => $this->input->post('gestion_id'),
                    'estado_id' => $estado_id,
                    'autoridadc_nombre' => $this->input->post('autoridadc_nombre'),
                    'autoridadc_ci' => $this->input->post('autoridadc_ci'),
                    'autoridadc_cargo' => $this->input->post('autoridadc_cargo'),
                    'autoridadc_orden' => $this->input->post('autoridadc_orden'),
                );
                $autoridadc_id = $this->Autoridad_contrato_model->add_autoridad_contrato($params);
                redirect('autoridad_contrato/index');
            }else{
                $this->load->model('Gestion_model');
                $data['all_gestion'] = $this->Gestion_model->get_all_gestion();
                $data['_view'] = 'autoridad_contrato/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }

    /*
     * Editing a autoridad_contrato
     */
    function edit($autoridadc_id)
    {
        if($this->acceso(13)) {
            // check if the autoridad_contrato exists before trying to edit it
            $data['autoridad_contrato'] = $this->Autoridad_contrato_model->get_autoridad_contrato($autoridadc_id);

            if(isset($data['autoridad_contrato']['autoridadc_id']))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('autoridadc_nombre','Autoridad nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('autoridadc_cargo','Autoridad cargo','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                if($this->form_validation->run())
                {
                    $params = array(
                        'gestion_id' => $this->input->post('gestion_id'),
                        'estado_id' => $this->input->post('estado_id'),
                        'autoridadc_nombre' => $this->input->post('autoridadc_nombre'),
                        'autoridadc_ci' => $this->input->post('autoridadc_ci'),
                        'autoridadc_cargo' => $this->input->post('autoridadc_cargo'),
                        'autoridadc_orden' => $this->input->post('autoridadc_orden'),
                    );
                    $this->Autoridad_contrato_model->update_autoridad_contrato($autoridadc_id,$params);            
                    redirect('autoridad_contrato/index');
                }
                else
                {
                    $this->load->model('Gestion_model');
                    $data['all_gestion'] = $this->Gestion_model->get_all_gestion();
                    $this->load->model('Estado_model');
                    $tipo = 4;
                    $data['all_estado'] = $this->Estado_model->get_tipo_estado($tipo);
                    
                    $data['_view'] = 'autoridad_contrato/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The autoridad_contrato you are trying to edit does not exist.');
        }
    }
}
