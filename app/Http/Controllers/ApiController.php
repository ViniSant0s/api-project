<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empresa;
use App\Models\Admin;
use App\Models\Pagamento;

class ApiController extends Controller
{
    public function getAllEmpresas() {
      $empresa = Empresa::get()->toJson(JSON_PRETTY_PRINT);
      return response($empresa, 200);
    }
  
    public function createEmpresa(Request $request) {
      $empresa = new Empresa();
      $empresa->CNPJ = $request->CNPJ;
      $empresa->Razao_Social = $request->razaoSocial;
      $empresa->Nome_fantasia = $request->nome;
      $empresa->Telefone = $request->telefone;
      $empresa->Email = $request->email;
      $empresa->save();

      return response()->json([
          "mensagem" => "Empresa cadastrada com sucesso!"
      ], 201);
    }
  
    public function getEmpresa($id) {

      if (Empresa::where('id', $id)->exists()) {
          $empresa = Empresa::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($empresa, 200);
        } else {
          return response()->json([
            "mensagem" => "Empresa não encontrada"
          ], 404);
        }
    }
  
    public function updateEmpresa(Request $request, $id) {
      if (Empresa::where('id', $id)->exists()) {
          $empresa = Empresa::find($id);
          $empresa->CNPJ = $request->CNPJ;
          $empresa->Razao_Social = is_null($request->razaoSocial) ? $empresa->Razao_Social : $request->razaoSocial;
          $empresa->Nome_fantasia = is_null($request->nome) ? $empresa->Nome_fantasia : $request->nome;
          $empresa->Telefone = is_null($request->telefone) ? $empresa->Telefone : $request->telefone;
          $empresa->Email = $request->email;
          $empresa->save();
  
          return response()->json([
              "mensagem" => "Empresa atualizada com sucesso"
          ], 200);
          } else {
          return response()->json([
              "mensagem" => "Empresa não encontrada"
          ], 404);
      }
    }

    public function validarEmail($id){
      if (Empresa::where('id', $id)->exists()){
        $empresa = Empresa::find($id);
        $empresa->Conta_Valida = 1;
        $empresa->save();

        return response()->json([
          "mensagem" => "Empresa validada com sucesso"
      ], 200);
      }
    }
  
    public function deleteEmpresa ($id) {
      if(Empresa::where('id', $id)->exists()) {
          $empresa = Empresa::find($id);
          $empresa->delete();
  
          return response()->json([
            "mensagem" => "Empresa deletada"
          ], 202);
        } else {
          return response()->json([
            "mensagem" => "Empresa não encontrada"
          ], 404);
        }
    }

    public function getAllAdmins() {
      $admin = Admin::get()->toJson(JSON_PRETTY_PRINT);
      return response($admin, 200);
    }
  
    public function createAdmin(Request $request) {
      $admin = new Admin();
      $admin->CPF = $request->CPF;
      $admin->Nome = $request->nome;
      $admin->Email = $request->email;
      $admin->Senha = $request->senha;
      $admin->save();

      return response()->json([
          "mensagem" => "Administrador cadastrado com sucesso!"
      ], 201);
    }

    public function getAdmin($id) {

      if (Admin::where('id', $id)->exists()) {
          $admin = Admin::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($admin, 200);
        } else {
          return response()->json([
            "mensagem" => "Administrador não encontrado"
          ], 404);
        }
    }
  
    public function updateAdmin(Request $request, $id) {
      if (Admin::where('id', $id)->exists()) {
          $admin = Admin::find($id);
          $admin->CPF = $request->CPF;
          $admin->Nome = is_null($request->nome) ? $admin->Nome : $request->nome;
          $admin->Senha = is_null($request->senha) ? $admin->Senha : $request->senha;
          $admin->Email = $request->email;
          $admin->save();
  
          return response()->json([
              "mensagem" => "Administrador atualizado com sucesso"
          ], 200);
          } else {
          return response()->json([
              "mensagem" => "Administrador não encontrado"
          ], 404);
      }
    }
  
    public function deleteAdmin ($id) {
      if(Admin::where('id', $id)->exists()) {
          $admin = Admin::find($id);
          $admin->delete();
  
          return response()->json([
            "mensagem" => "Administrador deletado"
          ], 202);
        } else {
          return response()->json([
            "mensagem" => "Administrador não encontrado"
          ], 404);
        }
    }

    public function alterarSaldo(Request $request, $id){
      if (Empresa::where('id', $id)->exists()){
        $empresa = Empresa::find($id);
        $empresa->Saldo = $request->saldo;
        $empresa->save();

        return response()->json([
          "mensagem" => "Saldo atualizado com sucesso!"
      ], 200);
      }
    }

    public function solicitarSaque(Request $request, $id){

      if (Empresa::where('id', $id)->exists()){
        $empresa = Empresa::where('id', $id)->first();
        if($empresa->Saldo > 0.00 && $empresa->Conta_Valida == 1){
          $pagamento = new Pagamento();
          $pagamento->Valor = $request->valor;
          $pagamento->save();
        }else{
          return response()->json([
            "mensagem" => "Saldo indisponivel"
          ], 404);
        }
      }
    }
}
