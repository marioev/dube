<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Convocatoria extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Convocatoria_model');
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
     * Listing of convocatoria
     */
    function index()
    {
        if($this->acceso(4)) {
            $data['convocatoria'] = $this->Convocatoria_model->get_all_convocatoria();

            $data['_view'] = 'convocatoria/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new convocatoria
     */
    function add()
    {
        if($this->acceso(5)) {
            if(isset($_POST) && count($_POST) > 0)     
            {
                /* *********************INICIO imagen***************************** */
                $foto="";
                if (!empty($_FILES['convocatoria_dcto']['name'])){

                    $this->load->library('image_lib');
                    $config['upload_path'] = './resources/images/convocatoria/';
                    $img_full_path = $config['upload_path'];

                    //$config['allowed_types'] = 'gif|jpeg|jpg|png';
                    $config['allowed_types'] = '*';
                    $config['image_library'] = 'gd2';
                    $config['max_size'] = 0;
                    $config['max_width'] = 0;
                    $config['max_height'] = 0;

                    $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                    $config['file_name'] = $new_name; //.$extencion;
                    $config['file_ext_tolower'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('convocatoria_dcto');

                    $img_data = $this->upload->data();
                    $extension = $img_data['file_ext'];
                    /* ********************INICIO para resize***************************** */
                    if ($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                        $conf['image_library'] = 'gd2';
                        $conf['source_image'] = $img_data['full_path'];
                        $conf['new_image'] = './resources/images/convocatoria/';
                        $conf['maintain_ratio'] = TRUE;
                        $conf['create_thumb'] = FALSE;
                        $conf['width'] = 800;
                        $conf['height'] = 600;
                        $this->image_lib->clear();
                        $this->image_lib->initialize($conf);
                        if(!$this->image_lib->resize()){
                            echo $this->image_lib->display_errors('','');
                        }
                        $confi['image_library'] = 'gd2';
                        $confi['source_image'] = './resources/images/convocatoria/'.$new_name.$extension;
                        $confi['new_image'] = './resources/images/convocatoria/'."thumb_".$new_name.$extension;
                        $confi['create_thumb'] = FALSE;
                        $confi['maintain_ratio'] = TRUE;
                        $confi['width'] = 100;
                        $confi['height'] = 100;

                        $this->image_lib->clear();
                        $this->image_lib->initialize($confi);
                        $this->image_lib->resize();
                    }
                    /* ********************F I N  para resize***************************** */


                    $foto = $new_name.$extension;
                }
                /* *********************FIN imagen***************************** */
                $fecha_res = date('Y-m-d');
                $hora_res = date('H:i:s');
                //$gestion_id = 1;
                $estado_id = 1;
                $params = array(
                    'gestion_id' => $this->input->post('gestion_id'),
                    'estado_id' => $estado_id,
                    'convocatoria_titulo' => $this->input->post('convocatoria_titulo'),
                    'convocatoria_fecha' => $fecha_res,
                    'convocatoria_hora' => $hora_res,
                    'convocatoria_descripcion' => $this->input->post('convocatoria_descripcion'),
                    'convocatoria_fechalimite' => $this->input->post('convocatoria_fechalimite'),
                    'convocatoria_dcto' => $foto,
                );
                $convocatoria_id = $this->Convocatoria_model->add_convocatoria($params);
                
                $this->load->model('Beca_model');
                $all_becas = $this->Beca_model->getall_becas_abiertas();
                $this->load->model('Plazas_beca_model');
                foreach ($all_becas as $beca) {
                    $paramsplaz = array(
                        'beca_id' => $beca["beca_id"],
                        'convocatoria_id' => $convocatoria_id,
                        //'plaza_cantidad' => "",
                    );
                    $plaza_id = $this->Plazas_beca_model->add_plazas_beca($paramsplaz);
                }
                
                $this->load->model('Requisito_model');
                $this->load->model('Convocatoria_requisito_model');
                foreach ($all_becas as $beca) {
                    $all_requisito = $this->Requisito_model->get_all_requisito_beca($beca['beca_id']);
                    foreach ($all_requisito as $requisito) {
                        $paramsreq = array(
                            'requisito_id' => $requisito['requisito_id'],
                            'convocatoria_id' => $convocatoria_id,
                            'beca_id' => $beca['beca_id'],
                        );
                        $convoreq_id = $this->Convocatoria_requisito_model->add_convocatoria_requisito($paramsreq);
                    }
                }
                
                redirect('convocatoria/numbeca/'.$convocatoria_id);
            }
            else
            {
                $this->load->model('Gestion_model');
                $data['all_gestion'] = $this->Gestion_model->get_all_gestion();

                //$this->load->model('Requisito_model');
                //$data['all_requisito'] = $this->Requisito_model->get_all_requisito();

                $this->load->model('Beca_model');
                $data['all_beca'] = $this->Beca_model->get_all_beca();

                $data['_view'] = 'convocatoria/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }

    /*
     * Editing a convocatoria
     */
    function edit($convocatoria_id)
    {
        if($this->acceso(6)) {
            // check if the convocatoria exists before trying to edit it
            $data['convocatoria'] = $this->Convocatoria_model->get_convocatoria($convocatoria_id);

            if(isset($data['convocatoria']['convocatoria_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {
                    /* *********************INICIO imagen***************************** */
                    $foto="";
                        $foto1= $this->input->post('convocatoria_dcto1');
                    if (!empty($_FILES['convocatoria_dcto']['name']))
                    {
                        $this->load->library('image_lib');
                        $config['upload_path'] = './resources/images/convocatoria/';
                        //$config['allowed_types'] = 'gif|jpeg|jpg|png';
                        $config['allowed_types'] = '*';
                        $config['max_size'] = 0;
                        $config['max_width'] = 0;
                        $config['max_height'] = 0;

                        $new_name = time();
                        $config['file_name'] = $new_name; //.$extencion;
                        $config['file_ext_tolower'] = TRUE;

                        $this->load->library('upload', $config);
                        $this->upload->do_upload('convocatoria_dcto');

                        $img_data = $this->upload->data();
                        $extension = $img_data['file_ext'];
                        /* ********************INICIO para resize***************************** */
                        if($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                            $conf['image_library'] = 'gd2';
                            $conf['source_image'] = $img_data['full_path'];
                            $conf['new_image'] = './resources/images/convocatoria/';
                            $conf['maintain_ratio'] = TRUE;
                            $conf['create_thumb'] = FALSE;
                            $conf['width'] = 800;
                            $conf['height'] = 600;
                            $this->image_lib->clear();
                            $this->image_lib->initialize($conf);
                            if(!$this->image_lib->resize()){
                                echo $this->image_lib->display_errors('','');
                            }

                            $confi['image_library'] = 'gd2';
                            $confi['source_image'] = './resources/images/convocatoria/'.$new_name.$extension;
                            $confi['new_image'] = './resources/images/convocatoria/'."thumb_".$new_name.$extension;
                            $confi['create_thumb'] = FALSE;
                            $confi['maintain_ratio'] = TRUE;
                            $confi['width'] = 100;
                            $confi['height'] = 100;

                            $this->image_lib->clear();
                            $this->image_lib->initialize($confi);
                            $this->image_lib->resize();
                        }
                        /* ********************F I N  para resize***************************** */
                        //$directorio = base_url().'resources/imagenes/';
                        $directorio = FCPATH.'resources\images\convocatoria\\';
                        //$directorio = $_SERVER['DOCUMENT_ROOT'].'/ximpleman_web/resources/images/productos/';
                        if(isset($foto1) && !empty($foto1)){
                          if(file_exists($directorio.$foto1)){
                              unlink($directorio.$foto1);
                              $mimagenthumb = "thumb_".$foto1;
                              //$mimagenthumb = str_replace(".", "_thumb.", $foto1);
                              if($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                                  unlink($directorio.$mimagenthumb);
                              }
                          }
                      }
                        $foto = $new_name.$extension;
                    }else{
                        $foto = $foto1;
                    }
                    $params = array(
                        'gestion_id' => $this->input->post('gestion_id'),
                        'estado_id' => $this->input->post('estado_id'),
                        'convocatoria_titulo' => $this->input->post('convocatoria_titulo'),
                        'convocatoria_fecha' => $this->input->post('convocatoria_fecha'),
                        'convocatoria_hora' => $this->input->post('convocatoria_hora'),
                        'convocatoria_descripcion' => $this->input->post('convocatoria_descripcion'),
                        'convocatoria_fechalimite' => $this->input->post('convocatoria_fechalimite'),
                        'convocatoria_dcto' => $foto,
                    );
                    $this->Convocatoria_model->update_convocatoria($convocatoria_id,$params);

                    /*$los_requisitos = $this->input->post('requisitos');
                    $this->load->model('Convocatoria_requisito_model');
                    $this->Convocatoria_requisito_model->eliminar_convocatoria_requisito($convocatoria_id);
                    foreach ($los_requisitos as $requisito) {
                        $paramsreq = array(
                            'requisito_id' => $requisito,
                            'convocatoria_id' => $convocatoria_id,
                            'beca_id' => $this->input->post('beca_id'),
                        );
                        $convoreq_id = $this->Convocatoria_requisito_model->add_convocatoria_requisito($paramsreq);
                    }*/
                    /*$this->load->model('Plazas_beca_model');
                    if(isset($data['convocatoria']['plaza_id'])){
                        $paramsplaz = array(
                            'beca_id' => $this->input->post('beca_id'),
                            'convocatoria_id' => $convocatoria_id,
                            'plaza_cantidad' => $this->input->post('plaza_cantidad'),
                        );
                        $this->Plazas_beca_model->update_plazas_beca($data['convocatoria']['plaza_id'],$paramsplaz);
                    }else{
                        $paramsplaz = array(
                            'beca_id' => $this->input->post('beca_id'),
                            'convocatoria_id' => $convocatoria_id,
                            'plaza_cantidad' => $this->input->post('plaza_cantidad'),
                        );
                        $plaza_id = $this->Plazas_beca_model->add_plazas_beca($paramsplaz);
                    }*/
                    redirect('convocatoria');
                }else{
                    $this->load->model('Gestion_model');
                    $data['all_gestion'] = $this->Gestion_model->get_all_gestion();
                    /*
                    $this->load->model('Requisito_model');
                    $data['all_requisito'] = $this->Requisito_model->get_all_requisito();

                    $this->load->model('Convocatoria_requisito_model');
                    $data['los_requisitos'] = $this->Convocatoria_requisito_model->get_all_requisitos($convocatoria_id);
                    */
                    //$this->load->model('Beca_model');
                    //$data['all_beca'] = $this->Beca_model->get_all_beca();

                    $this->load->model('Estado_model');
                    $tipo = 1;
                    $data['all_estado'] = $this->Estado_model->get_tipo_estado($tipo);

                    $data['_view'] = 'convocatoria/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The convocatoria you are trying to edit does not exist.');
        }
    }

    /*
     * Deleting convocatoria
     */
    /*function remove($convocatoria_id)
    {
        $convocatoria = $this->Convocatoria_model->get_convocatoria($convocatoria_id);

        // check if the convocatoria exists before trying to delete it
        if(isset($convocatoria['convocatoria_id']))
        {
            $this->Convocatoria_model->delete_convocatoria($convocatoria_id);
            redirect('convocatoria/index');
        }
        else
            show_error('The convocatoria you are trying to delete does not exist.');
    }*/
    /* buscar requistos de una convocatoria */
    function get_requisitos()
    {
        //if($this->acceso(103)) {
            if ($this->input->is_ajax_request()) {
                $convocatoria_id = $this->input->post('convocatoria_id');
                $this->load->model('Convocatoria_requisito_model');
                $datos = $this->Convocatoria_requisito_model->get_all_requisitos($convocatoria_id);
                echo json_encode($datos);
            }else{                 
                show_404();
            }
        //}
    }
    /*
     * Modifcar requisistos de una convocatoria
     */
    function modif_requisito($convocatoria_id, $beca_id)
    {
        if($this->acceso(7)) {
            // check if the convocatoria exists before trying to edit it
            $data['convocatoria'] = $this->Convocatoria_model->get_convocatoria($convocatoria_id);

            if(isset($data['convocatoria']['convocatoria_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {
                    $los_requisitos = $this->input->post('requisitos');
                    $this->load->model('Convocatoria_requisito_model');
                    $this->Convocatoria_requisito_model->eliminar_convocatoria_requisito($convocatoria_id, $beca_id);
                    foreach ($los_requisitos as $requisito) {
                        $paramsreq = array(
                            'requisito_id' => $requisito,
                            'convocatoria_id' => $convocatoria_id,
                            'beca_id' => $beca_id,
                        );
                        $convoreq_id = $this->Convocatoria_requisito_model->add_convocatoria_requisito($paramsreq);
                    }
                    redirect('convocatoria/beca_requisito/'.$convocatoria_id);
                }else{
                    $this->load->model('Beca_model');
                    $data['beca'] = $this->Beca_model->get_beca($beca_id);
                    
                    $this->load->model('Requisito_model');
                    $data['all_requisito'] = $this->Requisito_model->get_all_requisito_beca($beca_id);

                    $this->load->model('Convocatoria_requisito_model');
                    $data['los_requisitos'] = $this->Convocatoria_requisito_model->get_all_requisitos($convocatoria_id, $beca_id);

                    $data['_view'] = 'convocatoria/modif_requisito';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The convocatoria you are trying to edit does not exist.');
        }
    }
    /* buscar convocatorias de una gestion */
    function obtener_convocatorias()
    {
        //if($this->acceso(103)) {
            if ($this->input->is_ajax_request()) {
                $gestion_id = $this->input->post('gestion_id');
                $datos = $this->Convocatoria_model->getall_convocatorias_degetion($gestion_id);
                echo json_encode($datos);
            }else{                 
                show_404();
            }
        //}
    }
    /*
     * muestra formulario para añadir nunumero de becas
     */
    function numbeca($convocatoria_id)
    {
        if($this->acceso(5)) {
            $data['convocatoria'] = $this->Convocatoria_model->get_convocatoria($convocatoria_id);
            $this->load->model('Beca_model');
            $data['all_beca'] = $this->Beca_model->get_all_becaconvocatoria($convocatoria_id);

            $data['_view'] = 'convocatoria/numbeca';
            $this->load->view('layouts/main',$data);
        }
    }
    /*
     * registra numero de becas de una convocatoria
     */
    function reg_numbeca($convocatoria_id)
    {
        if($this->acceso(5)) {
            $this->load->model('Plazas_beca_model');
            $this->load->model('Beca_model');
            $all_beca = $this->Beca_model->get_all_becaconvocatoria($convocatoria_id);
            foreach ($all_beca as $beca) {
                $paramsplaz = array(
                    'plaza_cantidad' => $this->input->post('numbeca'.$beca['plaza_id']),
                );
                $this->Plazas_beca_model->update_plazas_beca($beca['plaza_id'],$paramsplaz);
            }
            /*
            $data['convocatoria'] = $this->Convocatoria_model->get_convocatoria($convocatoria_id);
            $this->load->model('Beca_model');
            $data['all_beca'] = $this->Beca_model->get_all_becaconvocatoria($convocatoria_id);
            */
            redirect('convocatoria');
        }
    }
    /*
     * muestra los requisitos de las diferentes becas de una convocatoria
     */
    function beca_requisito($convocatoria_id)
    {
        if($this->acceso(5)) {
            $data['convocatoria'] = $this->Convocatoria_model->get_convocatoria($convocatoria_id);
            //$data['convocatoria_id'] = $convocatoria_id;
            //$this->load->model('Beca_model');
            //$data['all_beca'] = $this->Beca_model->get_all_becaconvocatoria($convocatoria_id);

            $data['_view'] = 'convocatoria/beca_requisito';
            $this->load->view('layouts/main',$data);
        }
    }
    /* buscar becas de una convocatoria */
    function get_becas_deconvocatoria()
    {
        //if($this->acceso(103)) {
            if ($this->input->is_ajax_request()) {
                $convocatoria_id = $this->input->post('convocatoria_id');
                $datos = $this->Convocatoria_model->getall_becas_convocatoria($convocatoria_id);
                echo json_encode($datos);
            }else{                 
                show_404();
            }
        //}
    }
    /* buscar becas de una convocatoria */
    function obtener_becas()
    {
        //if($this->acceso(103)) {
            if ($this->input->is_ajax_request()) {
                $convocatoria_id = $this->input->post('convocatoria_id');
                $datos = $this->Convocatoria_model->getall_becas_convocatoria($convocatoria_id);
                echo json_encode($datos);
            }else{                 
                show_404();
            }
        //}
    }
    
    /*
     * Adding a new documento upsi
     */
    function docupsi($convocatoria_id)
    {
        if($this->acceso(5)) {
            $data['convocatoria'] = $this->Convocatoria_model->get_convocatoria($convocatoria_id);
            if(isset($_POST) && count($_POST) > 0)     
            {
                /* *********************INICIO imagen***************************** */
                $foto="";
                if (!empty($_FILES['convocatoria_docupsi']['name'])){

                    $this->load->library('image_lib');
                    $config['upload_path'] = './resources/images/convocatoriaupsi/';
                    $img_full_path = $config['upload_path'];

                    //$config['allowed_types'] = 'gif|jpeg|jpg|png';
                    $config['allowed_types'] = '*';
                    $config['image_library'] = 'gd2';
                    $config['max_size'] = 0;
                    $config['max_width'] = 0;
                    $config['max_height'] = 0;

                    $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                    $config['file_name'] = $new_name; //.$extencion;
                    $config['file_ext_tolower'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('convocatoria_docupsi');

                    $img_data = $this->upload->data();
                    $extension = $img_data['file_ext'];
                    /* ********************INICIO para resize***************************** */
                    if ($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                        $conf['image_library'] = 'gd2';
                        $conf['source_image'] = $img_data['full_path'];
                        $conf['new_image'] = './resources/images/convocatoriaupsi/';
                        $conf['maintain_ratio'] = TRUE;
                        $conf['create_thumb'] = FALSE;
                        $conf['width'] = 800;
                        $conf['height'] = 600;
                        $this->image_lib->clear();
                        $this->image_lib->initialize($conf);
                        if(!$this->image_lib->resize()){
                            echo $this->image_lib->display_errors('','');
                        }
                        $confi['image_library'] = 'gd2';
                        $confi['source_image'] = './resources/images/convocatoriaupsi/'.$new_name.$extension;
                        $confi['new_image'] = './resources/images/convocatoriaupsi/'."thumb_".$new_name.$extension;
                        $confi['create_thumb'] = FALSE;
                        $confi['maintain_ratio'] = TRUE;
                        $confi['width'] = 100;
                        $confi['height'] = 100;

                        $this->image_lib->clear();
                        $this->image_lib->initialize($confi);
                        $this->image_lib->resize();
                    }
                    /* ********************F I N  para resize***************************** */


                    $foto = $new_name.$extension;
                }
                /* *********************FIN imagen***************************** */
                $params = array(
                    'convocatoria_docupsi' => $foto,
                );
                $this->Convocatoria_model->update_convocatoria($convocatoria_id,$params);
                
                redirect('convocatoria');
            }else{
                $data['_view'] = 'convocatoria/docupsi';
                $this->load->view('layouts/main',$data);
            }
        }
    }
    
    /*
     * Editing a convocatoria
     */
    function modifdocupsi($convocatoria_id)
    {
        if($this->acceso(6)) {
            // check if the convocatoria exists before trying to edit it
            $data['convocatoria'] = $this->Convocatoria_model->get_convocatoria($convocatoria_id);
            if(isset($data['convocatoria']['convocatoria_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {
                    /* *********************INICIO imagen***************************** */
                    $foto="";
                        $foto1= $this->input->post('convocatoria_docupsi1');
                    if (!empty($_FILES['convocatoria_docupsi']['name']))
                    {
                        $this->load->library('image_lib');
                        $config['upload_path'] = './resources/images/convocatoriaupsi/';
                        //$config['allowed_types'] = 'gif|jpeg|jpg|png';
                        $config['allowed_types'] = '*';
                        $config['max_size'] = 0;
                        $config['max_width'] = 0;
                        $config['max_height'] = 0;

                        $new_name = time();
                        $config['file_name'] = $new_name; //.$extencion;
                        $config['file_ext_tolower'] = TRUE;

                        $this->load->library('upload', $config);
                        $this->upload->do_upload('convocatoria_docupsi');

                        $img_data = $this->upload->data();
                        $extension = $img_data['file_ext'];
                        /* ********************INICIO para resize***************************** */
                        if($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                            $conf['image_library'] = 'gd2';
                            $conf['source_image'] = $img_data['full_path'];
                            $conf['new_image'] = './resources/images/convocatoriaupsi/';
                            $conf['maintain_ratio'] = TRUE;
                            $conf['create_thumb'] = FALSE;
                            $conf['width'] = 800;
                            $conf['height'] = 600;
                            $this->image_lib->clear();
                            $this->image_lib->initialize($conf);
                            if(!$this->image_lib->resize()){
                                echo $this->image_lib->display_errors('','');
                            }

                            $confi['image_library'] = 'gd2';
                            $confi['source_image'] = './resources/images/convocatoriaupsi/'.$new_name.$extension;
                            $confi['new_image'] = './resources/images/convocatoriaupsi/'."thumb_".$new_name.$extension;
                            $confi['create_thumb'] = FALSE;
                            $confi['maintain_ratio'] = TRUE;
                            $confi['width'] = 100;
                            $confi['height'] = 100;

                            $this->image_lib->clear();
                            $this->image_lib->initialize($confi);
                            $this->image_lib->resize();
                        }
                        /* ********************F I N  para resize***************************** */
                        $directorio = FCPATH.'resources\images\convocatoriaupsi\\';
                        if(isset($foto1) && !empty($foto1)){
                          if(file_exists($directorio.$foto1)){
                              unlink($directorio.$foto1);
                              $mimagenthumb = "thumb_".$foto1;
                              //$mimagenthumb = str_replace(".", "_thumb.", $foto1);
                              if($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                                  unlink($directorio.$mimagenthumb);
                              }
                          }
                      }
                        $foto = $new_name.$extension;
                    }else{
                        $foto = $foto1;
                    }
                    $params = array(
                        'convocatoria_docupsi' => $foto,
                    );
                    $this->Convocatoria_model->update_convocatoria($convocatoria_id,$params);
                    
                    redirect('convocatoria');
                }else{
                    $data['_view'] = 'convocatoria/modifdocupsi';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The convocatoria you are trying to edit does not exist.');
        }
    }
}
