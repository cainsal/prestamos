<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name     = 'Agente BCP 1';
        $user->dni      = '15600000';
        $user->email    = 'bcp1@gmail.com';
        $user->password = Hash::make('12345');	
        $user->rol      = 'Bancario';
        $user->id_banco = 1;
        $user->save();

        $user = new User();
        $user->name     = 'Agente BCP 2';
        $user->dni      = '15686000';
        $user->email    = 'bcp2@gmail.com';
        $user->password = Hash::make('12345');	
        $user->rol      = 'Bancario';
        $user->id_banco = 1;
        $user->save();

        $user = new User();
        $user->name     = 'Agente Interbank 1';
        $user->dni      = '15566998';
        $user->email    = 'inter1@gmail.com';
        $user->password = Hash::make('12345');	
        $user->rol      = 'Bancario';
        $user->id_banco = 2;
        $user->save();
        
        $user = new User();
        $user->name     = 'Agente Interbank 2';
        $user->dni      = '1556612';
        $user->email    = 'inter2@gmail.com';
        $user->password = Hash::make('12345');	
        $user->rol      = 'Bancario';
        $user->id_banco = 2;
        $user->save();

        $user = new User();
        $user->name     = 'Administrador';
        $user->dni      = null;
        $user->email    = 'admin@gmail.com';
        $user->password = Hash::make('12345');	
        $user->rol      = 'Administrador';
        $user->save();
    }
}
