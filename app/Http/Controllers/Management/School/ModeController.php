<?php

namespace App\Http\Controllers\Management\School;

use App\Modalidad;
use Illuminate\Http\Request;
use App\History\HistorySystem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ModeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:mode.index')->only('index');
        $this->middleware('permission:mode.show')->only('show');
        $this->middleware('permission:mode.create')->only(['create', 'store']);
        $this->middleware('permission:mode.edit')->only(['edit', 'update']);
        $this->middleware('permission:mode.destroy')->only('destroy');
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
        $modalidades = Modalidad::paginate(10);

        return view('management.mode.index', compact('modalidades'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.mode.create' );
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
            'desc_modalidad' => 'required|string|max:255',
            'tipo_modalidad' => 'required|string|max:255'
        ]);

        $action = 'Modalidad::create';
        $table  = 'modalidades';


        if ( $save = Modalidad::create($request->all()) )
             if ( $this->history($save, $action, $table) )
                $response = 200;
            else    
                $response = 303; 
        else    
            $response = 302;


    return redirect()->route('mode.index')->with('code', $response);
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
        $modalidad = Modalidad::findOrFail($id);
        return view('management.mode.edit', compact('modalidad'));
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
            'desc_modalidad' => 'required|string|max:255',
            'tipo_modalidad' => 'required|string|max:255'
        ]);

        $action = 'Modalidad::create';
        $table  = 'modalidades';

        try {

            $modalidad = Modalidad::findOrFail($id);

            if ( $modalidad->update($request->all()) )
                 if ( $this->history($modalidad, $action, $table) )
                    $response = 202;
                else    
                    $response = 303; 
            else    
                $response = 302;
            
        } catch (Exception $e) {
            $response = 302;
        }


    return redirect()->route('mode.index')->with('code', $response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $action = 'Modalidad::destroy';
        $table  = 'modalidades';

        try {

            $reg = Modalidad::findOrFail($id);
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
