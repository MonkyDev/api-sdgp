<?php

namespace App\Http\Controllers\Staff;

use App\Cargo;
use App\Firma;
use App\Responsable;
use Illuminate\Http\Request;
use App\History\HistorySystem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WrenchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:wrench.index')->only('index');
        $this->middleware('permission:wrench.show')->only('show');
        $this->middleware('permission:wrench.create')->only(['create', 'store']);
        $this->middleware('permission:wrench.edit')->only(['edit', 'update']);
        $this->middleware('permission:wrench.destroy')->only('destroy');
    }

    /**
     * Save all changes and database.
     *
     * @return \Illuminate\Http\Response
     */
    private function history($registro, $accion, $tabla)
    {
        $route  = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        $ip     = $_SERVER['REMOTE_ADDR'];
        $iduser = Auth::user()->id;
        $user   = Auth::user()->name;
        $action = $accion;
        $table  = $tabla;
        $reg    = $registro;

        if (HistorySystem::create([
                'user_id'       => $iduser,
                'user_name'     => $user,
                'ip'            => $ip,
                'ruta'          => $route,
                'metodo'        => $method,
                'accion'        => $action,
                'tabla'         => $table,
                'registro'      => $reg,
                "created_at"    => \Carbon\Carbon::now(),
                "updated_at"    => \Carbon\Carbon::now()
            ])
        )

    return true;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsables = Responsable::paginate(10);

        return view('staff.wrench.index', compact('responsables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = array(0 => 'Seleccionar');
        $cargos_db = Cargo::get();
        foreach ($cargos_db as $cargo_db) {
            $cargos += array($cargo_db->id => $cargo_db->desc_cargo);
        }

        $firmantes = array(0 => 'Seleccionar');
        $firmantes_db = Firma::get();
        foreach ($firmantes_db as $firmar_db) {
            $firmantes += array($firmar_db->id => $firmar_db->nombre.' '.$firmar_db->primerApellido.' '.$firmar_db->segundoApellido);
        }

        return view('staff.wrench.create', compact('cargos','firmantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firma_id' => 'required|numeric|min:1|max:999999999', 
            'cargo_id'  => 'required|numeric|min:1|max:999999999',
            'numeracion'  => 'required|numeric|min:1|max:9999999999999999999999999999999999',
            'certificado' =>'required|file',
            'llave' =>'required|file',
            'firma' => 'required|string|max:255',
            'edo' => 'required|numeric|min:0|max:1'
        ]);
        //dd( $request->file('certificado')  );

        $responsable = new Responsable();
        $responsable->firma_id = $request->input('firma_id');
        $responsable->cargo_id = $request->input('cargo_id');
        $responsable->numeracion = $request->input('numeracion');
        $responsable->firma = $request->input('firma');
        $responsable->edo = $request->input('edo');

        /*CHECAMOS POR CADA UNA DE LAS VARIABLES FILE*/
        if ( $request->file('certificado') ){
            $path_file_uploaded = UploadFilesResponsablesController::
                                  uploadCertificado( $request->file('certificado') );

            if ($path_file_uploaded)
                /*SETEAMOS LA RUTA EN LA VAR DE LA DB*/
                $responsable->certificado = $path_file_uploaded;
            else 
                return redirect()->route('wrench.index')->with('code', 304);
        } 

        if ( $request->file('llave') ){
            $path_file_uploaded = UploadFilesResponsablesController::
                                  uploadKey( $request->file('llave') );

            if ($path_file_uploaded)
                /*SETEAMOS LA RUTA EN LA VAR DE LA DB*/
                $responsable->llave = $path_file_uploaded;
            else 
                return redirect()->route('wrench.index')->with('code', 304);
        }


        $action = 'Responsable::create';
        $table  = 'responsables';


        if ( $save = $responsable->save() )
             if ( $this->history($save, $action, $table) )
                $response = 200;
            else    
                $response = 303; 
        else    
            $response = 302;


    return redirect()->route('wrench.index')->with('code', $response);
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
        $cargos = array(0 => 'Seleccionar');
        $cargos_db = Cargo::get();
        foreach ($cargos_db as $cargo_db) {
            $cargos += array($cargo_db->id => $cargo_db->desc_cargo);
        }

        $firmantes = array(0 => 'Seleccionar');
        $firmantes_db = Firma::get();
        foreach ($firmantes_db as $firmar_db) {
            $firmantes += array($firmar_db->id => $firmar_db->nombre.' '.$firmar_db->primerApellido.' '.$firmar_db->segundoApellido);
        }

        $responsable = Responsable::findOrFail($id);

        return view('staff.wrench.edit', compact('cargos','firmantes','responsable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cargo_id'  => 'required|numeric|min:1|max:999999999',
            'edo' => 'required|numeric|min:0|max:1'
        ]);
        //dd( $request->file('certificado')  );
        $action = 'Responsable::create';
        $table  = 'responsables';

        try {

            $responsable = Responsable::findOrFail($id);

            if ( $responsable->update($request->all()) )
                 if ( $this->history($responsable, $action, $table) )
                    $response = 202;
                else    
                    $response = 303; 
            else    
                $response = 302;
            
        } catch (Exception $e) {
            $response = 302;
        }

    return redirect()->route('wrench.index')->with('code', $response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $action = 'Responsable::destroy';
        $table  = 'responsables';

        try {

            $reg = Responsable::findOrFail($id);
            if ( $reg->delete() )
                 if ( $this->history($reg, $action, $table) )
                    $response = 201;
                else    
                    $response = 303; 
            else    
                $response = 302;
            
        } catch (Exception $e) {
            $response = 302;
        }

    return back()->with('code', $response);
    }
}
