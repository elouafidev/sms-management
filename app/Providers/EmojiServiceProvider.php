<?php

namespace App\Providers;

use App\Libraries\Tombel\Phpemoji\PhpEmoji;
use Illuminate\Support\ServiceProvider;

class EmojiServiceProvider extends ServiceProvider
{

    protected $emoji;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('PhpEmoji', function () {
            return $this->emoji;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->emoji = new PhpEmoji;
    }
}
