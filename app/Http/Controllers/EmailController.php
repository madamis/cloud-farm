<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessActivity;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendEmail()
    {
        dispatch(new ProcessActivity());

        dd("email sent");
    }
}
