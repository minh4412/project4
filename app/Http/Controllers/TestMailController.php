<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendToUser;
use Illuminate\Support\Facades\Mail;

class TestMailController extends Controller
{
    public function testmail(){
        $detail = [
            'title' => 'Notification email',
            'messenge' => 'You have a new unprocessed order.'
        ];
        Mail::to("nguyentriminh505@gmail.com")->send(new SendToUser);
    }
}
