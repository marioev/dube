<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Convocatoria_requisito extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Convocatoria_requisito_model');
    } 

    /*
     * Listing of convocatoria_requisito
     */
    function index()
    {
        $data['convocatoria_requisito'] = $this->Convocatoria_requisito_model->get_all_convocatoria_requisito();
        
        $data['_view'] = 'convocatoria_requisito/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new convocatoria_requisito
     */
    /*function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'requisito_id' => $this->input->post('requisito_id'),
				'convocatoria_id' => $this->input->post('convocatoria_id'),
				'beca_id' => $this->input->post('beca_id'),
            );
            
            $convocatoria_requisito_id = $this->Convocatoria_requisito_model->add_convocatoria_requisito($params);
            redirect('convocatoria_requisito/index');
        }
        else
        {
			$this->load->model('Requisito_model');
			$data['all_requisito'] = $this->Requisito_model->get_all_requisito();

			$this->load->model('Convocatoria_model');
			$data['all_convocatoria'] = $this->Convocatoria_model->get_all_convocatoria();

			$this->load->model('Beca_model');
			$data['all_beca'] = $this->Beca_model->get_all_beca();
            
            $data['_view'] = 'convocatoria_requisito/add';
            $this->load->view('layouts/main',$data);
        }
    }*/

    /*
     * Editing a convocatoria_requisito
     */
    /*function edit($convoreq_id)
    {   
        // check if the convocatoria_requisito exists before trying to edit it
        $data['convocatoria_requisito'] = $this->Convocatoria_requisito_model->get_convocatoria_requisito($convoreq_id);
        
        if(isset($data['convocatoria_requisito']['convoreq_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'requisito_id' => $this->input->post('requisito_id'),
					'convocatoria_id' => $this->input->post('convocatoria_id'),
					'beca_id' => $this->input->post('beca_id'),
                );

                $this->Convocatoria_requisito_model->update_convocatoria_requisito($convoreq_id,$params);            
                redirect('convocatoria_requisito/index');
            }
            else
            {
				$this->load->model('Requisito_model');
				$data['all_requisito'] = $this->Requisito_model->get_all_requisito();

				$this->load->model('Convocatoria_model');
				$data['all_convocatoria'] = $this->Convocatoria_model->get_all_convocatoria();

				$this->load->model('Beca_model');
				$data['all_beca'] = $this->Beca_model->get_all_beca();

                $data['_view'] = 'convocatoria_requisito/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The convocatoria_requisito you are trying to edit does not exist.');
    }*/

    /*
     * Deleting convocatoria_requisito
     */
    /*function remove($convoreq_id)
    {
        $convocatoria_requisito = $this->Convocatoria_requisito_model->get_convocatoria_requisito($convoreq_id);

        // check if the convocatoria_requisito exists before trying to delete it
        if(isset($convocatoria_requisito['convoreq_id']))
        {
            $this->Convocatoria_requisito_model->delete_convocatoria_requisito($convoreq_id);
            redirect('convocatoria_requisito/index');
        }
        else
            show_error('The convocatoria_requisito you are trying to delete does not exist.');
    }*/
    
}
