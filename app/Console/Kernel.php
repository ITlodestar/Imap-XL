<?php

namespace App\Console;

use App\Http\Controllers\WorkertaskController;
use Illuminate\Support\Facades\DB;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Database;
use App\Http\Controllers\SettingsController;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {

            $database = Database::where('status', 1)->first();
            $database->status = 2;
            $database->save();
            $content=$this->filecontrol($database, 500);
            
            $this->setworktask($database, $content);
        })->everyFiveMinutes();
    }
    // Read and delete file
    private function filecontrol($database, $line)
    {
        $lines = [];
        $content = [];
        $handle = fopen(storage_path('app/public/uploads/' . $database->filename), "r+");

        if ($handle) {
            $counter = 0;
            while (($line = fgets($handle)) !== false) {
                $putline = trim($line);
                array_push($content, str_replace(array("\r", "\n"), '', $putline));
               
                $counter++;
                if ($counter >= 0 && $counter <= 10) {
                    continue;
                }
                array_push($lines, $line);
            }
            if(fgets($handle) == false) {
                $database->status = 2;
                $database->save();
            }
        }

        ftruncate($handle, 0);
        
        // Write the updated array back to the file
        fwrite($handle, implode($lines));

        fclose($handle);
        
        return $content;
    }
    // Set Workertask.
    private function setworktask($database, $content)
    {
        $group = [];
        $index = 0;
        $total = 0;
        $settings = new SettingsController;
        $size = $settings->get_settings('task_0_size');

        foreach ($content as $value) {
            array_push($group, $value);
            $total++;
            $index++;

            if ($size == $index || $total == count($content)) {
                $worktask = new WorkertaskController;
                $worktask->setCreateworktask($database->id, json_encode($group));
                $index = 0;
                $group = [];
            }
        }
    }
    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}