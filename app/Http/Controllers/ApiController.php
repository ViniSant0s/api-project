<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Models\Empresa;

class ApiController extends Controller
{
    public function getAllEmpresas() {
        $empresa = Empresa::get()->toJson(JSON_PRETTY_PRINT);
        return response($empresa, 200);
      }
  
      public function createEmpresa(Request $request) {
        $empresa = new Empresa();
        $empresa->CNPJ = $request->CNPJ;
        $empresa->RazãoSocial = $request->razaoSocial;
        $empresa->Nomefantasia = $request->nome;
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
            $empresa->name = is_null($request->name) ? $empresa->name : $request->name;
            $empresa->course = is_null($request->course) ? $empresa->course : $request->course;
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
}
