<?php

namespace App\Http\Controllers\Management\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\History\HistorySystem;

use App\Institucion;

class SchoolController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:school.index')->only('index');
        $this->middleware('permission:school.show')->only('show');
        $this->middleware('permission:school.create')->only(['create', 'store']);
        $this->middleware('permission:school.edit')->only(['edit', 'update']);
        $this->middleware('permission:school.destroy')->only('destroy');

    }

    /**
     * Save all changes and database.
     *
     * @return \Illuminate\Http\Response
     */
    private function history($registro, $accion, $tabla)
    {
        $route  = $_SERVER['HTTP_ORIGIN'].$_SERVER['REQUEST_URI'];
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
        $instituciones = Institucion::paginate(10);

        return view('management.school.index', compact('instituciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.school.create' );
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
            'clave' =>  'required|numeric|max:9999999',
            'nombre' => 'required|string|max:255',
            'tipo_sostenimiento' => 'required|string|max:255',
            'tipo_educativo' => 'required|string|max:255'
        ]);

        $action = 'Institucion::create';
        $table  = 'instituciones';


        if ( $save = Institucion::create($request->all()) )
             if ( $this->history($save, $action, $table) )
                $response = 200;
            else    
                $response = 303; 
        else    
            $response = 302;


    return redirect()->route('school.index')->with('code', $response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $institucion = Institucion::findOrFail($id);
        return view('management.school.show', compact('institucion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institucion = Institucion::findOrFail($id);
        return view('management.school.edit', compact('institucion'));
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
            'clave' =>  'required|numeric|max:9999999',
            'nombre' => 'required|string|max:255',
            'tipo_sostenimiento' => 'required|string|max:255',
            'tipo_educativo' => 'required|string|max:255'
        ]);

        $action = 'Institucion::update';
        $table  = 'instituciones';

        try {

            $institucion = Institucion::findOrFail($id);

            if ( $institucion->update($request->all()) )
                 if ( $this->history($institucion, $action, $table) )
                    $response = 202;
                else    
                    $response = 303; 
            else    
                $response = 302;
            
        } catch (Exception $e) {
            $response = 302;
        }




    return redirect()->route('school.index')->with('code', $response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $action = 'Institucion::destroy';
        $table  = 'instituciones';

        try {

            $reg = Institucion::findOrFail($id);
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
