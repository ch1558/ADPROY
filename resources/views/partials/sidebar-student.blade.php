
    <aside class="main-sidebar">
        <section class="sidebar">

            <!-- Usuario -->
            <div class="user-panel">
                <div class="pull-left image">
                    <!--CAMBIAR IMAGEN POR LA DEL ESTUDIANTE-->
                    <img src="{{ asset('Images/foto_default.JPEG') }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ auth()->user()->name }}</p>
                    <p>{{ auth()->user()->last_name }}</p>
                </div>
            </div>

            <ul class="sidebar-menu" style="min-height: 600px;">
                <li class="header">NAVEGACIÓN PRINCIPAL</li>
                <!--Encabezados principales-->
                <!--Informacion personal-->
                <li class="treeview @if(Request::path()=='index') active @endif">
                    <a href="./index">
                        <i class="fa fa-user"></i><span>Información Estudiantil</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <!--Sublista de informacion personal-->
                    <ul class="treeview-menu">
                        <!--Datos personales-->
                        <li class="hvr-icon-back2 @if(Request::path()=='index') active @endif">
                            <a href="{{ route('index') }}"> Datos Personales </a>
                        </li>
                    </ul>
                </li>

                <!--Gestion de Anteproyectos-->
                <li class="treeview @if(Request::path()=='drafts-list-student'||Request::path()=='upload-draft') active @endif">
                    <a href="">
                        <i class="fa fa-book"></i><span>Anteproyectos</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="hvr-icon-back2 @if(Request::path()=='upload-draft') active @endif">
                            <a href="{{ route('upload-draft') }}">Crear Anteproyecto</a>
                        </li>
                        <li class="hvr-icon-back2 @if(Request::path()=='drafts-list-student') active @endif">
                            <a href="{{ route('drafts-list-student') }}">Listado de anteproyectos</a>
                        </li>
                    </ul>
                </li>

                <!--Reuniones del anteproyecto-->
                <li class="treeview @if(Request::path()=='draft-meetings') active @endif">
                    <a href="">
                        <i class="fa fa-calendar-check-o"></i> <span>Reunion anteproyecto</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <!--Seguimiento de reuniones-->
                        <li class="hvr-icon-back2 @if(Request::path()=='draft-meetings') active @endif">
                            <a href="{{ route('draft-meetings') }}">Crear reunión</a>
                        </li>
                    </ul>
                </li>

                <!--Gestion de proyectos-->
                <li class="treeview @if(Request::path()=='create-project') active @endif">
                        <a href="">
                            <i class="fa fa-book"></i><span>Proyectos</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="hvr-icon-back2 @if(Request::path()=='create-project') active @endif">
                                <a href="{{ route('create-project') }}">Crear Proyecto</a>
                            </li>
                            <li class="hvr-icon-back2">
                                <a href="">Listado de proyectos</a>
                            </li>
                        </ul>
                    </li>

                <!--Cronograma-->
                <li class="treeview @if(Request::path()=='meet-calendar') active @endif">
                    <a href="">
                        <i class="fa fa-calendar-check-o"></i> <span>Comite</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <!--Seguimiento del comité-->
                        <li class="hvr-icon-back2">
                            <a href="{{ route('calendar') }}">Calendario de reuniones</a>
                        </li>
                    </ul>
                </li>
            </ul>

        </section>
    </aside>
