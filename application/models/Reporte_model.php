<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Reporte_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    /*
     * Get all solicitud_unidades
     */
    function get_all_solicitud_unidad($gestion_id, $unidad_id)
    {
        $filtro = "";
        if($gestion_id != 0){
            $filtro = " and s.gestion_id = ".$gestion_id;
        }
        if($unidad_id != 0){
            $filtro = $filtro." and s.unidad_id = ".$unidad_id;
        }
        $solicitud_unidad = $this->db->query("
            SELECT
                s.*, u.unidad_nombre, u.unidad_responsable,
                count(`ud`.`solunidad_id`) as becarios_aceptados,
                (s.`solicitud_cantidad_becarios` - count(`ud`.`solunidad_id`)) as cantidad_disponible
            FROM
                `solicitud_unidades` s
            left join unidad u on s.unidad_id = u.unidad_id
            left join `solunidad_postulante` ud on s.solicitud_id = ud.solicitud_id
            WHERE
                1 = 1
                ".$filtro."
            group by s.solicitud_id
            ORDER BY s.`solicitud_id` DESC
            



/*
            SELECT
                s.*, g.gestion_descripcion, u.unidad_nombre, u.unidad_responsable,
                (s.`solicitud_cantidad_becarios` - count(`ud`.`solunidad_id`)) as cantidad_disponible
            FROM
                `solicitud_unidades` s
            left join gestion g on s.gestion_id = g.gestion_id
            left join unidad u on s.unidad_id = u.unidad_id
            left join `solunidad_postulante` ud on s.solicitud_id = ud.solicitud_id
            WHERE
                s.gestion_id = $gestion_id
            group by s.solicitud_id
            ORDER BY s.`solicitud_id` DESC*/
            
        ")->result_array();

        return $solicitud_unidad;
    }
    /*
     * Get all postulantes
     */
    function get_all_postulante($gestion_id, $convocatoria_id, $beca_id, $estado_id)
    {
        $filtro = "";
        if($gestion_id != 0){
            $filtro = " and c.gestion_id = ".$gestion_id;
        }
        if($convocatoria_id != 0){
            $filtro = $filtro." and pb.convocatoria_id = ".$convocatoria_id;
        }
        if($beca_id != 0){
            $filtro = $filtro." and b.beca_id = ".$beca_id;
        }
        if($estado_id != 0){
            $filtro = $filtro." and p.estado_id = ".$estado_id;
        }
        $postulante = $this->db->query("
            SELECT
                p.*, e.`estudiante_nombre`, e.`estudiante_apellidos`, e.estudiante_carrera,
                e.`estudiante_celular`, e.`estudiante_telefono`, e.`estudiante_email`,
                es.`estado_descripcion`, es.`estado_color`, b.beca_nombre
            FROM
                `postulante` p
            left join `estudiante` as e on p.estudiante_id = e.estudiante_id
            left join `plazas_becas` as pb on p.plaza_id = pb.plaza_id
            left join `convocatoria` as c on pb.convocatoria_id = c.convocatoria_id
            left join `beca` as b on pb.beca_id = b.beca_id
            left join `gestion` as g on c.gestion_id = g.gestion_id
            left join `estado` as es on p.estado_id = es.estado_id
            WHERE
                1 = 1
                ".$filtro."
            ORDER BY e.`estudiante_apellidos` ASC, e.`estudiante_nombre` ASC
        ")->result_array();

        return $postulante;
    }
    /*
     * Get all postulantes
     */
    function get_all_administrativo($cargo_id)
    {
        $filtro = "";
        if($cargo_id != 0){
            $filtro = " and a.cargo_id = ".$cargo_id;
        }
        $postulante = $this->db->query("
            SELECT
                a.*, e.`estado_descripcion`, e.`estado_color`
            FROM
                `administrativo` a
            left join `estado` as e on a.estado_id = e.estado_id
            WHERE
                1 = 1
                ".$filtro."
            ORDER BY a.`admin_apellido` ASC, a.`admin_nombre` ASC
        ")->result_array();

        return $postulante;
    }
    /*
     * obtiene postulantes de que trabajaran en una unidad
     */
    function get_all_postulante_unidad($gestion_id, $unidad_id)
    {
        $filtro = "";
        if($gestion_id != 0){
            $filtro = " and s.gestion_id = ".$gestion_id;
        }
        if($unidad_id != 0){
            $filtro = $filtro." and s.unidad_id = ".$unidad_id;
        }
        $solicitud_unidad = $this->db->query("
            SELECT
                s.*, u.unidad_nombre, u.unidad_responsable,
                e.`estudiante_apellidos`, e.`estudiante_nombre`,
                ud.solunidad_inicio, ud.solunidad_fin
            FROM
                `solicitud_unidades` s
            left join unidad u on s.unidad_id = u.unidad_id
            left join `solunidad_postulante` ud on s.solicitud_id = ud.solicitud_id
            left join postulante p on ud.postulante_id = p.postulante_id
            left join estudiante e on p.estudiante_id = e.estudiante_id
            WHERE
                1 = 1
                ".$filtro."
            ORDER BY e.`estudiante_apellidos` ASC, e.`estudiante_nombre` ASC
            
        ")->result_array();

        return $solicitud_unidad;
    }
    /*
     * Get all becarios de una unidad solicitante
     */
    function get_all_becariosolicitud_unidad($solicitud_id)
    {
        $solicitud_unidad = $this->db->query("
            SELECT
                sp.*, e.estudiante_nombre, e.estudiante_apellidos
            FROM
                `solunidad_postulante` sp
            left join postulante p on sp.postulante_id = p.postulante_id
            left join `estudiante` e on p.estudiante_id = e.estudiante_id
            WHERE
                sp.solicitud_id = $solicitud_id
            ORDER BY e.`estudiante_apellidos` asc, e.`estudiante_nombre` asc
        ")->result_array();
        return $solicitud_unidad;
    }
    
}
