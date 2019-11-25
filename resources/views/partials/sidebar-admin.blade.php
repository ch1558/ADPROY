
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

                <li class="treeview @if(Request::path()=='index') active @endif">
                    <a href="">
                        <i class="fa fa-user"></i><span>Información</span>
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

                <li class="treeview @if(Request::path()=='meet'||Request::path()=='meet-calendar') active @endif">
                    <a href="">
                        <i class="fa fa-book"></i>
                        <span>Comite</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="hvr-icon-back2 @if(Request::path()=='meet') active @endif">
                            <a href="{{ route('meet') }}">Crear Reunión</a>
                        </li>
                    </ul>
                    <ul class="treeview-menu">
                        <li class="hvr-icon-back2 @if(Request::path()=='meet-calendar') active @endif">
                            <a href="{{ route('calendar') }}">Calendario de Reunión</a>
                        </li>
                    </ul>
                </li>

            <!-- Anteproyectos -->
                <li class="treeview @if(Request::path()=='drafts-list-admin'||Request::path()=='assign-evaluators'||Request::path()=='drafts-trial') active @endif">
                    <a href="">
                        <i class="fa fa-book"></i>
                        <span>Anteproyectos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="hvr-icon-back2 @if(Request::path()=='drafts-list-admin') active @endif">
                            <a href="{{ route('drafts-list-admin') }}"> Listado de Anteproyectos</a>
                        </li>
                        <li class="hvr-icon-back2 @if(Request::path()=='assign-evaluators') active @endif">
                            <a href="{{ route('assign-evaluators') }}"> Asignar jurados</a>
                        </li>
                        <li class="hvr-icon-back2 @if(Request::path()=='drafts-trial') active @endif">
                            <a href="{{ route('drafts-trial') }}"> Anteproyectos en juicio</a>
                        </li>
                    </ul>
                </li>



                <!-- Proyectos -->
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-calendar-check-o"></i>
                        <span>Proyectos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="hvr-icon-back2">
                            <a href=""> Listado de Proyectos</a>
                        </li>
                        <li class="hvr-icon-back2">
                            <a href=""> Asignar jurados</a>
                        </li>
                    </ul>
                </li>

                <!-- Usuarios -->
                <li class="treeview @if(Request::path()=='user-validation'||Request::path()=='user-reject') active @endif">
                    <a href="">
                        <i class="fa fa-book"></i>
                        <span>Usuarios</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="hvr-icon-back2 @if(Request::path()=='user-validation') active @endif">
                            <a href="{{ route('validation') }}">Pendientes Aprobación</a>
                        </li>
                    </ul>
                    <ul class="treeview-menu">
                        <li class="hvr-icon-back2 @if(Request::path()=='user-reject') active @endif">
                            <a href="{{ route('reject') }}">Usuarios Rechazados</a>
                        </li>
                    </ul>
                </li>
            </ul>

        </section>
    </aside>