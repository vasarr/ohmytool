<?php

namespace App\Console\Commands\Elasticsearch;

use App\Models\Tool;
use Illuminate\Console\Command;

class SyncTools extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'es:sync-tools';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '将工具资源数据同步到 Elasticsearch.';

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
     * @return mixed
     */
    public function handle()
    {
        $es = app('es');
        Tool::query()->chunkById(100, function ($tools) use ($es) {
            $this->info(sprintf("正在同步 ID 范围为 %s 至 %s 的资源", $tools->first()->id, $tools->last()->id));

            // 初始化请求体
            $req = ['body' => []];

            foreach ($tools as $tool) {
                $data = $tool->toESArray();

                $req['body'][] = [
                    'index' => [
                        '_index' => 'tools',
                        '_type' => '_doc',
                        '_id' => $data['id'],
                    ],
                ];
                $req['body'][] = $data;
            }

            try {
                // 使用 bulk 方法批量创建
                $es->bulk($req);
            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }
        });
        $this->info('同步完成');
    }
}
