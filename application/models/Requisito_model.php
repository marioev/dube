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
        $requisito = $this->db->query("
            SELECT
                r.*, b.beca_nombre, e.estado_descripcion, e.estado_color
            FROM
                `requisito` r
            left join beca b on r.beca_id = b.beca_id
            left join estado e on r.estado_id = e.estado_id
            ORDER BY `requisito_nombre` ASC
        ")->result_array();
        
        return $requisito;
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
    /*
     * Get all requisitos de una Beca
     */
    function get_all_requisito_beca($beca_id)
    {
        $requisito = $this->db->query("
            SELECT
                r.*, b.beca_nombre, e.estado_descripcion, e.estado_color
            FROM
                `requisito` r
            left join beca b on r.beca_id = b.beca_id
            left join estado e on r.estado_id = e.estado_id
            WHERE
                r.beca_id = 0 or r.beca_id = $beca_id
            ORDER BY `requisito_nombre` ASC
        ")->result_array();
        
        return $requisito;
    }
    /*
     * Get all requisito activo
     */
    function get_all_requisitoactivo()
    {
        $requisito = $this->db->query("
            SELECT
                r.*, b.beca_nombre, e.estado_descripcion, e.estado_color
            FROM
                `requisito` r
            left join beca b on r.beca_id = b.beca_id
            left join estado e on r.estado_id = e.estado_id
            WHERE
            r.estado_id = 9
            ORDER BY `requisito_nombre` ASC
        ")->result_array();
        
        return $requisito;
    }
}
