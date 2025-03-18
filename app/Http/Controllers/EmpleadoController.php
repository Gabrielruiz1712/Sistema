<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mews\Purifier\Casts\CleanHtml;
use Mews\Purifier\Casts\CleanHtmlInput;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados']=Empleado::paginate(5);
        return view('empleado.index',$datos);
    }
    /*public function __construct(){
        $this->middleware('can:crear empleado',[
            'only'=>['create', 'store'],
        ]);

        $this->middleware('can:ver empleado',[
            'only'=>['index'],
        ]);

        $this->middleware('can:editar empleado',[
            'only'=>['show', 'edit','update'],
        ]);

        $this->middleware('can:borrar empleado',[
            'only'=>['destroy', 'delete'],
        ]);

    }
*/
    protected $casts = [
        'bio'            => CleanHtml::class,
        'Nombre'    => CleanHtmlInput::class,
        'ApellidoPaterno'    => CleanHtmlInput::class,
        'ApellidoMaterno'    => CleanHtmlInput::class,
        'Correo'    => CleanHtmlInput::class,
        'Telefono'    => CleanHtmlInput::class,
        'Password'    => CleanHtmlInput::class,

    ];

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleado.create');
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
        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Password'=>'required|string|max:100',
            'Telefono'=>'required|string|max:100',
            'Foto'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'El :attribute es equerido',
            'Foto.required'=>'La foto es requerida'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado = request()->all();
        $datosEmpleado = request()->except('_token');

if($request->hasFile('Foto')){
$datosEmpleado['Foto'] =$request->file('Foto')->store('uploads','public');
}

        Empleado::insert($datosEmpleado);


        return redirect('empleado')->with('mensaje','Empleado agregado con exito');
        //return response()->json($datosEmpleado);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado=Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Password'=>'required|string|max:100',
            'Telefono'=>'required|string|max:100',

        ];
        $mensaje=[
            'required'=>'El :attribute es equerido',

        ];

        if($request->hasFile('Foto')){
        $campos=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg',];
        $mensaje=['Foto.required'=>'La foto es requerida'];
        }

        $this->validate($request, $campos, $mensaje);

        $datosEmpleado = request()->except(['_token','_method']);
        if($request->hasFile('Foto')){
            $empleado=Empleado::findOrFail($id);
            Storage::delete('public/'.$empleado->Foto);
            $datosEmpleado['Foto'] =$request->file('Foto')->store('uploads','public');
            }

        Empleado::where('id','=',$id)->update($datosEmpleado);

        $empleado=Empleado::findOrFail($id);
        //return view('empleado.edit', compact('empleado') );
        return redirect('empleado')->with('mensaje','Empleado modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $empleado=Empleado::findOrFail($id);
        if(Storage::delete('public/'.$empleado->Foto)){
            Empleado::destroy($id);
        }


        return redirect('empleado')->with('mensaje','Empleado borrado');
    }
    public function exportar(){

    }
}
