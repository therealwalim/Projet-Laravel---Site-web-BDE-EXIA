<?php

namespace App\Http\Controllers;
use App\Vote;
use App\Evenement;
use App\Jaime;
use App\Inscription;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class IdeeController extends Controller
{


    public function delvote(Request $data)
    {
        $evenement_id =$data->evenement_id;
        $user = Auth::user();
        
        $evenement = Evenement::where('id',"1")->delete();
        $is_vote=0;
      $response = array(
            'is_vote'=>$is_vote
        );

        return response()->json($response , 200);
    }





    public function vote(Request $data)
    {
        $evenement_id = $data->evenement_id;
        $user = Auth::user();
        $vote = $user->votes->where('evenement_id', $evenement_id)->where('user_id', $user->id)->first();
        $is_vote=0;
        if (!$vote) {

            $new_Vote = new Vote;
            $new_Vote->evenement_id = $evenement_id;
            $new_Vote->user_id = Auth::user()->id;
            $new_Vote->save();

            $is_vote = 1;
        }
        else {
            $vote->where('evenement_id', $evenement_id)->where('user_id', $user->id)->delete();
            $is_vote = 0;
        }

        $response = array(
            'is_vote'=>$is_vote
        );

        return response()->json($response , 200);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $idees = Evenement::where('publie',0)->get();
        return view('boiteaidee.index' , ['idees' => $idees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('boiteaidee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        if(Auth::check()){
        $idee = Evenement::create([
            'nom' => $data['nom'],
            'description' => $data['description'],
            'date' => $data['date'],
            'image' => $data['image'],
            'signal_eve' => false,
            'status' => false,
            'publie' => 0,

        ]);if($idee){   return back()->with('success' , 'Commentaire ajouter');    }
    }
    return back()->with('errors' , 'Vous devez etre connecté pour pouvoir commenter!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function show(Evenement $evenement)
    {
        $evenement = Evenement::find($evenement->id);
        
        /*$commentaires = Commentaire::find($evenement->id)->all();*/
       /* $commentaires = Commentaire::where('id_evenement', $evenement->id );*/
        return view('evenements.show' , ['evenement'=>$evenement/*,'commentaires'=>$commentaires*/]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function edit(Evenement $evenement)
    {
        $evenements = Evenement::find($evenement->id);
        return view('boiteaidee.edit', ['evenement' => $evenements]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evenement $evenement)
    {
        $evenemntupdate = Evenement::where('id' , $evenement->id)->update([
             'nom' => $request->input('nom'),
             'publie' => $request->input('publie')

        ]);

        if($evenemntupdate){ return  redirect()->route('boiteaidee.index')->with('sucess' , 'idee publie avec success');}
        return back()->withInput();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evenement $evenement)
    {
        //
    }
}
