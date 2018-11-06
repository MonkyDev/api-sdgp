<?php

namespace App\Http\Controllers\Management\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\History\HistorySystem;

use App\Entidad;

class MexicanStateController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:state.index')->only('index');
        $this->middleware('permission:state.show')->only('show');
        $this->middleware('permission:state.create')->only(['create', 'store']);
        $this->middleware('permission:state.edit')->only(['edit', 'update']);
        $this->middleware('permission:state.destroy')->only('destroy');

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
        $estados = Entidad::paginate(10);

        return view('management.state.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('management.state.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $validatedData = $request->validate([
            'cveCarrera' => 'required|unique:estados|string|max:7',
            'nombreCarrera' => 'required|string|max:255',
            'modalidad' => 'required|string|max:255',
            'nivel' => 'required|string|max:255',
            'noRevoe' => 'required|string|max:100',
            'autorizacion_id' => 'required|integer|min:1|max:9999999999',
            'institucion_id' => 'required|integer|min:1|max:9999999999',
            'edo' => 'required|numeric|min:1|max:9999999999',
        ]);

        $action = 'Entidad::create';
        $table  = 'estados';


        if ( $save = Entidad::create($request->all()) )
             if ( $this->history($save, $action, $table) )
                $response = 200;
            else    
                $response = 303; 
        else    
            $response = 302;


    return redirect()->route('state.index')->with('code', $response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrera = Entidad::findOrFail($id);
        return view('management.state.show', compact('carrera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $carrera = Entidad::findOrFail($id);
        return view('management.state.edit', compact('carrera'));
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
            'nombreCarrera' => 'required|string|max:255',
            'modalidad' => 'required|string|max:255',
            'nivel' => 'required|string|max:255',
            'noRevoe' => 'required|string|max:100',
            'autorizacion_id' => 'required|integer|min:1|max:9999999999',
            'institucion_id' => 'required|integer|min:1|max:9999999999',
            'edo' => 'required|numeric|min:1|max:9999999999',
        ]);

        $action = 'Entidad::update';
        $table  = 'estados';

        try {

            $estados = Entidad::findOrFail($id);

            if ( $estados->update($request->all()) )
                 if ( $this->history($estados, $action, $table) )
                    $response = 202;
                else    
                    $response = 303; 
            else    
                $response = 302;
            
        } catch (Exception $e) {
            $response = 302;
        }




    return redirect()->route('state.index')->with('code', $response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $action = 'Entidad::destroy';
        $table  = 'estados';

        try {

            $reg = Entidad::findOrFail($id);
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
