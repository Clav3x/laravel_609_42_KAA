<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalonSession;
use Illuminate\Support\Facades\DB;

class SalonSessionController extends Controller
{
    public function show($id)
    {
        $session = SalonSession::with('services', 'client')->findOrFail($id);

        $total = DB::table('rendered_services')
            ->select(DB::raw('SUM(actual_price) as total'))
            ->where('session_id', $id)
            ->first();

        return view('session', compact('session', 'total'));
    }
}
