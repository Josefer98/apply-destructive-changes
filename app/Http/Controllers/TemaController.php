<?php

namespace App\Http\Controllers;

use App\Models\Temas;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-temas | crear-temas | editar-temas | borrar-temas', ['only'=>['index']]);
        $this->middleware('permission:crear-temas', ['only'=>['create','store']]);
        $this->middleware('permission:editar-temas', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-temas', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $temas=Temas::paginate(5);
        return view('temas.index',compact($temas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('temas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'titulo'=>'required|string',
            'area'=>'required|string',
            'palabras_clave'=>'string',
            'estado'=>'required|in:libre,asignado,terminado',
            'descripcion'=>'string',
            'pdfFile' => 'file|mimes:pdf'
        ]);
        Temas::create($request->all());
        return redirect()->route('temas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Temas $temas)
    {
        return view('temas.editar',compact('temas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Temas $temas)
    {
        request()->validate([
            'titulo'=>'required|string',
            'area'=>'required|string',
            'palabras_clave'=>'string',
            'estado'=>'required|in:libre,asignado,terminado',
            'descripcion'=>'string',
            'pdfFile' => 'file|mimes:pdf'
        ]); 
        $temas->update($request->all());
        return redirect()->route('temas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temas $temas)
    {
        $temas->delete();
        return redirect()->route('temas.index');
    }
}
