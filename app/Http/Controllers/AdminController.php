<?php

namespace App\Http\Controllers;

use App\Parametros;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Redirect;

use Illuminate\Support\Facades\Mail;
use App\Mail\RegistroUsuario;

class AdminController extends Controller
{
    public function getAllUserList(){
        $userList = User::where('rol', '=', 'Bancario')->paginate(10);

        return view('admin/Listado-user', [
            'userList' => $userList
        ]);
    }

    public function registerForm(){
        $bancos = Parametros::where('codigo', 'Banco')->get();

        return view('admin/Registrar-user', [
            'bancos' => $bancos
        ]);
    }

    public function updateForm($id){
        $bancos = Parametros::where('codigo', 'Banco')->get();

        $user = User::find($id);

        return view('admin/Actualizar-user', [
            'bancos' => $bancos,
            'usuario' => $user
        ]);
    }

    public function updateUser(UpdateUserRequest $request){
        $post = $request->only('id' ,'name', 'email', 'dni', 'banco','passwordUp');

        $storeUser = User::find($post['id']);
        $storeUser->name = $post['name'];
        $storeUser->email = $post['email'];
        $storeUser->dni = $post['dni'];
        $storeUser->id_banco = $post['banco'];

        if($post['passwordUp']!=null){
            $storeUser->password = Hash::make($post['passwordUp']);
        }

        if($storeUser->save() && $post['passwordUp']!=null){
            Mail::mailer('miyunta')->to($storeUser->email)->send(new RegistroUsuario($post['passwordUp'], $storeUser,"Cambio de password",true));
        }
        
        return Redirect::route('listadoUsuarios');
    }

    public function storeUser(CreateUserRequest $request){
        $post = $request->only('name', 'email', 'dni', 'banco');

        $password = Str::random(8);
        $storeUser = new User();
        $storeUser->name = $post['name'];
        $storeUser->email = $post['email'];
        $storeUser->id_banco = $post['banco'];
        $storeUser->dni = $post['dni'];
        $storeUser->rol = 'Bancario';
        $storeUser->password = Hash::make($password);
        if($storeUser->save()){
            Mail::mailer('miyunta')->to($storeUser->email)->send(new RegistroUsuario($password, $storeUser));
        }

        return Redirect::route('listadoUsuarios');
    }
}
