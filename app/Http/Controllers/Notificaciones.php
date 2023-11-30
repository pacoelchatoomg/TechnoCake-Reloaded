<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Notificaciones extends Controller
{
    //
    public function mostrarNotificaciones()
    {
        $user = Auth::user();
        $notifications = $user->unreadNotifications; // Obtener notificaciones no leídas
        
        return view('various.notificaciones', compact('notifications'));
    }
}
