<?php

namespace App\Jobs;

use App\Models\Tool;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncOneToolToES implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $tool;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Tool $tool)
    {
        $this->tool = $tool;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->tool->toESArray();
        app('es')->index([
            'index' => 'tools',
            'type' => '_doc',
            'id' => $data['id'],
            'body' => $data,
        ]);
    }
}
