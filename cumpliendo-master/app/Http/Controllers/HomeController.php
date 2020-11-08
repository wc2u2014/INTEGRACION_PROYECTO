<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use App\Exports\MantenimientoExport;
use Maatwebsite\Excel\Facades\Excel;
use App\calificacion;
use App\cursos;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */



    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = \Auth::user();
        $idUser=$user->identificacion;
        $request->user()->authorizeRoles(['user', 'admin']);
        $calificacion= calificacion::all();
        $curso601T=cursos::where('curso','601')->where('idJornada',2)->first();
        if($curso601T==null){
            $curso601T=1;
        }else{$curso601T=$curso601T->cuentaPuntos;}
        
        $curso602T=cursos::where('curso','602')->where('idJornada',2)->first();
        if($curso602T==null){
            $curso602T=1;
        }else{$curso602T=$curso602T->cuentaPuntos;}
        $curso603T=cursos::where('curso','603')->where('idJornada',2)->first();
        if($curso603T==null){
            $curso603T=1;
        }else{$curso603T=$curso603T->cuentaPuntos;}
        $curso701T=cursos::where('curso','701')->where('idJornada',2)->first();
        if($curso701T==null){
            $curso701T=1;
        }else{$curso701T=$curso701T->cuentaPuntos;}
        $curso702T=cursos::where('curso','702')->where('idJornada',2)->first();
        if($curso702T==null){
            $curso702T=1;
        }else{$curso702T=$curso702T->cuentaPuntos;}
        $curso703T=cursos::where('curso','703')->where('idJornada',2)->first();
        if($curso703T==null){
            $curso703T=1;
        }else{$curso703T=$curso703T->cuentaPuntos;}
        $curso801T=cursos::where('curso','801')->where('idJornada',2)->first();
        if($curso801T==null){
            $curso801T=1;
        }else{$curso801T=$curso801T->cuentaPuntos;}
        $curso802T=cursos::where('curso','802')->where('idJornada',2)->first();
        if($curso802T==null){
            $curso802T=1;
        }else{$curso802T=$curso802T->cuentaPuntos;}
        $curso803T=cursos::where('curso','803')->where('idJornada',2)->first();
        if($curso803T==null){
            $curso803T=1;
        }else{$curso803T=$curso803T->cuentaPuntos;}
        $curso901T=cursos::where('curso','901')->where('idJornada',2)->first();
        if($curso901T==null){
            $curso901T=1;
        }else{$curso901T=$curso901T->cuentaPuntos;}
        $curso902T=cursos::where('curso','902')->where('idJornada',2)->first();
        if($curso902T==null){
            $curso902T=1;
        }else{$curso902T=$curso902T->cuentaPuntos;}
        $curso903T=cursos::where('curso','903')->where('idJornada',2)->first();
        if($curso903T==null){
            $curso903T=1;
        }else{$curso903T=$curso903T->cuentaPuntos;}
        $curso1001T=cursos::where('curso','1001')->where('idJornada',2)->first();
        if($curso1001T==null){
            $curso1001T=1;
        }else{$curso1001T=$curso1001T->cuentaPuntos;}
        $curso1002T=cursos::where('curso','1002')->where('idJornada',2)->first();
        if($curso1002T==null){
            $curso1002T=1;
        }else{$curso1002T=$curso1002T->cuentaPuntos;}
        $curso1003T=cursos::where('curso','1003')->where('idJornada',2)->first();
        if($curso1003T==null){
            $curso1003T=1;
        }else{$curso1003T=$curso1003T->cuentaPuntos;}
        $curso1101T=cursos::where('curso','1101')->where('idJornada',2)->first();
        if($curso1101T==null){
            $curso1101T=1;
        }else{$curso1101T=$curso1101T->cuentaPuntos;}
        $curso1102T=cursos::where('curso','1102')->where('idJornada',2)->first();
        if($curso1102T==null){
            $curso1102T=1;
        }else{$curso1102T=$curso1102T->cuentaPuntos;}
        $curso1103T=cursos::where('curso','1103')->where('idJornada',2)->first();
        if($curso1103T==null){
            $curso1103T=1;
        }else{$curso1103T=$curso1103T->cuentaPuntos;}
        if ($idUser==NULL){
            
            return view ('home',array(
                'curso601T'=>$curso601T,
                'curso602T'=>$curso602T,
                'curso603T'=>$curso603T,
                'curso701T'=>$curso701T,
                'curso702T'=>$curso702T,
                'curso703T'=>$curso703T,
                'curso801T'=>$curso801T,
                'curso802T'=>$curso802T,
                'curso803T'=>$curso803T,
                'curso901T'=>$curso901T,
                'curso902T'=>$curso902T,
                'curso903T'=>$curso903T,
                'curso1001T'=>$curso1001T,
                'curso1002T'=>$curso1002T,
                'curso1003T'=>$curso1003T,
                'curso1101T'=>$curso1101T,
                'curso1102T'=>$curso1102T,
                'curso1103T'=>$curso1103T
            ));
        }else{
            return view('docentes.homeDocente');
        }
       
    }
    /*
    public function someAdminStuff(Request $request)
    {
        $request->user()->authorizeRoles(‘admin’);
        return view(‘some.view’);
    }
    */
}
