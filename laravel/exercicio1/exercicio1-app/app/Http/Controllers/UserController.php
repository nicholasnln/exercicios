<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
        $headers = ['name', 'email', 'password'];

        //Ler os dados e converte em array
        $dataFile = array_map('str_getcsv', file($request->file('file')));

        //cria variavel pra receber a quantidade de registros
        $numbersRegistered = 0;

        //cria a variavele inicializa como falso
        $emailAlreadyRegistered = false;

        //percorrer as linhas desse arquivo
        foreach ($dataFile as $keyData => $row) {

            //converter as linhas do array
            $values = explode(';', $row[0]);

            //pecorrer as colunas do header
            foreach ($headers as $key => $header) {

                //atribui o valor ao elemento array
                $arrayValues[$keyData][$header] = $values[$key];


                if ($header == "email"){
                    if (User::where('email', $values[$key])->first()) {

                        //atribui o valor ao elemento do array
                        $emailAlreadyRegistered .= $values[$key]. ", ";
                    }


                }

                if ($header == "password"){

                    //criptrografa senha
                    $arrayValues[$keyData][$header] = Hash::make(Str::random(8),
                        ['rounds' => 12]);
                }

                //atribuir valor ao elemento array
                //$arrayValues[$keyData][$header] = $values[$key];


            }
            $numbersRegistered++;
        }

        //Verifica se existe email cadastrado, se sim retorna erro e não cadastra no db
        if ($emailAlreadyRegistered == true){

            //redireciona usuario para pagina anterior e mostrar mensagem de erro
            return back()->with('error', 'Dados não importados. Existem e-mails já cadastrados.:  <br> ' .
             $emailAlreadyRegistered);
        }

        //Cadastra registros no db
        User::insert($arrayValues);

        //redireciona usuario para pagina anterior e mostrar mensagem de sucesso
        return back()->with('success', 'Importado com sucesso! <br>Quantidade: ' .
        $numbersRegistered);

    }
}
