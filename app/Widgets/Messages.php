<?php

namespace App\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;
use App\Message;

class Messages extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Message::count();
        $string = 'ข้อความ';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-paper-plane',
            'title'  => "{$count} {$string}",
            'text'   => __('คุณมี '.$count.' ข้อความในกล่องข้อความ สามารถคลิกที่ปุ่มด้านล่างเพื่อดูข้อมูล', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => 'ดูข้อความทั้งหมด',
                'link' => route('voyager.messages.index'),
            ],
            'image' => '/app-assets/images/mail-bg.jpg',
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    // public function shouldBeDisplayed()
    // {
    //     return Auth::user()->can('browse', Voyager::model('Post'));
    // }
}
