<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\View;
use App\Adinfo;
use App\Calculation;
use App\Clientinfo;
use App\Appinfo;
use App\Click;
class AppController extends Controller
{
	public function getNewApp()
	{
		return view('app.new');
	}
}
