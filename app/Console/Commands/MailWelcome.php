<?php

namespace App\Console\Commands;
use App\Models\User;
use App\Mail\Welcome;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MailWelcome extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:welcome {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
       $user= User::find($this->argument('id'));
       Mail::to($user->email)->send(new Welcome($user));
       
    }
}
