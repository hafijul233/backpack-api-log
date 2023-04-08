<?php

namespace Laraflow\BackpackApiLog\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class BackpackApiLogCommand extends Command
{
    public $signature = 'backpack-api-log:install';

    public $description = 'This command will run actions required';

    public function handle(): int
    {
        try {
            if($this->confirm('Publish Config File', true)) {
                Artisan::call('vendor:publish');
            }

            return self::SUCCESS;

        } catch (\Exception $exception) {

            $this->error($exception->getMessage());

            return self::FAILURE;

        }
    }
}
