<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\SalonSession;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SalonSessionController extends Controller
{
    public function index(Request $request)
{
    $perpage = $request->perpage ?? 2;
    return view('sessions', [
        'sessions' => SalonSession::paginate($perpage)->withQueryString()
    ]);
}

    public function show($id)
    {
        $session = SalonSession::with('services', 'client')->findOrFail($id);

        $total = DB::table('rendered_services')
            ->select(DB::raw('SUM(actual_price) as total'))
            ->where('session_id', $id)
            ->first();

        return view('session', compact('session', 'total'));
    }

    public function create()
    {
        return view('session_create', [
            'users' => User::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id'     => 'required|integer',
            'beautician_id' => 'required|integer',
            'start_time'    => 'required|date',
            'end_time'      => 'required|date',
        ]);
        $session = new SalonSession($validated);
        $session->save();
        return redirect('/session');
    }

    public function edit(string $id)
    {
        return view('session_edit', [
            'session' => SalonSession::all()->where('id', $id)->first(),
            'users'   => User::all()
        ]);
    }

    public function update(Request $request, string $id)
    {
        if (! Gate::allows('update-session', SalonSession::all()->where('id', $id)->first())) {
            return redirect('/error')->with('message', 'У вас нет разрешения на редактирование сеанса номер ' . $id);
        }

        $validated = $request->validate([
            'client_id'     => 'required|integer',
            'beautician_id' => 'required|integer',
            'start_time'    => 'required|date',
            'end_time'      => 'required|date',
        ]);
        $session = SalonSession::all()->where('id', $id)->first();
        $session->client_id     = $validated['client_id'];
        $session->beautician_id = $validated['beautician_id'];
        $session->start_time    = $validated['start_time'];
        $session->end_time      = $validated['end_time'];
        $session->save();
        return redirect('/session');
    }

    public function destroy(string $id)
    {
        if (! Gate::allows('destroy-session', SalonSession::all()->where('id', $id)->first())) {
            return redirect('/error')->with('message', 'У вас нет разрешения на удаление сеанса номер ' . $id);
        }

        SalonSession::destroy($id);
        return redirect('/session');
    }
}