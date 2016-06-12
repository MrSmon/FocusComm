<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\User;
use Session;
use DB;
use Request;

class BadgeController extends Controller
{
	// Affiche tous les badges
    public function index()
    {
        return Badge::all();
    }

	// Crée un nouveau badge
    public function create()
    {
        //
    }

	// Enregistre un nouveau badge dans la BD
    public function store()
    {
       $fields = Request::only('titre', 'image');
       if (!Badge::validate($fields)) {
           Message::error('form.fieldsError');
           return redirect()->back()->withInput();
       }

       $badge = new Badge($fields);
       $user = User::find(Session::get('user_id'));
       $user->badges()->save($badge);
       return $badge;
       
    }

	// Affiche un badge spécifique
    public function show($id)
    {
       $badge = Badge::find($id);
       if (!isset($badge)) {
           Message::error('badge.missing');
           return redirect()->back()->withInput();
       }
       return $badge;
    }

	// Edite un badge
    public function edit($id)
    {
        //
    }

    // Met à jour un badge
    public function update($id)
    {
       $badge = Badge::find($id);
       if (!isset($badge)) {
           Message::error('badge.missing');
           return redirect()->back()->withInput();
       }
       $fields = Request::all();
       if (!Badge::validate($fields)) {
           Message::error('form.fieldsError');
           return redirect()->back()->withInput();
       }
       $badge->update($fields);
       return $badge;
    }

	// Supprime le badge
    public function destroy($id)
    {
       $badge = Badge::find($id);
       if (!isset($badge)) {
           Message::error('badge.missing');
           return redirect()->back()->withInput();
       }
       $badge->delete();
       return $badge;
    }
}
