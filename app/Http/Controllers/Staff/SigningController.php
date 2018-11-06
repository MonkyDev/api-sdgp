<?php

namespace App\Http\Controllers\Staff;

use App\Firma;
use Illuminate\Http\Request;
use App\History\HistorySystem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SigningController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:charge.index')->only('index');
        $this->middleware('permission:charge.show')->only('show');
        $this->middleware('permission:charge.create')->only(['create', 'store']);
        $this->middleware('permission:charge.edit')->only(['edit', 'update']);
        $this->middleware('permission:charge.destroy')->only('destroy');
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
        $firmas = Firma::paginate(10);

        return view('staff.signing.index', compact('firmas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.signing.create', compact('firmas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255|regex:/^[A-ZÑ ]+$/',
            'primerApellido' => 'required|string|max:255|regex:/^[A-ZÑ ]+$/',
            'segundoApellido' => 'required|string|max:255|regex:/^[A-ZÑ ]+$/',
            'curp' => 'required|string|max:20|regex:/^[A-ZÑ0-9 ]+$/|unique:firmas',
            'abrTitulo' => 'required|string|max:20|regex:/^[A-zÑñ. ]+$/'
        ]);

        $action = 'Firma::create';
        $table  = 'firmas';


        if ( $save = Firma::create($request->all()) )
             if ( $this->history($save, $action, $table) )
                $response = 200;
            else    
                $response = 303; 
        else    
            $response = 302;


    return redirect()->route('signing.index')->with('code', $response);
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
        $firma = Firma::findOrFail($id);
        return view('staff.signing.edit', compact('firma'));
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
            'nombre' => 'required|string|max:255|regex:/^[A-ZÑ ]+$/',
            'primerApellido' => 'required|string|max:255|regex:/^[A-ZÑ ]+$/',
            'segundoApellido' => 'required|string|max:255|regex:/^[A-ZÑ ]+$/',
            'abrTitulo' => 'required|string|max:20|regex:/^[A-zÑñ. ]+$/'
        ]);

        $action = 'Firma::create';
        $table  = 'firmas';

        try {

            $firma = Firma::findOrFail($id);

            if ( $firma->update($request->all()) )
                 if ( $this->history($firma, $action, $table) )
                    $response = 202;
                else    
                    $response = 303; 
            else    
                $response = 302;
            
        } catch (Exception $e) {
            $response = 302;
        }


    return redirect()->route('signing.index')->with('code', $response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $action = 'Firma::destroy';
        $table  = 'firmas';

        try {

            $reg = Firma::findOrFail($id);
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
