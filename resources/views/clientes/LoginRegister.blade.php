@extends('layout')

@section('titulo', 'Inicio')


@section('header')
    <h1>Header</h1>
@endsection

@section('main')
    <h1>main</h1>
    <!-- Inicio Contenido-->
    <div class="main">
        <main>
            <!-- inicio promocion-->
            <div class='shadow'>
                <form action='../../Controller/CLoginRegister.php' method='post' class='form-group shadow' style='padding: 10px;'>
                    <h3 style='text-align: center; 'class='text-success'>Registro Usuario</h3>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Correo electrónico</span>
                        <input class='form-control' type='email' name='email' id='' required>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Contraseña</span>
                        <input class='form-control' type='password' name='password' id='' required>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Repita su contraseña</span>
                        <input class='form-control' type='password' name='repassword' id='' required>
                    </div>
                    <div class='input-group mb-3'>
                        <input type='checkbox' name="tratamientodatos" id="trdatos">
                        <span class='input-group-text'>Acepta nuestra política de datos</span>
                    </div>
                    <div class='input-group mb-10'>
                    <input class='btn btn-primary mb-4' type='submit' value='Actualizar Datos' name='registrar' style='float: right;'>
                    </div>
                    </form>
            </div>
            <!-- fin promocion2-->
        </main>
    </div>
    <!-- Fin Contenido-->
@endsection

@section('footer')
    <h1>footer</h1>
@endsection



    








  


