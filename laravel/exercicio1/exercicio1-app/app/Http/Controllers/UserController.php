<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Listar usuarios
    public function index(){

        //Recuperar os registros do banco de dados
        $users = User::get();

        //retorna a view
        return view('users.index', ['users' => $users]);
    }
    //importa os dados do Excel
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:2048',
        ],[
            'file.required' => 'Por favor, selecione uma imagem!',
            'file.mimes' => 'Arquivo invalido, necessario arquivo csv ou txt.',
            'file.max' => 'Tamanho do arquivoce excede :max Mb.'
        ]);
        //Criar array com as colunas do db
    }
}
