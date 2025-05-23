<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $filiable = [
        'prov_cuit',
        'prov_nombre',
        'prov_telefono',
        'prov_direccion'
    ];

    public static function listar_proeedores(){
        return $result = DB::table('proveedors as prov')
            ->select(
                'prov.prov_cuit',
                'prov.prov_nombre',
                'prov.prov_telefono',
                'prov.prov_direccion'
            )
            ->paginate(5);
    }

    public static function agregar_prestador($cuit,$nombre,$telefono,$direccion){   
        if(is_array($nombre) && !empty($nombre)){
            $nombre = $nombre['nombre'];
        }else{
            $nombre = (string) $nombre;
        }

        if(is_array($direccion) && !empty($direccion)){
            $direccion = $direccion['direccion'];
        }else{
            $direccion = (string) $direccion;
        }

        return Proveedor::insert([
            'proveedors.prov_cuit'=>$cuit,
            'proveedors.prov_nombre'=>strtoupper($nombre),
            'proveedors.prov_telefono'=>$telefono,
            'proveedors.prov_direccion'=>strtoupper($direccion)
        ]);
    }

    public static function modificiar_proveedor($id, $cuit,$nombre,$telefono,$direccion){
        return Proveedor::where('id',$ide)
            ->update([
                'proveedors.prov_cuit'=>$cuit,
                'proveedors.prov_nombre'=>strtoupper($nombre),
                'proveedors.prov_telefono'=>$telefono,
                'proveedors.prov_direccion'=>strtoupper($direccion)
            ]);
    }

    public static function eliminar_proveedor($id){
        return Proveedor::where('id',$id)
            ->delete();
    }

    public static function buscar_proeedor(){
        return $result = DB::table('proveedors as prov')
            ->select(
                'prov.prov_cuit',
                'prov.prov_nombre',
                'prov.prov_telefono',
                'prov.prov_direccion'
            )
            ->paginate(5);
    }
}
