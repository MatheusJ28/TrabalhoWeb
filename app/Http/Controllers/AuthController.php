<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    //Método para fazer login
    public function login(){
        return view('login');
    }

    public function loginSubmit(Request $request){
        // Validação
        // dd($request);

        $request->validate([
            'text_username' => 'required|email',
            'text_password' => 'required|min:6|max:12',
        ],
        [
            //Mensagem para username
            'text_username.required' => 'O campo de e-mail é obrigatório!',
            'text_username.email' => 'O campo de e-mail deve conter um endereço válido!',

            'text_password.required' => 'A senha é obrigatória!',
            'text_password.min' => 'A senha deve ter pelo menos :min caracteres',
            'text_password.max' => 'A senha deve ter no máximo :max caracteres',
        ]
    );

        $username = $request->input('text_username');
        $password = $request->input('text_password');
        // return "OK";
        // echo "Usuário: " .$username . "<br>";
        // echo "Password: " .$password;

        // try{
        //     DB::connection()->getPdo();
        //     echo "Conexão feita com sucesso!";
        // } catch(\PDOException $e){
        //     echo "A conexão falhou: " . $e->getMessage();
        // }

        // $usuarios = User::all()->toArray();
        // echo '<pre>';
        // print_r($usuarios);
        // echo '</pre>';

        //Testar se o usuario é válido
        $usuario = User::where('username',$username)
                        ->whereNull('deleted_at')
                        ->first();
        if(!$usuario){
            return redirect()->back()
                ->withInput() //preservar os dados
                ->with('login_error','Username ou password incorretos.');
        }
        echo '<pre>';
        print_r($usuario);
        echo '</pre>';

    }

    //Método para fazer logout
    public function logout(){
        echo 'logout';
    }
}
