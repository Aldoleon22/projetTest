<?php

namespace App\Http\Controllers;

use App\Models\Vehicules;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //insertion vehicule
    public function InsertVehicule(Request $req)
    {
        $this->validate($req,[
            "marque" =>  "required",
            "matricule" => "required",
            "photo" => "required|image|mimes:jpeg,png,jpg,gif"
        ]);

        if ($req->hasFile('photo')) {
            $image = $req->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            //stockez le fichier
            $image->storeAs('ImageVehicule',$imageName,'public');

            //insertion des donnes dans le tabele vehicule
            $InsertVehicul = new Vehicules();
            $InsertVehicul->marque = $req->input('marque');
            $InsertVehicul->matricule = $req->input('matricule');
            $InsertVehicul->photo = $imageName;
            $InsertVehicul->save();
            $error = 'Succee!';

            return back();

        }
    }
}
