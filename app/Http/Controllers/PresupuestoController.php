<?php
/*SOLICITUD DE PRESUPUESTO
  routes\web.php
    Route::get('presupuesto', ['uses' => 'page\PresupuestoController@index', 'as' => 'presupuesto']);
    Route::post('presupuesto/enviar', ['uses' => 'page\PresupuestoController@enviarMail', 'as' => 'presupuesto.enviar']);
  
  app\Mail\Presupuesto.php
* app\Http\Controllers\page\PresupuestoController.php
  resources\views\page\presupuesto.blade.php
  resources\views\page\solicitud.blade.php
*/
namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Requests\PresupuestoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use App\Mail\Presupuesto;
use App\Dato;
use App\Correo;


class PresupuestoController extends Controller
{
  public function index(){
    $active='presupuesto';

    return view('pages.presupuesto', compact('active'));
  }
  
  public function enviarMail(Request $request) {
      $datos = Dato::where('tipo', 'email')->first();

      $nombre = $request->input('nombre');
      $localidad = $request->input('localidad');
      $telefono = $request->input('telefono');
      $email = $request->input('email');
      $imagen = $request->file('imagen');
      

/*    $file_save = Helpers::saveImage($request->file('imagen'), 'solicitud_presupuesto');
      $file_save ? $datos['imagen'] = $file_save : false
      ;*/

      $mensaje = $request->input('mensaje');

      Mail::to($datos->descripcion)->send(new Presupuesto($nombre, $localidad, $telefono, $email, $imagen, $mensaje));


      if (count(Mail::failures()) > 0) {
          $success = 'Ha ocurrido un error al enviar el correo';
      }else{
          $success = 'Correo enviado correctamente';
      }

      return back()->with('success', $success);
    }
}
