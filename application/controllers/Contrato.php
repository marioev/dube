<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Gestion extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Gestion_model');
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
     * Listing of gestion
     */
    function index()
    {
        if($this->acceso(11)) {
            $data['gestion'] = $this->Gestion_model->get_all_gestion();

            $data['_view'] = 'gestion/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new gestion
     */
    function add()
    {
        if($this->acceso(12)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('gestion_descripcion','Gestion Descripcion','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('gestion_fechainicio','Gestion Fechainicio','required');
            if($this->form_validation->run())     
            {
                $estado_id = 9;
                $params = array(
                    'estado_id' => $estado_id,
                    'gestion_fechainicio' => $this->input->post('gestion_fechainicio'),
                    'gestion_descripcion' => $this->input->post('gestion_descripcion'),
                    'gestion_fechafin' => $this->input->post('gestion_fechafin'),
                );
                $gestion_id = $this->Gestion_model->add_gestion($params);
                redirect('gestion/index');
            }else{
                $data['_view'] = 'gestion/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a gestion
     */
    function edit($gestion_id)
    {
        if($this->acceso(13)) {
            // check if the gestion exists before trying to edit it
            $data['gestion'] = $this->Gestion_model->get_gestion($gestion_id);

            if(isset($data['gestion']['gestion_id']))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('gestion_fechainicio','Gestion Fechainicio','required');
                $this->form_validation->set_rules('gestion_descripcion','Gestion Descripcion','required');
                if($this->form_validation->run())
                {
                    $params = array(
                        'estado_id' => $this->input->post('estado_id'),
                        'gestion_fechainicio' => $this->input->post('gestion_fechainicio'),
                        'gestion_descripcion' => $this->input->post('gestion_descripcion'),
                        'gestion_fechafin' => $this->input->post('gestion_fechafin'),
                    );

                    $this->Gestion_model->update_gestion($gestion_id,$params);            
                    redirect('gestion/index');
                }
                else
                {
                    $this->load->model('Estado_model');
                    $tipo = 4;
                    $data['all_estado'] = $this->Estado_model->get_tipo_estado($tipo);
                    
                    $data['_view'] = 'gestion/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The gestion you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting gestion
     */
    /*function remove($gestion_id)
    {
        $gestion = $this->Gestion_model->get_gestion($gestion_id);

        // check if the gestion exists before trying to delete it
        if(isset($gestion['gestion_id']))
        {
            $this->Gestion_model->delete_gestion($gestion_id);
            redirect('gestion/index');
        }
        else
            show_error('The gestion you are trying to delete does not exist.');
    }*/
    
}
