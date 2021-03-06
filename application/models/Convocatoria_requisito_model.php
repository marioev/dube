<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Convocatoria_requisito_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get convocatoria_requisito by convoreq_id
     */
    function get_convocatoria_requisito($convoreq_id)
    {
        return $this->db->get_where('convocatoria_requisito',array('convoreq_id'=>$convoreq_id))->row_array();
    }
        
    /*
     * Get all convocatoria_requisito
     */
    function get_all_convocatoria_requisito()
    {
        $this->db->order_by('convoreq_id', 'desc');
        return $this->db->get('convocatoria_requisito')->result_array();
    }
        
    /*
     * function to add new convocatoria_requisito, selo usa en nueva convocatoria
     */
    function add_convocatoria_requisito($params)
    {
        $this->db->insert('convocatoria_requisito',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update convocatoria_requisito
     */
    function update_convocatoria_requisito($convoreq_id,$params)
    {
        $this->db->where('convoreq_id',$convoreq_id);
        return $this->db->update('convocatoria_requisito',$params);
    }
    
    /*
     * function to delete convocatoria_requisito
     */
    function delete_convocatoria_requisito($convoreq_id)
    {
        return $this->db->delete('convocatoria_requisito',array('convoreq_id'=>$convoreq_id));
    }
    /*
     * Get todos los requisitos de una convocatoria
     */
    function get_all_requisitos($convocatoria_id)
    {
        $requisito = $this->db->query("
            SELECT
                cr.convoreq_id, cr.requisito_id, r.requisito_nombre, cr.beca_id
            FROM
                `convocatoria_requisito` cr
            left join requisito r on cr.requisito_id = r.requisito_id
            WHERE
                cr.convocatoria_id = $convocatoria_id

            ORDER BY r.requisito_nombre ASC
        ")->result_array();

        return $requisito;
    }
    /*
     * function to delete convocatoria_requisito de una convocatoria
     */
    function eliminar_convocatoria_requisito($convocatoria_id)
    {
        return $this->db->delete('convocatoria_requisito',array('convocatoria_id'=>$convocatoria_id));
    }
}
