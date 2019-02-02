<?php

namespace App\Http\Controllers;
use DB;

use App\Evenement;
use App\Jaime;
use App\Inscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Commentaire;
use App\Photos_evenement;
use Illuminate\Http\Request;
use App\Notification;
use Illuminate\Support\Facades\Storage;
use Response;
class EvenementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $evenements = Evenement::where('publie', 1)->get();
        return view('evenements.index' , ['evenements' => $evenements]);
    }

    public function pasee()
    {
        //
        $status = "pasee";
        $evenements = Evenement::where('publie', 1)->where('date', '<', Carbon::now()->toDateString())->get();
        return view('evenements.index' , ['evenements' => $evenements,'status' => $status]);
    }

    public function avenir()
    {
        //
        $status = "avenir";
        $evenements = Evenement::where('publie', 1)->where('date', '>', Carbon::now()->toDateString())->get();
        return view('evenements.index' , ['evenements' => $evenements,'status' => $status]);
    }

    public function likec(Request $data)
    {
        $like_s = $data->like_s;
        $evenement_id = $data->evenement_id;

        $user = Auth::user();
        $like = $user->jaimes->where('evenement_id', $evenement_id)->where('user_id', $user->id)->where('Type_obj', 0)->first();
/*
        $like =  DB::table('jaimes')
        ->where('evenement_id', $evenement_id)
        ->where('user_id', Auth::user()->id)
        ->first();
*/        $id_util = $user->id;

        if (!$like) {
            if($data->Type_obj == 1){
            $new_like = new jaime;
            $new_like->evenement_id = $evenement_id;
            $new_like->user_id = Auth::user()->id;
            $new_like->like = 1;  
            $new_like->Type_obj = 0;
            $new_like->save();}

            if($data->Type_obj == 0){
                $new_like = new jaime;
                $new_like->evenement_id = $evenement_id;
                $new_like->user_id = Auth::user()->id;
                $new_like->like = 1;
                $new_like->Type_obj = 0;
                $new_like->save();}

            $is_like = 1;
        }
        elseif ($like->like == 1) {
            $like->delete();
            $is_like = 0;
        }
        elseif ($like->like == 0) {
            DB::table('jaimes')
            ->where('user_id', $id_util)
            ->update(['like' => 1]);
            $is_like = 1;
        }

        $response = array(
            'is_like'=>$is_like
        );

        return response()->json($response , 200);
    }


    public function like(Request $data)
    {
        $like_s = $data->like_s;
        $evenement_id = $data->evenement_id;

        $user = Auth::user();
        $like = $user->jaimes->where('evenement_id', $evenement_id)->where('user_id', $user->id)->where('Type_obj', 1)->first();
/*
        $like =  DB::table('jaimes')
        ->where('evenement_id', $evenement_id)
        ->where('user_id', Auth::user()->id)
        ->first();
*/        $id_util = $user->id;

        if (!$like) {
            if($data->Type_obj == 1){
            $new_like = new jaime;
            $new_like->evenement_id = $evenement_id;
            $new_like->user_id = Auth::user()->id;
            $new_like->like = 1;  
            $new_like->Type_obj = 1;
            $new_like->save();}

            if($data->Type_obj == 0){
                $new_like = new jaime;
                $new_like->evenement_id = $evenement_id;
                $new_like->user_id = Auth::user()->id;
                $new_like->like = 1;
                $new_like->Type_obj = 1;
                $new_like->save();}

            $is_like = 1;
        }
        elseif ($like->like == 1) {
            $like->delete();
            $is_like = 0;
        }
        elseif ($like->like == 0) {
            DB::table('jaimes')
            ->where('user_id', $id_util)
            ->update(['like' => 1]);
            $is_like = 1;
        }

        $response = array(
            'is_like'=>$is_like
        );

        return response()->json($response , 200);
    }

    public function enregistrement(Request $data)
    {
        $evenement_id = $data->evenement_id;
        $user = Auth::user();
        $inscription = $user->inscriptions->where('evenement_id', $evenement_id)->where('user_id', $user->id)->first();
        $is_sub=0;
        if (!$inscription) {

            $new_Inscription = new Inscription;
            $new_Inscription->evenement_id = $evenement_id;
            $new_Inscription->user_id = Auth::user()->id;
            $new_Inscription->save();

            $is_sub = 1;
        }
        else {
            $inscription->where('evenement_id', $evenement_id)->where('user_id', $user->id)->delete();
            $is_sub = 0;
        }

        $response = array(
            'is_sub'=>$is_sub
        );

        return response()->json($response , 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('evenements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function commenter(Request $data)
    {
if(Auth::check()){
        $comment = Commentaire::create([
            'contenu' => $data['contenu'],
            'evenement_id' => $data['evenement_id'],
            'id_utilisateur' => Auth::user()->id,
        ]);

        if($comment){   return back()->with('success' , 'Commentaire ajouter');    }
    }

    return back()->with('errors' , 'Vous devez etre connecté pour pouvoir commenter!');
}

    public function store(Request $data)
    {

        $evenement = new Evenement;
        $evenement->nom = $data->get('nom');
        $evenement->description = $data->get('description');
        $evenement->signal_eve = false;
        $evenement->status = false;
        $evenement->user_id = Auth::user()->id;
        $evenement->date = $data->get('date');;

if($data->hasFile('image')){
   $file = $data->file('image');
   $extension = $file->getClientOriginalExtension();
   $filename = time() . '.' . $extension;
   $destinationPath = public_path().'/images/evenement' ;
   $file->move($destinationPath,$filename);
$evenement->image = $filename; }else{$evenement->image = "test";}

         $evenement->save();

         return redirect('future');
    }

    public function ajoutimage(Request $data)
    {

        $photos=new Photos_evenement;
        $photos->id_utilisateur = Auth::user()->id;
        $photos->id_evenement = $data->id_evenement;

if($data->hasFile('image')){
   $file = $data->file('image');
   $extension = $file->getClientOriginalExtension();
   $filename = time() . '.' . $extension;
   $destinationPath = public_path().'/images/evenement' ;
   $file->move($destinationPath,$filename);
$photos->path = $filename; }else{$photos->path = "test";}

         $photos->save();

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
        $Photos_evenements = Photos_evenement::where('id_evenement',11)->get();
        /*$commentaires = Commentaire::find($evenement->id)->all();*/
       /* $commentaires = Commentaire::where('id_evenement', $evenement->id );*/
        return view('evenements.show' , ['evenement'=>$evenement,'Photos_evenements'=>$Photos_evenements]);
    }

    public function delvote(Request $data)
    {       $user = Auth::user();
        $rientrouver = 0;
        $evenement_id =$data->evenement_id;

        Evenement::where('id', $evenement_id)->update(array('publie' => 2));
        
      $response = array(
           /* 'is_vote'=>$is_vote,*/
            'rientrouver'=>$rientrouver
        );

        if($data->type_object=="evenment"){
            $new_Notif = new Notification;
            $new_Notif->status = 0;
            $new_Notif->id_utilisateur = Auth::user()->id;
            $new_Notif->likable_id = $evenement_id;
            $new_Notif->type = 1;
            $new_Notif->save();
        }
            
            return response()->json($response , 200);
        }


        
    

    public function delevent(Request $data)
    {       $user = Auth::user();
        $rientrouver = 0;
        $evenement_id =$data->evenement_id;

        Evenement::where('id', $evenement_id)->update(array('publie' => 2));
        
      $response = array(
           /* 'is_vote'=>$is_vote,*/
            'rientrouver'=>$rientrouver
        );

        return response()->json($response , 200);
    }


    public function delcom(Request $data)
    {       $user = Auth::user();
        $rientrouver = 0;
        $evenement_id =$data->evenement_id;

        Commentaire::where('id', $evenement_id)->update(array('publie' => 2));


        $new_Notif = new Notification;
        $new_Notif->status = 0;
        $new_Notif->id_utilisateur = 15;
        $new_Notif->likable_id = $evenement_id;
        $new_Notif->type = 3;
        $new_Notif->save();


      $response = array(
           /* 'is_vote'=>$is_vote,*/
            'rientrouver'=>$rientrouver
        );


        return response()->json($response , 200);
    }

    public function delp(Request $data)
    {   
        $rientrouver = 0;
        $evenement_id =$data->evenement_id;

Photos_evenement::where('id', $evenement_id)->update(array('signal_photo'=>1));

        $new_Notif = new Notification;
        $new_Notif->status = 0;
        $new_Notif->id_utilisateur = 15;
        $new_Notif->likable_id = $evenement_id;
        $new_Notif->type = 4;
        $new_Notif->save();


      $response = array(
           /* 'is_vote'=>$is_vote,*/
            'rientrouver'=>$rientrouver
        );


        return response()->json($response , 200);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function edit(Evenement $evenement)
    {
        //
        $evenement = Evenement::find($evenement->id);
        return view('evenements.edit' , ['evenement'=>$evenement]);
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
        //
        $evenemntupdate = Evenement::where('id' , $evenement->id)->update([
            'nom' => $request->input('nom'),
            'signal_eve' => 0,
            'description' => $request->input('description'),
            'publie' => 1
        ]);

        $new_Notif = new Notification;
        $new_Notif->status = 0;
        $new_Notif->id_utilisateur = $evenement->user_id;
        $new_Notif->likable_id = $evenement->id;
        $new_Notif->type = 0;
        $new_Notif->save();

        if($evenemntupdate){                 header("Location: http://bde-algerie.dz/");
        }


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

    public function download($id)
    {
        $photo = DB::table('photos_evenements')->where('id',$id)->first();
        
        $file = public_path()."/images/evenement/$photo->path";
        $header = array(
            'Content-Type: application/jpg',

        );

        return Response::download($file,$photo->path, $header);

    }

    public function downloads()
    {

        $file = public_path()."/config.pdf";
        $header = array(
            'Content-Type: application/pdf',

        );

        return Response::download($file,$photo->path, $header);

    }
}
