<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Compromiso_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get compromiso by compromiso_id
     */
    function get_compromiso($compromiso_id)
    {
        return $this->db->get_where('compromiso',array('compromiso_id'=>$compromiso_id))->row_array();
    }
        
    /*
     * Get all compromiso
     */
    function get_all_compromiso()
    {
        $compromiso = $this->db->query("
            SELECT
                c.*, e.estado_descripcion, e.estado_color
            FROM
                `compromiso` c
            left join estado e on c.estado_id = e.estado_id
            ORDER BY c.`compromiso_id` DESC
        ")->result_array();

        return $compromiso;
    }
        
    /*
     * function to add new compromiso
     */
    function add_compromiso($params)
    {
        $this->db->insert('compromiso',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update compromiso
     */
    function update_compromiso($compromiso_id,$params)
    {
        $this->db->where('compromiso_id',$compromiso_id);
        return $this->db->update('compromiso',$params);
    }
    
    /*
     * function to delete compromiso
     */
    function delete_compromiso($compromiso_id)
    {
        return $this->db->delete('compromiso',array('compromiso_id'=>$compromiso_id));
    }
}