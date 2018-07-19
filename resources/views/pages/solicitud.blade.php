@php
/* SOLICITUD DE PRESUPUESTO
    routes\web.php
        Route::get('presupuesto', ['uses' => 'page\PresupuestoController@index', 'as' => 'presupuesto']);
        Route::post('presupuesto/enviar', ['uses' => 'page\PresupuestoController@enviarMail', 'as' => 'presupuesto.enviar']);
    
    app\Mail\Presupuesto.php
    app\Http\Controllers\page\PresupuestoController.php
    resources\views\page\presupuesto.blade.php
*   resources\views\page\solicitud.blade.php
*/
@endphp
<!DOCTYPE html>
<html>
<body>
    <h2>Aberturas General Paz</h2>
    <h3>Solicitud de Presupuesto</h3> 

    <p>Enviado desde la web </p>
    <br>
    <br>
    <h3>Datos del contacto</h3>
    <ul>
        <li><strong>Nombre:</strong> {{$nombre}}</li>
        <li><strong>Localidad:</strong> {{$localidad}}</li>
        <li><strong>Telefono:</strong> {{$telefono}}</li>
        <li><strong>Email:</strong> {{$email}}</li>
        <li><strong>Mensaje:</strong> {{$mensaje}}</li>
        <br>
        <br>
        @if($imagen != null)
        <img src="{{($imagen)}}">
        @endif
    </ul>
</body>
</html>