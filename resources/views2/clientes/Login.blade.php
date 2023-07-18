<?php
session_start();
 
?>
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
        <div class="col-3"></div>
        <div class="col-6">
        <!-- Inicio contenido pagina-->
            <div class='shadow'>
                <form id='login-form' class='form' action='../../controller/login.php' method='post' style='padding: 10px; margin:10px;'>
                    <h3 class='text-center text-success'>Inicio de sesión</h3>
                    <div class='form-group'>
                        <i class='fa-solid fa-envelope'></i>
                        <label for='email' >Email:</label><br>
                        <input type='email' name='email' id='email' class='form-control mb-4'>
                    </div>
                    <div class='form-group'>
                        <i class='fa-solid fa-key'></i>
                        <label for='password' >Contraseña:</label><br>
                        <input type='password' id='password' name='password' class='form-control mb-4'>
                    </div>
                    <div id='register-link' class='text-right'>
                        <input type='submit' value='Iniciar sesión' class='btn btn-primary mb-4' name='login' style='float: right;'>
                        <label for='texto' class='form-text mb-4'>¿No está registrado?</label><a href='LoginRegister.php' style='text-decoration: none;'> Registrarse</a> 
                    </div>                                      
                </form>
            </div> 
        <!-- Fin contenido pagina-->
        </div>
        <div class="col-3"></div>
        </main>
    </div>
    <!-- Fin Contenido-->










@endsection

@section('footer')
    <h1>footer</h1>
@endsection

    


     


