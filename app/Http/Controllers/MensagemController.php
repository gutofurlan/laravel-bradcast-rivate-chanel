<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensagem;
use App\Events\PrivateEvent;

class MensagemController extends Controller
{
    public function index(Request $request) {
        if($request->getMethod() == 'GET') {
            return view('form');
        }
        if($request->getMethod() == 'POST') {
            $data = $request->all();
            $m = new Mensagem($data);
            $m->save();
            $e = new PrivateEvent($m, auth()->user());
            event($e);
        }
    }
}
