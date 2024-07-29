<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Telechargement;
use PhpParser\Node\Stmt\TryCatch;

class DownloadControllers extends Controller
{
    public function AjoutTelechargement(Request $request)
    {
       
        try{
            $telechargement = new Telechargement;
            $telechargement->nom =$request->input('nom');
            $telechargement->url =$request->input('url');
            $telechargement->type =$request->input('type');
            $telechargement->status = "en cours";
            $telechargement->emplacement=$request->input('emplacement');
            $telechargement->mimetype = $request->input("mimetype");
            $telechargement->save();
            return response()->json(['message'=>'donnée inseré'],200);
        }
        catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
        
    }

    public function ListeTelechargement()
    {
        try {
                $telechargement = Telechargement::all();
          
                if($telechargement->isEmpty())
                {
                    return response()->json(['message'=>'Aucun telechargement trouvé'],404);
                }
                else
                {
                    return $telechargement;
                }
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function Suppression($id)
    {
        try{
            $telechargement = Telechargement::findOrFail($id);
            $telechargement->delete();
            return response()->json(['message'=>'Telechargement supprimé'],200);
        }
        catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
    
        }
    }
    public function ModificationStatusEnTaille(Request $request , $nom)
    {
        try{
           
            $telechargement = Telechargement::where('nom',$nom)->firstOrFail();
            $telechargement->status = $request->input("taille");
            $telechargement->save();
            return response()->json(['message'=>'status modifié'],200);
        }
        catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }
}