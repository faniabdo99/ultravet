<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller{
    public function getSwitchCurrency(Request $r) {
        session(['currency' => $r->currency]);
        return back();
    }
}
