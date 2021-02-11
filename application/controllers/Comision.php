<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Comision extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Comision_model');
    } 

    /*
     * Listing of comision
     */
    function index()
    {
        $data['comision'] = $this->Comision_model->get_all_comision();
        
        $data['_view'] = 'comision/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new comision
     */
    function add()
    {   
        $this->load->library('form_validation');
        $this->form_validation->set_rules('comision_nombre','Comision Nombre','required');
        if($this->form_validation->run())     
        {
            $estado_id = 1;
            $params = array(
                'gestion_id' => $this->input->post('gestion_id'),
                'admin_id' => $this->input->post('admin_id'),
                'estado_id' => $estado_id,
                'comision_nombre' => $this->input->post('comision_nombre'),
                'comision_descripcion' => $this->input->post('comision_descripcion'),
                'comision_fechacreacion' => $this->input->post('comision_fechacreacion'),
            );
            $comision_id = $this->Comision_model->add_comision($params);
            redirect('comision/index');
        }
        else
        {
            $this->load->model('Gestion_model');
            $data['all_gestion'] = $this->Gestion_model->get_all_gestion();

            $this->load->model('Administrativo_model');
            $data['all_administrativo'] = $this->Administrativo_model->get_all_administrativo();

            /*$this->load->model('Estado_model');
            $data['all_estado'] = $this->Estado_model->get_all_estado();
            */
            $data['_view'] = 'comision/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a comision
     */
    function edit($comision_id)
    {   
        // check if the comision exists before trying to edit it
        $data['comision'] = $this->Comision_model->get_comision($comision_id);
        if(isset($data['comision']['comision_id']))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('comision_nombre','Comision Nombre','required');
            if($this->form_validation->run())     
            {
                $params = array(
                    'gestion_id' => $this->input->post('gestion_id'),
                    'admin_id' => $this->input->post('admin_id'),
                    'estado_id' => $this->input->post('estado_id'),
                    'comision_nombre' => $this->input->post('comision_nombre'),
                    'comision_descripcion' => $this->input->post('comision_descripcion'),
                    'comision_fechacreacion' => $this->input->post('comision_fechacreacion'),
                );
                $this->Comision_model->update_comision($comision_id,$params);            
                redirect('comision/index');
            }
            else
            {
                $this->load->model('Gestion_model');
                $data['all_gestion'] = $this->Gestion_model->get_all_gestion();

                $this->load->model('Administrativo_model');
                $data['all_administrativo'] = $this->Administrativo_model->get_all_administrativo();

                $this->load->model('Estado_model');
                $data['all_estado'] = $this->Estado_model->get_all_estado();

                $data['_view'] = 'comision/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The comision you are trying to edit does not exist.');
    } 

    /*
     * Deleting comision
     */
    function remove($comision_id)
    {
        $comision = $this->Comision_model->get_comision($comision_id);

        // check if the comision exists before trying to delete it
        if(isset($comision['comision_id']))
        {
            $this->Comision_model->delete_comision($comision_id);
            redirect('comision/index');
        }
        else
            show_error('The comision you are trying to delete does not exist.');
    }
    
}
