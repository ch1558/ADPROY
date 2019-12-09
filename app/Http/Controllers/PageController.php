<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

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
use App\Models\Cronograma;
use App\Models\Proyecto;
use App\Models\Carta;
use App\Models\Hitos;
use App\Models\Rol;
use App\User;
use Illuminate\Http\Request;

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
        session(['status' => 'false']);
        $draft = new Anteproyecto;
        $autoria = new AutorAnteproyecto;
        $edicion = new Director;
        $owners = array();
        $editors = array();
        $autores = User::where('rol',3)->where('estado',1)->select('codigo_especifico')->get();
        $directores = User::where('rol','<',3)->where('estado',1)->select('codigo_especifico')->get();
        $validationDirectors = true;
        $validationAuthors = true;
        $verification = AutorAnteproyecto::join('anteproyecto','anteproyecto.codigo_anteproyecto','=','autor_anteproyecto.codigo_anteproyecto')
                                         ->where('anteproyecto.codigo_estadoante','!=','3')
                                         ->where('codigo_persona', auth()->user()->id)->get();

        $aux = 'autor';
        for($i=1; $i<=$request['autores']; $i++){
            $aux .= $i;
            if(User::where('codigo_especifico',$request[$aux])->get()->toArray()==null){
                $validationAuthors = false;
                $i = 6;
            } else
                array_push($owners,$request[$aux]);
            $aux = 'autor';
        }

        $aux = 'director';
        for($i=1; $i<=$request['directores']; $i++){
            $aux .= $i;
            if(User::where('codigo_especifico',$request[$aux])->get()->toArray()==null){
                $validationDirectors = false;
                $i = 6;
            } else
                array_push($editors,$request[$aux]);
            $aux = 'director';
        }

        if($validationDirectors && $validationAuthors && sizeof($verification)==0){
            $newDraft = $draft->store($request);
            
            //Ingreso de autores
            for($i=0; $i<sizeof($owners); $i++){
                for($j=0; $j<sizeof($autores); $j++){
                    if($autores[$j]->codigo_especifico == $owners[$i] ){
                        $own = User::where('codigo_especifico',$owners[$i])->get();
                        $autoria->store($own[0]->id,$newDraft->codigo_anteproyecto);
                    }
                }
            }

            //Ingreso de directores
            for($i=0; $i<sizeof($editors); $i++){
                for($j=0; $j<sizeof($directores); $j++){
                    if($directores[$j]->codigo_especifico == $editors[$i] ){
                        $own = User::where('codigo_especifico',$editors[$i])->get();
                        $edicion->store($own[0]->id,$newDraft->codigo_anteproyecto);
                    }
                }
            }

            return redirect()->route('upload-draft');
        } else{
            if(sizeof($verification)!=0)
                $aux = '¡Ya tiene un anteproyecto en curso!';
            else
                $aux = !$validationAuthors ? 'Autor Incorrecto' : 'Director Incorrecto';

            session(['titulo' => $request['titulo']]);
            session(['resumen' => $request['resumen']]);
            session(['tema' => $request['tema']]);
            session(['grupo' => $request['grupo']]);
            session(['modalidad' => $request['modalidad']]);
            
            return redirect()->route('upload-draft')->with('status', $aux);
        }
    }

    public function draftsListStudent(){
        $directors = array();
        $drafts = array();
        $autores = array();
        $estados = EstadoAnteproyecto::all();
        $grupos = Grupo::all();
        $modalidades = Modalidad::all();
        $lineas = Tema::all();
        $ownDrafts = AutorAnteproyecto::where('codigo_persona',auth()->user()->id)->get();
        
        for($i=0; $i< sizeof($ownDrafts); $i++){
            $draft = Anteproyecto::where('codigo_anteproyecto',$ownDrafts[$i]->codigo_anteproyecto)->get();
            array_push($drafts,$draft);
            $autor = User::join('autor_anteproyecto', 'users.id', '=', 'autor_anteproyecto.codigo_persona')->select('users.*', 'autor_anteproyecto.*')->where('autor_anteproyecto.codigo_anteproyecto', $ownDrafts[$i]->codigo_anteproyecto)->get();
            array_push($autores, $autor);
            $director = User::join('director', 'users.id', '=', 'codigo_persona')->select('users.*', 'director.*')->where('director.codigo_anteproyecto',$ownDrafts[$i]->codigo_anteproyecto)->get();
            array_push($directors, $director);
        }

        return view('drafts-list-student')->with(compact('drafts'))
                                        ->with(compact('estados'))
                                        ->with(compact('directors'))
                                        ->with(compact('modalidades'))
                                        ->with(compact('grupos'))
                                        ->with(compact('autores'))
                                        ->with(compact('lineas'));

    }

    public function editDraftStudent(Request $request){
        $draft = New Anteproyecto;
        $draft->store($request);
        return redirect()->route('drafts-list-student');
    }

    public function uploadDocuments(Request $request){
        $draft = New Anteproyecto;
        $send = $draft->addDocument($request);

        if($request['send'] == "send"){
            if($send->existAnteproyecto() == 1)
                return redirect()->route('drafts-list-student')->with('status', '¡Te faltan el anteproyecto!');
            
            if($send->existUgad() == 1)
                return redirect()->route('drafts-list-student')->with('status', '¡Te faltan la carta de radico en el UGAD!');
            
            $send->codigo_estadoante = 4;
            $send->save();
        }

        return redirect()->route('drafts-list-student');
    }

    public function draftsListTeacher(){
        $estados = EstadoAnteproyecto::all();
        $ownDrafts = Director::where('codigo_persona',auth()->user()->id)->get();
        $drafts = array();
        $autores = array();
        $lineas = Tema::all();
        $grupos = Grupo::all();
        $modalidades = Modalidad::all();
        for($i=0; $i < sizeof($ownDrafts); $i++){
            $draft = Anteproyecto::where('codigo_anteproyecto', $ownDrafts[$i]->codigo_anteproyecto)->get();
            array_push($drafts, $draft);
            $autor = User::join('autor_anteproyecto', 'users.id', '=', 'autor_anteproyecto.codigo_persona')->select('users.*', 'autor_anteproyecto.*')->where('autor_anteproyecto.codigo_anteproyecto', $ownDrafts[$i]->codigo_anteproyecto)->get();
            array_push($autores, $autor);
        }

        return view('drafts-list-teacher')->with(compact('drafts'))
                                          ->with(compact('modalidades'))
                                          ->with(compact('estados'))
                                          ->with(compact('autores'))
                                          ->with(compact('grupos'))
                                          ->with(compact('lineas'));
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
                array_push($drafts, $draft[0]);
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

    public function showAssignEvaluators(){
        $ownDrafts = Anteproyecto::where('codigo_estadoante','=','4')->get();
        $ownThemes = array();
        $ownDirectors = array();
        $teachers = User::where('rol','=','2')->get();
        $draftDirectors = Director::all();
        $m=0;

        for($i=0; $i<sizeof($ownDrafts); $i++){
            $theme = Tema::where('codigo_tema',$ownDrafts[$i]->codigo_tema)->get();
            array_push($ownThemes,$theme);
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

        $teachers = User::where('rol','=','2')->where('estado','=','1')->get();

        return view('assign-evaluators')->with(compact('ownDrafts'))
                                        ->with(compact('ownThemes'))
                                        ->with(compact('ownDirectors'))
                                        ->with(compact('teachers'));
    }

    public function assignEvaluators(Request $request){
        $evaluators = new EvaluadorAnteproyecto;
        $draft = new Anteproyecto;
        if($request['accion']=='aceptar' && $request['teachers1']!=$request['teachers2'] && $request['teachers2']!=$request['teachers3']
        && $request['teachers1']!=$request['teachers3']){
            for($i=1;$i<4;$i++){
                $evaluators->store($request, $request['teachers'.$i]);
            }
            $draft->editarEstadoAsignado($request['codigo']);
            return redirect()->route('assign-evaluators');
        } else{
            return redirect()->route('assign-evaluators')->with('status', '¡Directores Iguales!');
        }     
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

    public function showProjectObjectives(){
        return view('project-objectives');
    }

    public function projectObjectives(Request $request){
        $letter = Carta::join('autor_anteproyecto','carta.anteproyecto','=','autor_anteproyecto.codigo_anteproyecto')
                       ->where('autor_anteproyecto.codigo_persona',auth()->user()->id)->get();
        $projectSchedule = Proyecto::where('carta_aprobacion',$letter[0]->codigo)->get()[0]->cronograma;
        $schedule = Cronograma::where('codigo',$projectSchedule)->get();
        $ownObjectives = Hitos::where('cronograma',$schedule[0]->codigo)->get();
        $objective = new Hitos;
        $messages = '';

        
        if(sizeof($letter)==1 && sizeof($ownObjectives)<$schedule[0]->hitos){
            $dateInit = date("Y-m-d",strtotime($schedule[0]->fecha_fin."- ".$schedule[0]->duracion." month"));
            if($request['fecha_inicio']<$dateInit || $request['fecha_inicio']>$schedule[0]->fecha_fin){
                $messages = '¡Fecha de inicio incorrecta!'; 
            } else if($request['fecha_final']<$request['fecha_inicio'] || $request['fecha_final']>$schedule[0]->fecha_fin){
                $messages = '¡Fecha de final incorrecta!';
            } else if($request['fecha_real']<$request['fecha_inicio']){
                $messages = '¡Fecha de real incorrecta!';
            } else{
                $objective->store($request, $projectSchedule);
            }
        } else if(sizeof($ownObjectives) >= $schedule[0]->hitos)
            $messages = '¡Está superando la cantidad de objetivos!';
        else
            $messages = '¡No tiene proyectos activos!';
            
        if($messages!='')
            return redirect()->route('project-objectives')->with('status',$messages);  
        else
            return redirect()->route('project-objectives');
    }

    public function showAcceptGoals(){
        $letter = Carta::join('director','director.codigo_anteproyecto','=','carta.anteproyecto')
                       ->join('proyecto','proyecto.carta_aprobacion','=','carta.codigo')
                       ->where('director.codigo_persona',auth()->user()->id)->get();
        $ownObjectives = array();
        $ownDrafts = array();
        
        for($i=0; $i<sizeof($letter); $i++){
            $objectives = Hitos::where('cronograma',$letter[$i]->cronograma)
                               ->where('estado','=','0')->get();
            array_push($ownObjectives,$objectives);
            $draft = Anteproyecto::where('codigo_anteproyecto',$letter[$i]->anteproyecto)->get();
            array_push($ownDrafts,$draft);
        }
        return view('accept-goals')->with(compact('ownObjectives'))
                                   ->with(compact('ownDrafts'));
    }
    
    public function acceptGoals(Request $request){
        $objective = new Hitos;

        if($request['accion']=='aceptar'){
            $objective->cambiarEstado($request['hito'],1);
        }else{
            $objective->cambiarEstado($request['hito'],2);
        }

        return redirect()->route('accept-goals');
    }

    public function finishProject(){
        return view('finish-project');
    }

    public function assignEvaluatorsproject(){
        return view('assign-evaluators-project');
    }
    
    public function draftsTrial(){
        $drafts = Anteproyecto::where('codigo_estadoante','=','5')->get();
        $draftdirectors = array();
        $owndirectors = array();
        
        for($i=0; $i<sizeof($drafts); $i++){
            $directors = EvaluadorAnteproyecto::where('codigo_anteproyecto',$drafts[$i]->codigo_anteproyecto)->get();
            $names = array();
            for($j=0; $j<sizeof($directors); $j++){
                $director = User::where('id', $directors[$j]->codigo_persona)->get();
                array_push($names,$director[0]->name.' '.$director[0]->last_name);
            }
            array_push($draftdirectors,$names);
            array_push($owndirectors,$directors);
        }

        return view('drafts-trial')->with(compact('drafts'))
                                   ->with(compact('draftdirectors'))
                                   ->with(compact('owndirectors'));
    }
    
    public function projectstatus(){
        return view('project-status');
    }

    public function showDirectorApprove(){
        $drafts = Director::join('anteproyecto','director.codigo_anteproyecto','=','anteproyecto.codigo_anteproyecto')
                            ->where('anteproyecto.codigo_estadoante','=','1')
                            ->where('codigo_persona',auth()->user()->id)->get();
        $themes = Tema::all();
        $modalities = Modalidad::all();
        $groups = Grupo::all();
        $people = User::all();
        $directorsAuthors = array();
        $directors = '';
        $authors = '';

        for($i=0;$i<sizeof($drafts);$i++){
            $draftDirectors = Director::where('codigo_anteproyecto',$drafts[$i]->codigo_anteproyecto)->get();
            for($j=0; $j<sizeof($draftDirectors); $j++){
                if($j!=0) $directors .= '<br>';
                $query =  User::find($draftDirectors[$j]->codigo_persona);
                $directors .= $query->name.' '.$query->last_name; 
            }
            $directorsAuthors[$i][0] = $directors;
            $draftAuthors = AutorAnteproyecto::where('codigo_anteproyecto',$drafts[$i]->codigo_anteproyecto)->get();
            for($j=0; $j<sizeof($draftAuthors); $j++){
                if($j!=0) $authors .= '<br>';
                $query =  User::find($draftAuthors[$j]->codigo_persona);
                $authors .= $query->name.' '.$query->last_name;
            }
            $directorsAuthors[$i][1] = $authors;
            $directors = '';
            $authors = '';
        }

        return view('director-approve')->with(compact('drafts'))
                                       ->with(compact('themes'))
                                       ->with(compact('modalities'))
                                       ->with(compact('groups'))
                                       ->with(compact('directorsAuthors'));
    }

    public function directorApprove(Request $request){
        $approveDraft = Anteproyecto::find($request['codigo']);

        if($request['accion']=='aceptar'){
            $approveDraft->codigo_estadoante = 2;
        } else{
            $approveDraft->codigo_estadoante = 3;
        }

        $approveDraft->save();

        return redirect()->route('director-approve');
    }

    public function showEvaluateDraft($draft){
        $eval = Anteproyecto::find($draft);
        $themes = Tema::all();
        return view('evaluate-draft')->with(compact('eval'))
                                    ->with(compact('themes'));
    }

    public function evaluateDraft(Request $request){
        $ficha = new FichaEvaluacion;
        $eva = $ficha->store($request);
    }

    public function showCreateProject(){
        $date = date("Y-m-d",strtotime(date("Y-m-d")."- 2 month"));
        $meetings = Reunion::where('fecha_reunion','>',$date)->get();
        return view('create-project')->with(compact('meetings'));
    }

    public function createProject(Request $request){
        $schedule = new Cronograma;
        $project = new Proyecto;
        $letter = new Carta;
        $draft = Anteproyecto::join('autor_anteproyecto','autor_anteproyecto.codigo_anteproyecto','=','anteproyecto.codigo_anteproyecto')
                             ->where('codigo_estadoante','!=','3')
                             ->where('autor_anteproyecto.codigo_persona',auth()->user()->id)->get();

        $verification = Carta::where('anteproyecto',$draft[0]->codigo_anteproyecto)->get();
        if(sizeof($verification)==0){
            $newSchedule = $schedule->store($request);  
            $newLetter = $letter->store($request, $draft[0]->codigo_anteproyecto);
            $project->store($newSchedule->id, $newLetter->id);

            return redirect()->route('create-project');
        } else{
            return redirect()->route('create-project')->with('status', '¡El proyecto ya ha sido creado!');
        }
        
    }
}