    <aside class="main-sidebar">
        <section class="sidebar">

            <!-- Usuario -->
            <div class="user-panel">
                <div class="pull-left image">
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
                    <a href="">
                        <i class="fa fa-user"></i><span>Información Docente</span>
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

                <li class="treeview @if(Request::path()=='drafts-list-teacher'||Request::path()=='approve-draft'||Request::path()=='director-approve') active @endif">
                    <a href="">
                        <i class="fa fa-book"></i><span>Anteproyectos</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="hvr-icon-back2 @if(Request::path()=='director-approve') active @endif">
                            <a href="{{ route('director-approve') }}">Pendientes por aprobar</a>
                        </li>
                        <li class="hvr-icon-back2 @if(Request::path()=='drafts-list-teacher') active @endif">
                            <a href="{{ route('drafts-list-teacher') }}">Listado de anteproyectos</a>
                        </li>
                        <li class="hvr-icon-back2 @if(Request::path()=='approve-draft') active @endif">
                            <a href="{{ route('approve-draft') }}">Pendientes por evaluar</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview @if(Request::path()=='draft-meetings'||Request::path()=='approve-meetings') active @endif">
                        <a href="">
                            <i class="fa fa-address-book"></i><span>Reunion anteproyecto</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="hvr-icon-back2 @if(Request::path()=='draft-meetings') active @endif">
                                <a href="{{ route('draft-meetings') }}">Crear reunión</a>
                            </li>
                            <li class="hvr-icon-back2 @if(Request::path()=='approve-meetings') active @endif">
                                <a href="{{ route('approve-meetings') }}">Validar reunión</a>
                            </li>
                        </ul>
                    </li>

                <!--Proyectos-->
                <li class="treeview @if(Request::path()=='accept-goals') active @endif">
                    <a href="">
                        <i class="fa fa-user"></i><span>Proyectos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <!--Sublista para los proyectos-->
                    <ul class="treeview-menu">
                        <!--Revisión de objetivos-->
                        <li class="hvr-icon-back2 @if(Request::path()=='accept-goals') active @endif">
                            <a href="{{ route('accept-goals') }}"> Revisión de objetivos </a>
                        </li>
                    </ul>
                </li>

                <!--Cronograma-->
                <li class="treeview @if(Request::path()=='meet-calendar') active @endif">
                    <a href=""><i class="fa fa-calendar-check-o"></i> <span>Comite</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <!--Seguimiento del comité-->
                        <li class="hvr-icon-back2 @if(Request::path()=='meet-calendar') active @endif">
                            <a href="{{ route('calendar') }}">Calendario de reuniones</a>
                        </li>
                    </ul>
                </li>
                <!-- Usuarios -->
                <li class="treeview @if(Request::path()=='user-validation') active @endif">
                    <a href="">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>Usuarios</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="hvr-icon-back2 @if(Request::path()=='user-validation') active @endif">
                            <a href="{{ route('validation') }}">Pendientes Aprobación</a>
                        </li>
                    </ul>
                </li>
            </ul>

        </section>
    </aside>
