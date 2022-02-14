<?php

namespace App\Http\Controllers;

use App\Models\Produto as Produto;
use Illuminate\Http\Request;
use App\Http\Resources\Produto as ProdutoResource;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $produtos = Produto::paginate(15);
        //$produtos = Produto::all();
        return response()->json(['status' => 'Success', 'data' => ProdutoResource::collection($produtos)], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $produto = new Produto;
        $produto->codigo = $request->input('codigo');
        $produto->nome = $request->input('nome');
        $produto->preco = $request->input('preco');
        $produto->qty = $request->input('qty');
        $produto->marca = $request->input('marca');

        if($produto->save()){
            return response()->json(['status' => 'Success', 'data' => new ProdutoResource($produto)], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $produto = Produto::findOrFail($id);
        return response()->json(['status' => 'Success', 'data' => new ProdutoResource($produto)], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        $produto = Produto::findOrFail($request->id);
        $produto->codigo = $request->input('codigo');
        $produto->nome = $request->input('nome');
        $produto->preco = $request->input('preco');
        $produto->qty = $request->input('qty');
        $produto->marca = $request->input('marca');

        if($produto->save()){
            return response()->json(['status' => 'Success', 'data' => new ProdutoResource($produto)], 200);
        }
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $produto = Produto::findOrFail($id);
        if($produto->delete()){
            return response()->json(['status' => 'Success', 'data' => new ProdutoResource($produto)], 200);
        }
    }
}
