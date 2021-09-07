<?php

namespace App\Console\Commands;

use App\Models\Biblequote;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class UpdateBible extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:bible';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $bbq1 = Biblequote::all();
        foreach($bbq1 as $bb){
          $bb->selected = 0;
          $bb->save();
        }

        $id = random_int(1,12);
       $bbq = Biblequote::find($id);

       $bbq->selected = 1;
       $bbq->save();



    }
}
