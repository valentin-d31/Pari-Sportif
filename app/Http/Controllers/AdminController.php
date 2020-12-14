<?php

namespace App\Http\Controllers;

use App\Match;
use App\Equipe;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin', 'auth']);
    }

    public function index()
    {
        $matchs =  Match::orderBy("cote", 'desc')->get();

        return view('admin.index', compact('matchs'));
    }

    public function create()
    {
        $equipes = Equipe::all();
        $match = new Match();

        return view('admin.create', compact('equipes', 'match'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'pays' => 'required',
            'cote' => 'required|integer',
            'duree' => 'required|integer',
            'equipe_id' => 'required|integer',
            //'equipe_A' => 'required|integer',
            //'equipe_B' => 'required|integer',
        ]);

        $match = Match::create($data);

        return redirect()
            ->route('admin.index', compact('match'))
            ->with('success', 'Le match a bien été créer.');
    }

    public function show($match)
    {
        $match = Match::where('id', $match)->first();

        if (!$match) {
            return abort(404);
        }

        return view('admin.show', compact('match'));
    }

    public function edit($match)
    {
        $equipes = Equipe::all();
        $match = Match::where('id', $match)->first();

        if (!$match) {
            return abort(404);
        }

        return view('admin.edit', compact('match', 'equipes'));
    }

    public function update($match)
    {
        $match = Match::where('id', $match)->first();

        if (!$match)
            return abort(404);


        $data = request()->validate([
            'name' => 'required',
            'pays' => 'required',
            'cote' => 'required|integer',
            'duree' => 'required|integer',
            'equipe_id' => 'required|integer'

        ]);

        if ($match->update($data)) {
            return redirect('admin/')
                ->with('success', 'Le match a bien été modifié');
        }

        return redirect()
            ->route('admin.show', ['id' => $match])
            ->with('error', 'Une erreur est survenue. Le match n\'a pas été modifié');
    }

    public function destroy($match)
    {
        $match = Match::where('id', $match)->first();

        if (!$match) {
            return abort(500);
        }

        if ($match->delete()) {
            return redirect('admin/')
                ->with('success', 'Le match a bien été supprimé');
        }

        return redirect()
            ->route('admin.show', ['id' => $match])
            ->with('error', 'Une erreur est survenue. Le match n\'a pas été supprimé');
    }
}
