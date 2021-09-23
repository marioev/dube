<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Modelo_contrato_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get modelo_contrato by modeloc_id
     */
    function get_modelo_contrato($modeloc_id)
    {
        return $this->db->get_where('modelo_contrato',array('modeloc_id'=>$modeloc_id))->row_array();
    }
        
    /*
     * Get all modelo_contrato
     */
    function get_all_modelo_contrato()
    {
        $modelo_contrato = $this->db->query("
            SELECT
                mc.*, b.beca_nombre
            FROM
                `modelo_contrato` mc
            left join beca b on mc.beca_id = b.beca_id
            ORDER BY b.`beca_nombre` DESC
        ")->result_array();

        return $modelo_contrato;
    }
        
    /*
     * function to add new modelo_contrato
     */
    function add_modelo_contrato($params)
    {
        $this->db->insert('modelo_contrato',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update modelo_contrato
     */
    function update_modelo_contrato($modeloc_id,$params)
    {
        $this->db->where('modeloc_id',$modeloc_id);
        return $this->db->update('modelo_contrato',$params);
    }
    
    /*
     * function to delete modelo_contrato
     */
    /*function delete_modelo_contrato($modeloc_id)
    {
        return $this->db->delete('modelo_contrato',array('modeloc_id'=>$modeloc_id));
    }*/
    /*
     * Get modelo_contrato de una beca
     */
    function get_modelocontrato_beca($beca_id)
    {
        return $this->db->get_where('modelo_contrato',array('beca_id'=>$beca_id))->row_array();
    }
}
