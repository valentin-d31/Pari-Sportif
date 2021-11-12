<?php

namespace App\Http\Controllers;

use App\User;
use App\Match;
use App\Equipe;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin', 'auth']);
    }

    public function index()
    {
        $matchs =  Match::orderBy("cote", 'desc')->get();
        $users =  User::orderBy("name", 'ASC')->paginate(50);

        return view('admin.index', compact(["matchs", "users"]));
    }

    public function create()
    {
        $equipes = Equipe::all();

        $match = new Match();
        $match->equipes()->attach($equipes);

        return view('admin.create', compact('match'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'pays' => 'required',
            'cote' => 'required|integer',
            'duree' => 'required|integer',
            'equipe_id' => 'required|integer',
            'match_id' => 'required|interger',
            'image' => 'image',
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("/storage/{$imagePath}"))->fit(60, 60);
        $image->save();

        Match::create([
            'name' => $data['name'],
            'pays' => $data['pays'],
            'cote' => $data['cote'],
            'duree' => $data['duree'],
            'equipe_id' => $data['equipe_id'],
            'match_id' => $data['match_id'],
            'image' => $imagePath
        ]);

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
            'equipe_id' => 'required|integer',
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
