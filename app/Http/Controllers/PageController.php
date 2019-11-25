<?php

namespace App\Http\Controllers;

use App\Models\Anteproyecto;
use App\Models\AutorAnteproyecto;
use App\Models\EvaluadorAnteproyecto;
use App\Models\Dependencia;
use App\Models\Director;
use App\Models\Grupo;
use App\Models\EstadoAnteproyecto;
use App\Models\Modalidad;
use App\Models\Reunion;
use App\Models\ReunionAnte;
use App\Models\Tema;
use App\Models\Rol;
use App\Models\TemaAnteproyecto;
use App\User;
use Illuminate\Http\Request;

use DB;

class PageController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $dependencias = Dependencia::all();
        $roles = Rol::all();
        return view('dashboard')->with(compact('dependencias'))->with(compact('roles'));
    }

    public function showUploadDraft(){
        $lineas = Tema::all();
        $modalidad = Modalidad::all();
        $grupos = Grupo::all();
        $autores = User::where('rol',3)->where('estado',1)->select('codigo_especifico')->get();
        $directores = User::where('rol','<',3)->where('estado',1)->select('codigo_especifico')->get();

        return view('upload-draft')->with(compact('lineas'))
                                    ->with(compact('modalidad'))
                                    ->with(compact('grupos'))
                                    ->with(compact('autores'))
                                    ->with(compact('directores'));
    }

    public function uploadDraft(Request $request){
        $draft = new Anteproyecto;
        $autoria = new AutorAnteproyecto;
        $edicion = new Director;
        $newDraft = $draft->store($request);
        $owners = array();
        $editors = array();
        $autores = User::where('rol',3)->where('estado',1)->select('codigo_especifico')->get();
        $directores = User::where('rol','<',3)->where('estado',1)->select('codigo_especifico')->get();

        switch ($request['autores']) {
            case '1':
                array_push($owners,$request['autor1']);
                break;
            case '2':
                array_push($owners,$request['autor1']);
                array_push($owners,$request['autor2']);
                break;
            case '3':
                array_push($owners,$request['autor1']);
                array_push($owners,$request['autor2']);
                array_push($owners,$request['autor3']);
                break;
            case '4':
                array_push($owners,$request['autor1']);
                array_push($owners,$request['autor2']);
                array_push($owners,$request['autor3']);
                array_push($owners,$request['autor4']);
                break;
            default:
                array_push($owners,$request['autor1']);
                array_push($owners,$request['autor2']);
                array_push($owners,$request['autor3']);
                array_push($owners,$request['autor4']);
                array_push($owners,$request['autor5']);
                break;
        }

        switch ($request['directores']) {
            case '1':
                array_push($editors,$request['director1']);
                break;
            case '2':
                array_push($editors,$request['director1']);
                array_push($editors,$request['director2']);
                break;
            case '3':
                array_push($editors,$request['director1']);
                array_push($editors,$request['director2']);
                array_push($editors,$request['director3']);
                break;
            case '4':
                array_push($editors,$request['director1']);
                array_push($editors,$request['director2']);
                array_push($editors,$request['director3']);
                array_push($editors,$request['director4']);
                break;
            default:
                array_push($editors,$request['director1']);
                array_push($editors,$request['director2']);
                array_push($editors,$request['director3']);
                array_push($editors,$request['director4']);
                array_push($editors,$request['director5']);
                break;
        }

        //Ingreso de autores
        for($i=0; $i<sizeof($owners); $i++){
            for($j=0; $j<sizeof($autores); $j++){
                if($autores[$j]->codigo_especifico == $owners[$i] ){
                    $own = User::where('codigo_especifico',$owners[$i])->get();
                    $autoria->store($own[0]->id,$newDraft->id);
                }
            }
        }

        for($i=0; $i<sizeof($editors); $i++){
            for($j=0; $j<sizeof($directores); $j++){
                if($directores[$j]->codigo_especifico == $editors[$i] ){
                    $own = User::where('codigo_especifico',$editors[$i])->get();
                    $edicion->store($own[0]->id,$newDraft->id);
                }
            }
        }

        return redirect()->route('upload-draft');
    }

    public function draftsListStudent(){
        $estados = EstadoAnteproyecto::all();
        $ownDrafts = AutorAnteproyecto::where('codigo_persona',auth()->user()->id)->get();
        $drafts = array();

        for($i=0; $i< sizeof($ownDrafts); $i++){
            $draft = Anteproyecto::where('codigo_anteproyecto',$ownDrafts[$i]->codigo_anteproyecto)->get();
            array_push($drafts,$draft);
        }

        return view('drafts-list-student')->with(compact('drafts'))
                                        ->with(compact('estados'));

    }

    public function draftsListTeacher(){
        $estados = EstadoAnteproyecto::all();
        $ownDrafts = EvaluadorAnteproyecto::where('codigo_persona',auth()->user()->id)->get();
        $drafts = array();

        for($i=0; $i < sizeof($ownDrafts); $i++){
            $draft = Anteproyecto::where('codigo_anteproyecto', $ownDrafts[$i]->codigo_anteproyecto)->get();
            array_push($drafts, $draft);
        }

        return view('drafts-list-teacher')->with(compact('drafts'))
                                          ->with(compact('estados'));
    }

    public function draftsRecord(){
        return view('drafts-record');
    }

    public function approveDraft(){
        $ownDrafts = EvaluadorAnteproyecto::where('codigo_persona', auth()->user()->id)->get();
        $drafts = array();
        $estudiantes = User::all();
        $autores = array();
        $j=0;
        for($i=0; $i < sizeof($ownDrafts); $i++){
            $draft = Anteproyecto::where('codigo_anteproyecto', $ownDrafts[$i]->codigo_anteproyecto)->get();
            if($draft[0]->codigo_estadoante=='5'){
                $autor = AutorAnteproyecto::where('codigo_anteproyecto', $ownDrafts[$i]->codigo_anteproyecto)->get();

                for($k=0; $k<sizeof($autor); $k++){
                    $autores[$j][0]=$autor[$k]->codigo_anteproyecto;
                    $autores[$j][1]=$autor[$k]->codigo_persona;
                    $j++;
                }
                array_push($drafts, $draft);
            }
        }

        return view('approve-draft')->with(compact('drafts'))
                                    ->with(compact('autores'))
                                    ->with(compact('estudiantes'));
    }

    public function draftsListAdmin(){
        $estados = EstadoAnteproyecto::all();
        $drafts = Anteproyecto::all();

        return view('drafts-list-admin')->with(compact('estados'))
                                        ->with(compact('drafts'));
    }

    public function showUserValidate(){
        $docentes = User::where('estado',0)->where('rol',2)->get();
        $estudiantes = User::where('estado',0)->where('rol',3)->get();

        return view('user-validation')->with(compact('docentes'))->with(compact('estudiantes'));
    }

    public function userValidate(Request $request){
        $selected = User::find($request['codigo_usuario']);

        if($request['accion'] == 'aceptar')
            $selected->estado = 1;

        if($request['accion'] == 'rechazar')
            $selected->estado = 2;

        $selected->save();

        return redirect()->route('validation');
    }

    public function showMeetForm(){
        return view('meet');
    }

    public function meetForm(Request $request){
        $meet = new Reunion;
        $meet->store($request);

        return redirect()->route('calendar');
    }

    public function showCalendar(){
        $meet = Reunion::all();
        return view('calendar')->with(compact('meet'));
    }

    public function showUserReject(){
        $docentes = User::where('estado',2)->where('rol',2)->get();
        $estudiantes = User::where('estado',2)->where('rol',3)->get();

        return view('reject')->with(compact('docentes'))->with(compact('estudiantes'));
    }

    public function assignEvaluators(){
        $ownDrafts = Anteproyecto::where('codigo_estadoante','=','4')->get();
        $draftThemes = TemaAnteproyecto::all();
        $themes = Tema::all();
        $ownThemes = array();
        $ownDirectors = array();
        $teachers = User::where('rol','=','2')->get();
        $draftDirectors = Director::all();
        $k=0;$m=0;

        for($i=0; $i<sizeof($ownDrafts); $i++){
            for($j=0; $j<sizeof($draftThemes); $j++){
                if($draftThemes[$j]->codigo_anteproyecto==$ownDrafts[$i]->codigo_anteproyecto){
                    $ownThemes[$k]=$themes[$draftThemes[$j]->codigo_tema]->nombre_tema;
                    $k++;
                }
            }
            for($j=0; $j<sizeof($draftDirectors); $j++){
                if($draftDirectors[$j]->codigo_anteproyecto==$ownDrafts[$i]->codigo_anteproyecto){
                    for($l=0; $l<sizeof($teachers); $l++){
                        if($draftDirectors[$j]->codigo_persona==$teachers[$l]->id){
                            $ownDirectors[$m][0]=$teachers[$l]->name;
                            $ownDirectors[$m][1]=$teachers[$l]->last_name;
                            $ownDirectors[$m][2]=$ownDrafts[$i]->codigo_anteproyecto;
                            $m++;
                        }
                    }
                }
            }
        }


        return view('assign-evaluators')->with(compact('ownDrafts'))
                                        ->with(compact('ownThemes'))
                                        ->with(compact('ownDirectors'));
    }

    public function draftMeetings(Request $request){
        $meets = new ReunionAnte;
        $estado = auth()->user()->rol=='2'?1:0;

        $meets->store($request, $estado);

        return redirect()->route('draft-meetings');
    }

    public function showDraftMeetings(){
        if(auth()->user()->rol=='3')
            $draftsUser = AutorAnteproyecto::where('codigo_persona', auth()->user()->id)->get();
        else
            $draftsUser = Director::where('codigo_persona', auth()->user()->id)->get();
        $drafts = array();

        for($i=0; $i<sizeof($draftsUser); $i++){
            $draft = Anteproyecto::where('codigo_anteproyecto',$draftsUser[$i]->codigo_anteproyecto)->get();
            array_push($drafts,$draft);
        }

        return view('draft-meetings')->with(compact('drafts'));
    }

    public function showApproveMeetings(){
        $meets = ReunionAnte::where('estado','=','0')->get();
        $ownDrafts = array();

        for($i=0; $i<sizeof($meets); $i++){
            $draft = Anteproyecto::where('codigo_anteproyecto',$meets[$i]->codigo_anteproyecto)->get();
            array_push($ownDrafts,$draft);
        }

        return view('approve-meetings')->with(compact('meets'))
                                       ->with(compact('ownDrafts'));
    }

    public function approveMeetings(Request $request){
        $meet = ReunionAnte::find($request['id']);

        if($request['accion']=="aceptar")
            $meet->estado = 1;
        else
            $meet->estado = 2;

        $meet->save();

        return redirect()->route('approve-meetings');
    }

    public function projectObjectives(){
        return view('project-objectives');
    }
    
    public function acceptGoals(){
        return view('accept-goals');
    }

    public function finishProject(){
        return view('finish-project');
    }

    public function assignEvaluatorsproject(){
        return view('assign-evaluators-project');
    }
    
    public function draftsTrial(){
        return view('drafts-trial');
    }
    
    public function projectstatus(){
        return view('project-status');
    }

}
