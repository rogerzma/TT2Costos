<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReporteStore;
use App\Models\Reportes;

class reporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function get(){
        try {
            $reportes = Reportes::all();
            return view('pruebaReporte', compact('reportes'));
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
      }
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            $data['nombrecultivo'] = $request['nombrecultivo'];
            $data['nombrecientifico'] = $request['nombrecientifico'];
            $data['tipocultivo'] = $request['tipocultivo'];
            $data['modalidad'] = $request['modalidad'];
            $data['ciclocultivo'] = $request['ciclocultivo'];
            $data['potencialalto'] = $request['potencialalto'];
            $data['potencialmedio'] = $request['potencialmedio'];
            $data['potencialbajo'] = $request['potencialbajo'];
            $data['pdf'] = $request['pdf'];
            $res= Reportes::create($data);
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
      }
    }

    public function getById($id){
        try {
            $data = Reportes::find($id);
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
      }
    }

    public function update(Request $request, $id)
    {
        try{
            $data['nombrecultivo'] = $request['nombrecultivo'];
            $data['nombrecientifico'] = $request['nombrecientifico'];
            $data['tipocultivo'] = $request['tipocultivo'];
            $data['modalidad'] = $request['modalidad'];
            $data['ciclocultivo'] = $request['ciclocultivo'];
            $data['potencialalto'] = $request['potencialalto'];
            $data['potencialmedio'] = $request['potencialmedio'];
            $data['potencialbajo'] = $request['potencialbajo'];
            $data['pdf'] = $request['pdf'];
            $res= Reportes::find($id);
            return response()->json($res, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
      }
    }

    public function delete($id){
        try {
            $res = Reportes::find($id)->delete();
            return response()->json(["deleted" => $res], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReporteStore $request)
    {


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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
