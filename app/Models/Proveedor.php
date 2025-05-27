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

    public static function listar_proveedores(){
        return $result = Proveedor::select(
                'proveedors.prov_cuit',
                'proveedors.prov_nombre',
                'proveedors.prov_telefono',
                'proveedors.prov_direccion'
            )
            ->paginate(5);
    }

    public static function agregar_proveedor($cuit,$nombre,$telefono,$direccion){   
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

    public static function buscar_proeedor($id){
        return $result = Proveedor::where('id',$id)    
            ->select(
                    'proveedors.prov_cuit',
                    'proveedors.prov_nombre',
                    'proveedors.prov_telefono',
                    'proveedors.prov_direccion'
                )
            ->paginate(5);
    }
}
