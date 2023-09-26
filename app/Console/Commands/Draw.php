<?php

namespace App\Console\Commands;

use App\Services\LottoService;
use Illuminate\Console\Command;

class Draw extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:draw';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lancement du tirage de PayDunya Lotto';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $lottoService = new LottoService();
        $lottoService->draw(); // tirage et distribution des grains
    }
}
