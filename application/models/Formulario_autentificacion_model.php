<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Formulario_autentificacion_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get formulario_autentificacion by formulario_id
     */
    function get_formulario_autentificacion($formulario_id)
    {
        return $this->db->get_where('formulario_autentificacion',array('formulario_id'=>$formulario_id))->row_array();
    }
        
    /*
     * Get all formulario_autentificacion
     */
    function get_all_formulario_autentificacion()
    {
        $this->db->order_by('formulario_id', 'desc');
        return $this->db->get('formulario_autentificacion')->result_array();
    }
        
    /*
     * function to add new formulario_autentificacion
     */
    function add_formulario_autentificacion($params)
    {
        $this->db->insert('formulario_autentificacion',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update formulario_autentificacion
     */
    function update_formulario_autentificacion($formulario_id,$params)
    {
        $this->db->where('formulario_id',$formulario_id);
        return $this->db->update('formulario_autentificacion',$params);
    }
    
    /*
     * function to delete formulario_autentificacion
     */
    function delete_formulario_autentificacion($formulario_id)
    {
        return $this->db->delete('formulario_autentificacion',array('formulario_id'=>$formulario_id));
    }
    /*
     * function to delete formulario_autentificacion de un postulante
     */
    function delete_formulario_postulante($postulante_id)
    {
        return $this->db->delete('formulario_autentificacion',array('postulante_id'=>$postulante_id));
    }
    /*
     * Get all formulario_autentificacion de un postulante
     */
    function get_all_formulario_postulante($postulante_id)
    {
        $formulario = $this->db->query("
            SELECT
                f.*, r.requisito_nombre, e.estado_descripcion, e.estado_color
            FROM
                `formulario_autentificacion` f
            left join convocatoria_requisito cr on f.convoreq_id = cr.convoreq_id
            left join requisito r on cr.requisito_id = r.requisito_id
            left join estado e on f.estado_id = e.estado_id
            WHERE
                f.postulante_id = $postulante_id
            group by cr.`convoreq_id`
            ORDER BY r.requisito_nombre ASC
        ")->result_array();

        return $formulario;
        
        
        $this->db->order_by('formulario_id', 'desc');
        return $this->db->get('formulario_autentificacion')->result_array();
    }
}
