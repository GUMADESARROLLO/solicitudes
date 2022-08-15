@extends('layouts.main')

@section('metodosjs')
    @include('jsViews.js_usuario')
@endsection
@section('content')
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-10">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Usuarios</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="home"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Inicio</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Usuarios</a></li>
                                </ul>
                            </div>
                            <div class="col-md-2">
                                <a href="{{url('user/nuevo')}}" class="btn btn-primary btn-sm  float-right">Nuevo usuario</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] start -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">
                            <!-- [ Tabla Categorias ] start -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Lista de usuarios</h5>
                                    </div>
                                    <div class="{{ $message['tipo'] }}">{{ $message['mensaje'] }}</div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>COD. USUARIO</th>
                                                        <th>NOMBRES</th>
                                                        <th>APELLIDOS</th>
                                                        <th>USERNAME</th>
                                                        <th>ESTADO</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($user as $user)
                                                    <tr class="unread">
                                                        <td>{{ $user['id'] }}</td>
                                                        <td>{{ $user['nombre'] }}</td>
                                                        <td>{{ $user['apellido'] }}</td>
                                                        <td>{{ $user['username'] }}</td>
                                                        <td>
                                                            @if ( $user->estado )
                                                            <span class="badge badge-success">Activo</span>
                                                            @else
                                                            <span class="badge badge-danger">Inactivo</span>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="user/detalle/{{ $user['id']}}"><i class="feather icon-eye text-c-green f-30 m-r-10"></i></a>
                                                            <a href="user/edit/{{ $user['id']}}"><i class="feather icon-edit text-c-blue f-30 m-r-10"></i></a>
                                                            @if ( $user->estado )
                                                           <!-- <a href="#!" onclick="deleteUser({{ $user['id'] }})"><i class="feather icon-x-circle text-c-red f-30 m-r-10"></i></a> -->
                                                           <a href="#!" onclick="deleteUser({{ $user['id'] }})"><i class="fas fa-toggle-on text-c-success f-30 m-r-10"></i></a>
                                                            @endif
                                                            @if ( $user->estado == 0)
                                                                <a href="#!" onclick="activeUser({{ $user['id'] }})" ><i class="fas fa-toggle-on text-c-red f-30 m-r-10"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Tabla Categorias ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
@endsection