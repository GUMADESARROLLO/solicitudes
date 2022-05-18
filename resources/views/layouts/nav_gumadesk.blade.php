
<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">

<button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
<a class="navbar-brand me-1 me-sm-3" href="dashboard">
  <div class="d-flex align-items-center"><span class="font-sans-serif">Solicitudes</span>
  </div>
</a>

<ul class="navbar-nav align-items-center d-none d-lg-block">
  <li class="nav-item">
    <div class="search-box">
      <form class="position-relative">
        <input class="form-control search-input fuzzy-search" type="search" placeholder="Buscar..."  id="tbl_search_solicitud"/>
        <span class="fas fa-search search-box-icon"></span>
      </form>
    </div>
  </li>
</ul>
<ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
  <li class="nav-item dropdown">
    <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-bell" data-fa-transform="shrink-6" style="font-size: 33px;"></span></a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-card dropdown-menu-notification" aria-labelledby="navbarDropdownNotification">
      <div class="card card-notification shadow-none">
        <div class="card-header">
          <div class="row justify-content-between align-items-center">
            <div class="col-auto">
              <h6 class="card-header-title mb-0">Notificaciones</h6>
            </div>
          </div>
        </div>
        <div class="scrollbar-overlay" style="max-height:19rem">
          <div class="list-group list-group-flush fw-normal fs--1">          

            <div class="list-group-item">
              <a class="notification notification-flush notification-unread" href="#!">
                <div class="notification-avatar">
                  <div class="avatar avatar-2xl me-3">
                    <img class="rounded-circle" src="{{ asset('images/user/avatar-4.jpg') }}" alt="" />

                  </div>
                </div>
                <div class="notification-body">
                  <p class="mb-1"><strong>Usuario</strong> Actualizo el Contendido de : NOMBRE DEL PRODUCOT y del CAMPO</p>
                    <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">💬</span>Just now</span>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="card-footer text-center border-top"><a class="card-link d-block" href="../../../app/social/notifications.html">Ver Todas</a></div>
      </div>
    </div>

  </li>
  <li class="nav-item dropdown"><a class="nav-link pe-0" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <div class="avatar avatar-xl">
        <img class="rounded-circle" src="{{ asset('images/user/avatar-4.jpg') }}" />

      </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
      <div class="bg-white dark__bg-1000 rounded-2 py-2">
      <!--<a class="dropdown-item fw-bold text-warning" href="#!"><span class="fas fa-crown me-1"></span><span>Nombre Usuario</span></a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="Ordenes">Pedidos</a>
      <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="tickets">Vista Usuario</a>
        <a class="dropdown-item" href="UnidadNegocio">Unidades de Negocio</a>
        <a class="dropdown-item" href="Departamentos">Departamentos</a>
        <a class="dropdown-item" href="categorias">Categorias</a>
        <a class="dropdown-item" href="Usuarios">Usuarios</a>
        <div class="dropdown-divider"></div>-->
        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
            document.getElementById('logout-form').submit()">Salir
                <span class="pcoded-micon ml-2">
                    <i class="feather icon-log-out"></i>
                </span>
        </a>
      </div>
    </div>
  </li>
</ul>
</nav>