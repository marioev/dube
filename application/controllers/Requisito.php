<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Requisito extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Requisito_model');
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
     * Listing of requisito
     */
    function index()
    {
        if($this->acceso(25)) {
            $data['requisito'] = $this->Requisito_model->get_all_requisito();

            $data['_view'] = 'requisito/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new requisito
     */
    function add()
    {
        if($this->acceso(26)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('requisito_nombre','Requisito Nombre','required');
            if($this->form_validation->run())
            {
                $estado_id = 9;
                $params = array(
                    'requisito_nombre' => $this->input->post('requisito_nombre'),
                    'beca_id' => $this->input->post('beca_id'),
                    'estado_id' => $estado_id,
                );
                $requisito_id = $this->Requisito_model->add_requisito($params);
                redirect('requisito/index');
            }
            else
            {
                $this->load->model('Beca_model');
                $data['all_beca'] = $this->Beca_model->getall_becas_abiertas();
                    
                $data['_view'] = 'requisito/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a requisito
     */
    function edit($requisito_id)
    {
        if($this->acceso(27)) {
            // check if the requisito exists before trying to edit it
            $data['requisito'] = $this->Requisito_model->get_requisito($requisito_id);
            if(isset($data['requisito']['requisito_id']))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('requisito_nombre','Requisito Nombre','required');
                if($this->form_validation->run())
                {
                    $params = array(
                        'requisito_nombre' => $this->input->post('requisito_nombre'),
                        'beca_id' => $this->input->post('beca_id'),
                        'estado_id' => $this->input->post('estado_id'),
                    );

                    $this->Requisito_model->update_requisito($requisito_id,$params);            
                    redirect('requisito/index');
                }
                else
                {
                    $this->load->model('Beca_model');
                    $data['all_beca'] = $this->Beca_model->getall_becas_abiertas();
                    
                    $this->load->model('Estado_model');
                    $tipo = 4;
                    $data['all_estado'] = $this->Estado_model->get_tipo_estado($tipo);
                    
                    $data['_view'] = 'requisito/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The requisito you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting requisito
     */
    /*function remove($requisito_id)
    {
        $requisito = $this->Requisito_model->get_requisito($requisito_id);

        // check if the requisito exists before trying to delete it
        if(isset($requisito['requisito_id']))
        {
            $this->Requisito_model->delete_requisito($requisito_id);
            redirect('requisito/index');
        }
        else
            show_error('The requisito you are trying to delete does not exist.');
    }*/
    
}
