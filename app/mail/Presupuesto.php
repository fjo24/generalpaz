<?php
/*  SOLICITUD DE PRESUPUESTO
    routes\web.php
        Route::get('presupuesto', ['uses' => 'page\PresupuestoController@index', 'as' => 'presupuesto']);
        Route::post('presupuesto/enviar', ['uses' => 'page\PresupuestoController@enviarMail', 'as' => 'presupuesto.enviar']);
    
*   app\Mail\Presupuesto.php
    app\Http\Controllers\page\PresupuestoController.php
    resources\views\page\presupuesto.blade.php
    resources\views\page\solicitud.blade.php
*/

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class Presupuesto extends Mailable
{
    use Queueable, SerializesModels;
    
    public function __construct($nombre, $localidad, $telefono, $email, $imagen, $mensaje)
    {
        $this->nombre = $nombre;
        $this->localidad = $localidad;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->mensaje = $mensaje;
        $this->imagen = $imagen;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('pages.solicitud')->with([
                        'nombre' => $this->nombre,
                        'localidad' => $this->localidad,
                        'telefono' => $this->telefono,
                        'email' => $this->email,
                        'mensaje' => $this->mensaje,
                        'imagen' => $this->imagen
                        ]);
    }
}
