<?php

namespace App\Http\Controllers;
use DB;
use App\categorie;
use App\produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Commande;
use App\ProduitCommande;
use App\Notification;

class ControllerProduit extends Controller
{
    
     protected $produit;

    public function __construct(produit $produit)
    {
        $this->produit = $produit;
    }

    
    



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $produit = $this->produit->paginate(6);
        $TopProduit = produit::orderBy('nmbrvendu', 'DESC')->limit(3)->get();

        if ($request->ajax()) {
            return view('produit.load', ['produit' => $produit])->render();  
        }
        return view('produit.index',  ['produit' => $produit], ['TopProduit' => $TopProduit]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    { 
        $produit = new produit;
        $produit->nom = $data->get('nom');
        $produit->description = $data->get('description');
        $produit->stock = $data->get('stock');
        $produit->prix = $data->get('prix');

if($data->hasFile('image')){
   $file = $data->file('image');
   $extension = $file->getClientOriginalExtension();
   $filename = time() . '.' . $extension;
   $destinationPath = public_path().'/images/produit' ;
   $file->move($destinationPath,$filename);
    $produit->image = $filename; }else{$produit->image = "test";}

         $produit->save();
        
    }


    public function panier(produit $produit)
    {
        if (Auth::check()){
        $user=Auth::user();
        $panier = Commande::where('user_id', $user->id)->where('etat', 1)->first();
        $produits = ProduitCommande::where('id_commande', $panier->id)->get();
        $nomProduit = Produit::all();
        if(!$panier){$panierExist=0;}else{$panierExist=1;}

        return view('produit.panier' , ['panier' => $panier , 'produits' => $produits,'nomProduit' => $nomProduit]);
        }
        else{echo("Vous devez etre connecter!");}
    }


    public function notification(produit $produit)
    {
        if (Auth::check()){
        $user=Auth::user();
        $notifications = Notification::where('id_utilisateur', $user->id)->get();
        if(!$notifications){$panierExist=0;}else{$panierExist=1;}

        return view('produit.notification' , ['notifications' => $notifications]);
        }
        else{echo("Vous devez etre connecter!");}
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(produit $produit)
    {
        return view('produit.index');

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(produit $produit)
    {
        //
    }
public function produitsCat(Request $request){
       
       $cat_id = $request->cat_id;
       $search = $request->search;
       $priceCount = count($request->price);

       // price are array
       if($cat_id!="" && $priceCount!="0" && $search!=""){

         $price = explode("-",$request->price);
          $start = $price[0];
          $end = $price[1];

          //echo "both are selected";
          $produit = DB::table('produits')
          ->where('produits.categorie',$cat_id)
          ->where('produits.nom', 'like', '%' . $search . '%')
          ->where('produits.prix', ">=", $start)
          ->where('produits.prix', "<=", $end)
          ->paginate(3);
         

       }else if($cat_id!="" && $priceCount!="0" && $search==""){

         $price = explode("-",$request->price);
          $start = $price[0];
          $end = $price[1];

          //echo "both are selected";
          $produit = DB::table('produits')
          ->where('produits.categorie',$cat_id)
          ->where('produits.prix', ">=", $start)
          ->where('produits.prix', "<=", $end)
          ->paginate(3);

       }else if($priceCount!="0" && $search=="" && $cat_id=="" ){
         $price = explode("-",$request->price);
         $start = $price[0];
         $end = $price[1];

         //echo "price is selected";
         $produit = DB::table('produits')
         ->where('produits.prix', ">=", $start)
         ->where('produits.prix', "<=", $end)
         ->paginate(3);

       }
       else if($cat_id!=""&& $priceCount=="0" && $search=="" ){
         //echo "cat is selected";
         $produit = DB::table('produits')
         ->where('produits.categorie',$cat_id)
         ->paginate(3);
       }
       else if($search!="" && $cat_id!="" && $priceCount=="0" ){
         //echo "cat is selected";
         $produit = DB::table('produits')
         ->where('produits.categorie',$cat_id)
         ->where('produits.nom', 'like', '%' . $search . '%') 
         ->paginate(3);
       }
       else if($search!="" && $cat_id=="" && $priceCount=="0" ){
         //echo "cat is selected";
         $produit = DB::table('produits')
         ->where('produits.nom', 'like', '%' . $search . '%') 
         ->paginate(3);
       }
       else if($search!="" && $cat_id=="" && $priceCount!="0" ){
         //echo "cat is selected";
         $price = explode("-",$request->price);
          $start = $price[0];
          $end = $price[1];

          //echo "both are selected";
          $produit = DB::table('produits')
          ->where('produits.nom', 'like', '%' . $search . '%')
          ->where('produits.prix', ">=", $start)
          ->where('produits.prix', "<=", $end)
          ->paginate(3);
       }
       else if($cat_id=="" && $priceCount=="0" && $search==""){
        $produit = $this->produit->paginate(6);
       }

     /*  else{
         //echo "nothing is slected";
         return "<h1 align='center'>Please select atleast one filter from dropdown</h1>";

       }*/
       if(count($produit)=="0"){
         echo "<h1 align='center'>no products found under this Category</h1>";
       }else if ($request->ajax()) {
            return view('produit.load', ['produit' => $produit])->render();  
        }
        $TopProduit = produit::orderBy('nmbrvendu', 'DESC')->limit(3)->get();

    }




    function fetch(request $request)
    {
      if($request->get('query'))
        {
         $query= $request->get('query');
         $data = DB::table('produits')
             ->where('produits.nom','like', '%'.$query.'%')
             ->get();
         $output = '<ul class="dropdown-menu" style="display:block; position:relative;">';
         foreach($data as $row)
         {
            $output .= '<li><a href="#">'.$row->nom.'</a></li>';
         }
          $output.='</ul>' ;
          echo $output;
       }
    
    }


    public function add(Request $data)
    {
        $evenement_id = $data->evenement_id;
        $user=Auth::user();
        $is_sub=0;
        $commande = Commande::where('user_id', $user->id)->where('etat', 1)->first();
        $status = "0";
        if (!$commande) {
            $new_Commande = new Commande;
            $new_Commande->user_id = Auth::user()->id;
            $new_Commande->save();
            $new_Produit = new ProduitCommande;

            $new_Produit->id_produit = $data->produit_id;;
            $new_Produit->id_commande = $new_Commande->id;
            $new_Produit->save();
        } else{
            $new_Produit = new ProduitCommande;
            $new_Produit->id_produit = $data->produit_id;;
            $new_Produit->id_commande = $commande->id;
            $new_Produit->save();
        }
        $response = array(
            'is_sub'=>$is_sub
        );

        return response()->json($response , 200);
    }


}
