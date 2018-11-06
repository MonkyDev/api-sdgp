<?php

namespace App\Http\Controllers\Management\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\History\HistorySystem;


use App\Autorizacion;

class AuthorizationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:authorization.index')->only('index');
        $this->middleware('permission:authorization.show')->only('show');
        $this->middleware('permission:authorization.create')->only(['create', 'store']);
        $this->middleware('permission:authorization.edit')->only(['edit', 'update']);
        $this->middleware('permission:authorization.destroy')->only('destroy');

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
        $autorizaciones = Autorizacion::paginate(10);

        return view('management.authorization.index', compact('autorizaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.authorization.create' );
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
            'desc_autorizacion' => 'required|string|max:255',
            'edo' => 'required|numeric|max:9'
        ]);

        $action = 'Autorizacion::create';
        $table  = 'autorizaciones';


        if ( $save = Autorizacion::create($request->all()) )
             if ( $this->history($save, $action, $table) )
                $response = 200;
            else    
                $response = 303; 
        else    
            $response = 302;


    return redirect()->route('authorization.index')->with('code', $response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $autorizacion = Autorizacion::findOrFail($id);
        return view('management.authorization.show', compact('autorizacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $autorizacion = Autorizacion::findOrFail($id);
        return view('management.authorization.edit', compact('autorizacion'));
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
            'desc_autorizacion' => 'required|string|max:255',
            'edo' => 'required|numeric|max:9'
        ]);

        $action = 'Autorizacion::update';
        $table  = 'autorizaciones';

        try {

            $autorizacion = Autorizacion::findOrFail($id);

            if ( $autorizacion->update($request->all()) )
                 if ( $this->history($autorizacion, $action, $table) )
                    $response = 202;
                else    
                    $response = 303; 
            else    
                $response = 302;
            
        } catch (Exception $e) {
            $response = 302;
        }




    return redirect()->route('authorization.index')->with('code', $response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $action = 'Autorizacion::destroy';
        $table  = 'autorizaciones';

        try {

            $reg = Autorizacion::findOrFail($id);
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
