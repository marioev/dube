<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Seguimiento_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get seguimiento de un postulante_id
     */
    function get_seguimiento($seguimiento_id)
    {
        $seguimiento = $this->db->query("
            SELECT
                s.*
            FROM
                `seguimiento` s
            WHERE
                s.seguimiento_id = $seguimiento_id
        ")->row_array();
        return $seguimiento;
    }
    
    /*
     * Get seguimientos de un postulante_id
     */
    function get_seguimientos($postulante_id)
    {
        $postulante = $this->db->query("
            SELECT
                s.*
            FROM
                `seguimiento` s
            WHERE
                s.postulante_id = $postulante_id
            order by s.seguimiento_id
        ")->result_array();
        return $postulante;
    }
    
    /*
     * function to add new seguimiento de postulante
     */
    function add_seguimiento($params)
    {
        $this->db->insert('seguimiento',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update seguimiento
     */
    function update_seguimiento($seguimiento_id,$params)
    {
        $this->db->where('seguimiento_id',$seguimiento_id);
        return $this->db->update('seguimiento',$params);
    }
}
