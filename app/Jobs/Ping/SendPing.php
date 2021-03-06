<?php

namespace App\Jobs\Ping;

use JJG\Ping;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendPing implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ping = \App\Models\Ping::first();

        $text = trim($ping->ping_list);
        $textAr = preg_split('/[\n\r]+/', $text);

        // remove any extra \r characters
        $textAr = array_filter($textAr, 'trim');

        foreach ($textAr as $index => $host) {
            $ping = new Ping($host);
            $latency = $ping->ping();
            if ($latency !== false) {
                Log::info('Latency is ' . $latency . ' ms : ' . $host);
            } else {
                Log::error('Host could not be reached. : ' . $host);
            }
            unset($ping);
        }
    }
}
