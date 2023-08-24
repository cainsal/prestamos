<?php

use Illuminate\Database\Seeder;
use App\Parametros;

class ParametrosBancos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $para= new Parametros();
        $para->nombre='BCP';
        $para->descripcion='BCP';
        $para->codigo='Banco';
        $para->user_crea=0;	
        $para->user_update=0;
        $para->save();

        $para= new Parametros();
        $para->nombre='Interbank';
        $para->descripcion='Interbank';
        $para->codigo='Banco';
        $para->user_crea=0;	
        $para->user_update=0;
        $para->save();

        $para= new Parametros();
        $para->nombre='BBVA';
        $para->descripcion='BBVA';
        $para->codigo='Banco';
        $para->user_crea=0;	
        $para->user_update=0;
        $para->save();

        $para= new Parametros();
        $para->nombre='BANCO SANTANDER';
        $para->descripcion='BANCO SANTANDER';
        $para->codigo='Banco';
        $para->user_crea=0;	
        $para->user_update=0;
        $para->save();

        $para= new Parametros();
        $para->nombre='BANCO RIPLEY';
        $para->descripcion='BANCO RIPLEY';
        $para->codigo='Banco';
        $para->user_crea=0;	
        $para->user_update=0;
        $para->save();

        $para= new Parametros();
        $para->nombre='FINANCIERA EFECTIVA';
        $para->descripcion='FINANCIERA EFECTIVA';
        $para->codigo='Banco';
        $para->user_crea=0;	
        $para->user_update=0;
        $para->save();

        $para= new Parametros();
        $para->nombre='CAJA PRYMERA';
        $para->descripcion='CAJA PRYMERA';
        $para->codigo='Banco';
        $para->user_crea=0;	
        $para->user_update=0;
        $para->save();
        
        $para= new Parametros();
        $para->nombre='Préstamos Personales';
        $para->descripcion='Préstamos Personales';
        $para->codigo='Prestamo';
        $para->user_crea=0;	
        $para->user_update=0;
        $para->save();

        $para= new Parametros();
        $para->nombre='Créditos Vehiculares';
        $para->descripcion='Créditos Vehiculares';
        $para->codigo='Prestamo';
        $para->user_crea=0;	
        $para->user_update=0;
        $para->save();
        
        $para= new Parametros();
        $para->nombre='Créditos Hipotecarios';
        $para->descripcion='Créditos Hipotecarios';
        $para->codigo='Prestamo';
        $para->user_crea=0;	
        $para->user_update=0;
        $para->save();
        
        $para= new Parametros();
        $para->nombre='Tarjetas de Crédito';
        $para->descripcion='Tarjetas de Crédito';
        $para->codigo='Prestamo';
        $para->user_crea=0;	
        $para->user_update=0;
        $para->save();

        $para= new Parametros();
        $para->nombre='Compra de Deuda';
        $para->descripcion='Compra de Deuda';
        $para->codigo='Prestamo';
        $para->user_crea=0;	
        $para->user_update=0;
        $para->save();
    }
}