<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Offre;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    public function index(Request $request,string $view = null){
        $search_with_offers = $request->search_with_offers; // select of type of offres
        $search_with_maximum_price = $request->search_with_maximum_price; // maximum value of range price inserted by user
        $search_with_minimum_price = $request->search_with_minimum_price; // minimum value of range price inserted by user
        $MaxPrice = Offre::max('Price'); // maximum value of range price in database
        $MinPrice = Offre::min('Price'); // minimum value of range price in database
        $Images = Image::all(); // geting the path of image of all offers
        $Offres = // Filltring the offres
            $search_with_offers === 'all_offers' || $search_with_offers === null? // if selected all offers
            Offre::whereBetween('Price', [$search_with_minimum_price, $search_with_maximum_price])->get() // search with range of price
            :
            Offre::where('Type_Offre', '=', $search_with_offers) // search with offers
                 ->whereBetween('Price', [$search_with_minimum_price, $search_with_maximum_price]) // search with range of price
                 ->get(); // geting the data from database
            switch ($view){
                case 'Admin':
                    return view('Admin', compact('Offres', 'MaxPrice', 'MinPrice', 'Images'));
                case 'User':
                    return view('User', compact('Offres', 'MaxPrice', 'MinPrice', 'Images'));
                case 'Offres':
                    return view('Admin', compact('Offres', 'MaxPrice', 'MinPrice', 'Images'));
                case 'Favorites':
                    return view('Favorites', compact('Offres', 'MaxPrice', 'MinPrice', 'Images'));
                case '':
                    return view('welcome', compact('Offres', 'MaxPrice', 'MinPrice', 'Images'));
           }
    }

    public function create(){}

    public function store(Request $request){
        Offre::create($request->all());
        return back();
    }


    public function show(string $id){
        $Offre = Offre::find($id); // the offer selected
        $Images = Image::where('id_offer','=', $Offre->id)->get(); // geting the path of image has the same id of offer selected
        return view("Details",compact('Images','Offre'));
    }

    public function destroy(string $id){
        Offre::destroy($id);
        return redirect()->route('Offres.index');
    }

    public function edit(){}
    public function update(Request $request,$id){
        $Offres = Offre::find($id);
        $Offres->update($request->all());
        return redirect()->route('Offres.index');
    }
}

