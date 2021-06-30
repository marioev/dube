<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Comision_administrativo_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * function to add new comision_administrativo
     */
    function add_comision_administrativo($params)
    {
        $this->db->insert('comision_administrativo',$params);
        return $this->db->insert_id();
    }
    
    /*
     * Get all adminsitrativos de una comisión
     */
    function get_all_comisionadministrativo($comision_id)
    {
        $comision = $this->db->query("
            SELECT
                ca.admin_id, a.admin_nombre, a.admin_apellido, c.cargo_nombre, du.direccionuniv_nombre
            FROM
                `comision_administrativo` ca
            left join administrativo a on ca.admin_id = a.admin_id
            left join cargo c on a.cargo_id = c.cargo_id
            left join direccion_universitaria du on a.direccionuniv_id = du.direccionuniv_id
            WHERE
                ca.comision_id = $comision_id
            ORDER BY a.`admin_apellido` ASC, a.`admin_nombre` ASC
        ")->result_array();

        return $comision;
    }
    /*
     * function to delete comision_administrativo
     */
    function delete_comision_administrativo($comision_id)
    {
        return $this->db->delete('comision_administrativo',array('comision_id'=>$comision_id));
    }
}
