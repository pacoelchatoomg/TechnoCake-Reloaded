<?php

namespace App\Console;

use App\Models\Inventory;
use App\Models\User;
use App\Notifications\InventarioCero;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $inventariosCero = Inventory::where('amount', 0)->get();

            foreach ($inventariosCero as $inventario) {
                $usuarioResponsable = User::where('name', 'edgar')->first(); // Obtén el primer usuario con el nombre "edgar"
                
                if ($usuarioResponsable) {
                    // Verifica que se haya encontrado un usuario antes de notificar
                    $usuarioResponsable->notify(new InventarioCero($inventario));
                }
            }
        })->everyFiveSeconds(); // Ajusta la frecuencia según tus necesidades
    }
    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
