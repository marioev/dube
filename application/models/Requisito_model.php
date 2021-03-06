<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Requisito_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get requisito by requisito_id
     */
    function get_requisito($requisito_id)
    {
        return $this->db->get_where('requisito',array('requisito_id'=>$requisito_id))->row_array();
    }
        
    /*
     * Get all requisito
     */
    function get_all_requisito()
    {
        $this->db->order_by('requisito_nombre', 'asc');
        return $this->db->get('requisito')->result_array();
    }
        
    /*
     * function to add new requisito
     */
    function add_requisito($params)
    {
        $this->db->insert('requisito',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update requisito
     */
    function update_requisito($requisito_id,$params)
    {
        $this->db->where('requisito_id',$requisito_id);
        return $this->db->update('requisito',$params);
    }
    
    /*
     * function to delete requisito
     */
    function delete_requisito($requisito_id)
    {
        return $this->db->delete('requisito',array('requisito_id'=>$requisito_id));
    }
}
