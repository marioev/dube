<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Comision_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get comision by comision_id
     */
    function get_comision($comision_id)
    {
        return $this->db->get_where('comision',array('comision_id'=>$comision_id))->row_array();
    }
        
    /*
     * Get all comision
     */
    function get_all_comision($filtrar, $filtro)
    {
        $comision = $this->db->query("
            SELECT
                c.*, co.convocatoria_titulo, g.gestion_descripcion, e.estado_color, e.estado_descripcion
            FROM
                `comision` c
            left join gestion g on c.gestion_id = g.gestion_id
            left join convocatoria co on c.convocatoria_id = co.convocatoria_id
            left join estado e on c.estado_id = e.estado_id
            WHERE
                1 = 1
                and(c.comision_nombre like '%".$filtrar."%' or c.comision_descripcion like '%".$filtrar."%')
                ".$filtro." 
            ORDER BY `c`.`comision_nombre` asc
        ")->result_array();

        return $comision;
        /*$this->db->order_by('comision_id', 'desc');
        return $this->db->get('comision')->result_array();*/
    }
        
    /*
     * function to add new comision
     */
    function add_comision($params)
    {
        $this->db->insert('comision',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update comision
     */
    function update_comision($comision_id,$params)
    {
        $this->db->where('comision_id',$comision_id);
        return $this->db->update('comision',$params);
    }
    
    /*
     * function to delete comision
     */
    function delete_comision($comision_id)
    {
        return $this->db->delete('comision',array('comision_id'=>$comision_id));
    }
}
