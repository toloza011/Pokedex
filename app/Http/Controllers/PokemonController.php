<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as Client;

class PokemonController extends Controller
{
    public function index(Client $client){
         
        $response = $client->request('GET','pokemon/?limit=13&offset=0');
        $data = json_decode($response->getBody());
        return view('index',compact('data','client'));
    }
  
    public function getPokemon(Client $client,Request $request){
        
        $response = $client->request('GET','pokemon/'.$request->pokemon);
        $data = json_decode($response->getBody());
        $infoPokemon = [
            'habilidades' => $data->abilities,
            'imagenes'=> $data->sprites,
            'stats'=>$data->stats,
            'nombre'=>$data->forms[0]->name,
            'altura'=>$data->height,
            'peso'=>$data->weight
        ];
        return $infoPokemon;
    }
    public function todos(Client $client,Request $request){
        $response = $client->request('GET','pokemon/?limit=1000');
        $data = json_decode($response->getBody());
        $pokemones = $data->results;
        //$pokemones = ["adsjsadj","jasdjsda"];
        return $pokemones;
    }
    public function searchPokemon(Client $client,Request $request){
         $query = $request->get('query');
         $response = $client->request('GET','pokemon/'.$request->pokemon);
         $data = json_decode($response->getBody());
         return $data["name"];
    }
    public function pokemon(Client $client,Request $request){
        $response = $client->request('GET','pokemon/'.$request->pokemon);
        $data = json_decode($response->getBody());
        $infoPokemon = [
            'habilidades' => $data->abilities,
            'imagenes'=> $data->sprites,
            'stats'=>$data->stats,
            'nombre'=>$data->forms[0]->name,
            'altura'=>$data->height,
            'peso'=>$data->weight
        ];
        //dd($infoPokemon);
        return view('infoPokemon',compact('infoPokemon'));
    }
    
}
