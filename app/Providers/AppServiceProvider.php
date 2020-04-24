<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // โหลดไฟล์ Helpers
        foreach (glob(app_path() . '/Helpers/*.php') as $filename) {
            require_once($filename);
        }

        // ตั้งค่า public folder path ใหม่ เพื่อทำ store link เนื่องจาก default ของ laravel ใช้ชื่อ public โฟล์เดอร์
        // ตั้งค่าแล้วรันคำสั่ง php artisan storage:link
        // $this->app->bind('path.public', function() {
        //     return base_path('../public_html/oasis');
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
