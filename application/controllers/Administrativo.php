<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Administrativo extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Administrativo_model');
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
     * Listing of administrativo
     */
    function index()
    {
        if($this->acceso(28)) {
            $data['administrativo'] = $this->Administrativo_model->get_all_administrativo();

            $data['_view'] = 'administrativo/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new administrativo
     */
    function add()
    {
        if($this->acceso(29)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('admin_nombre','Admin Nombre','required');
            $this->form_validation->set_rules('admin_apellido','Admin Apellido','required');
            if($this->form_validation->run())     
            {
                $estado = 9; // estado ACTIVO
                $params = array(
                    'cargo_id' => $this->input->post('cargo_id'),
                    'direccionuniv_id' => $this->input->post('direccionuniv_id'),
                    'estado_id' => $estado,
                    'admin_nombre' => $this->input->post('admin_nombre'),
                    'admin_apellido' => $this->input->post('admin_apellido'),
                    'admin_ci' => $this->input->post('admin_ci'),
                    'admin_email' => $this->input->post('admin_email'),
                    'admin_profesion' => $this->input->post('admin_profesion'),
                    //'admin_cargo' => $this->input->post('admin_cargo'),
                    'admin_celular' => $this->input->post('admin_celular'),
                    'admin_telefono' => $this->input->post('admin_telefono'),
                );

                $administrativo_id = $this->Administrativo_model->add_administrativo($params);
                redirect('administrativo/index');
            }
            else
            {
                $this->load->model('Cargo_model');
                $data['all_cargo'] = $this->Cargo_model->get_all_cargo();

                $this->load->model('Direccion_universitaria_model');
                $data['all_direccion_universitaria'] = $this->Direccion_universitaria_model->get_all_direccion_universitaria();

                $this->load->model('Estado_model');
                $data['all_estado'] = $this->Estado_model->get_all_estado();

                $data['_view'] = 'administrativo/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a administrativo
     */
    function edit($admin_id)
    {
        if($this->acceso(30)) {
            // check if the administrativo exists before trying to edit it
            $data['administrativo'] = $this->Administrativo_model->get_administrativo($admin_id);
            if(isset($data['administrativo']['admin_id']))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('admin_nombre','Admin Nombre','required');
                $this->form_validation->set_rules('admin_apellido','Admin Apellido','required');
                if($this->form_validation->run())     
                {   
                    $params = array(
                        'cargo_id' => $this->input->post('cargo_id'),
                        'direccionuniv_id' => $this->input->post('direccionuniv_id'),
                        'estado_id' => $this->input->post('estado_id'),
                        'admin_nombre' => $this->input->post('admin_nombre'),
                        'admin_apellido' => $this->input->post('admin_apellido'),
                        'admin_ci' => $this->input->post('admin_ci'),
                        'admin_email' => $this->input->post('admin_email'),
                        'admin_profesion' => $this->input->post('admin_profesion'),
                        //'admin_cargo' => $this->input->post('admin_cargo'),
                        'admin_celular' => $this->input->post('admin_celular'),
                        'admin_telefono' => $this->input->post('admin_telefono'),
                    );

                    $this->Administrativo_model->update_administrativo($admin_id,$params);            
                    redirect('administrativo/index');
                }
                else
                {
                    $this->load->model('Cargo_model');
                    $data['all_cargo'] = $this->Cargo_model->get_all_cargo();

                    $this->load->model('Direccion_universitaria_model');
                    $data['all_direccion_universitaria'] = $this->Direccion_universitaria_model->get_all_direccion_universitaria();

                    $this->load->model('Estado_model');
                    $tipo = 4;
                    $data['all_estado'] = $this->Estado_model->get_tipo_estado($tipo);

                    $data['_view'] = 'administrativo/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The administrativo you are trying to edit does not exist.');
        }
    }

    /*
     * Deleting administrativo
     */
    /*function remove($admin_id)
    {
        $administrativo = $this->Administrativo_model->get_administrativo($admin_id);

        // check if the administrativo exists before trying to delete it
        if(isset($administrativo['admin_id']))
        {
            $this->Administrativo_model->delete_administrativo($admin_id);
            redirect('administrativo/index');
        }
        else
            show_error('The administrativo you are trying to delete does not exist.');
    */
    
}
