<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reserve;
use Mail;

class WriteLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '予約確認メール送信';

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
        $reserves = Reserve::where('date','=',date("Y/m/d"))->get();
        if(!empty($reserves)){
            foreach($reserves as $reserve) {
                $param = ['reserve'=>$reserve];
                Mail::send('emails.reserve',$param,function($message) use ($reserve) {
                    $message->to($reserve->user->email)->subject('予約日です');
            });
            }
        }
    } 

}
