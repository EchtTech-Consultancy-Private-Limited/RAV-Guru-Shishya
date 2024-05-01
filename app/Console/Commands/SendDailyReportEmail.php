<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\DailyPhrEmail;
use App\Models\User;
use App\Models\PhrReport;
use App\Models\PhrNotificationSend;
use Carbon\Carbon;

class SendDailyReportEmail extends Command
{
    protected $signature = 'email:daily';

    protected $description = 'Send daily report email';

    public function handle()
    {
        // Get current date in UTC
        $currentDate = Carbon::now()->toDateString();
        $users = User::where('user_type', 3)->get();
        foreach ($users as $user) {
            $phrReport = PhrReport::where('shishya_id', $user->id)
                                  ->whereDate('created_at', $currentDate)
                                  ->exists();
            if (!$phrReport) {
                PhrNotificationSend::create([
                    'shishya_id' => $user->id,
                    'status' => 1,
                ]);
                Mail::to($user->email)->send(new DailyPhrEmail($user));
            }
        }
        $this->info('Daily report email sent successfully!');
    }
}
