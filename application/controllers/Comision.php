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
     * Listing of comision
     */
    function index()
    {
        if($this->acceso(31)) {
            $this->load->model('Gestion_model');
            $data['all_gestion'] = $this->Gestion_model->get_all_gestion();
            
            //$data['comision'] = $this->Comision_model->get_all_comision();

            $data['_view'] = 'comision/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new comision
     */
    function add()
    {
        if($this->acceso(32)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('comision_nombre','Comision Nombre','required');
            if($this->form_validation->run())
            {
                $estado_id = 9; // estado = ACTIVO
                $params = array(
                    'gestion_id' => $this->input->post('gestion_id'),
                    'convocatoria_id' => $this->input->post('convocatoria_id'),
                    'estado_id' => $estado_id,
                    'comision_nombre' => $this->input->post('comision_nombre'),
                    'comision_descripcion' => $this->input->post('comision_descripcion'),
                    'comision_fechacreacion' => $this->input->post('comision_fechacreacion'),
                );
                $comision_id = $this->Comision_model->add_comision($params);
                
                $this->load->model('Comision_administrativo_model');
                $administrativos = $this->input->post('admin_quitar');
                foreach ($administrativos as $admin_id) {
                    $params = array(
                        'admin_id' => $admin_id,
                        'comision_id' => $comision_id,
                    );
                    $comisionadmin_id = $this->Comision_administrativo_model->add_comision_administrativo($params);
                }
                redirect('comision/index');
            }else{
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
    }  

    /*
     * Editing a comision
     */
    function edit($comision_id)
    {
        if($this->acceso(33)) {
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
                        'convocatoria_id' => $this->input->post('convocatoria_id'),
                        'estado_id' => $this->input->post('estado_id'),
                        'comision_nombre' => $this->input->post('comision_nombre'),
                        'comision_descripcion' => $this->input->post('comision_descripcion'),
                        'comision_fechacreacion' => $this->input->post('comision_fechacreacion'),
                    );
                    $this->Comision_model->update_comision($comision_id,$params);
                    
                    $administrativos = $this->input->post('admin_quitar');
                    $this->load->model('Comision_administrativo_model');
                    $this->Comision_administrativo_model->delete_comision_administrativo($comision_id);
                    foreach ($administrativos as $admin_id) {
                        $params = array(
                            'admin_id' => $admin_id,
                            'comision_id' => $comision_id,
                        );
                        $comisionadmin_id = $this->Comision_administrativo_model->add_comision_administrativo($params);
                    }
                    redirect('comision/index');
                }
                else
                {
                    $this->load->model('Gestion_model');
                    $data['all_gestion'] = $this->Gestion_model->get_all_gestion();

                    $this->load->model('Administrativo_model');
                    $data['all_administrativo'] = $this->Administrativo_model->get_all_administrativo();
                    $this->load->model('Comision_administrativo_model');
                    $data['all_comision_administrativo'] = $this->Comision_administrativo_model->get_all_comisionadministrativo($comision_id);

                    $this->load->model('Estado_model');
                    $tipo = 4;
                    $data['all_estado'] = $this->Estado_model->get_tipo_estado($tipo);

                    $data['_view'] = 'comision/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The comision you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting comision
     */
    /*function remove($comision_id)
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
    }*/
    /* obtiene las comisiones */
    function get_comisiones()
    {
        //if($this->acceso(103)) {
            if($this->input->is_ajax_request()){
                $filtrar = $this->input->post('filtrar');
                $gestion_id = $this->input->post('gestion_id');
                $convocatoria_id = $this->input->post('convocatoria_id');
                $filtro = "";
                if($gestion_id != 0){
                    $filtro = " and c.gestion_id = ".$gestion_id;
                }
                if($convocatoria_id != 0){
                    $filtro = $filtro." and c.convocatoria_id = ".$convocatoria_id;
                }
                //$this->load->model('Formulario_autentificacion_model');
                $datos = $this->Comision_model->get_all_comision($filtrar, $filtro);
                //$datos = $this->Formulario_autentificacion_model->get_all_formulario_postulante($postulante_id);
                echo json_encode($datos);
            }else{                 
                show_404();
            }
        //}
    }
    
}
