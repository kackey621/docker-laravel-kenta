<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\InputData;

class InputController extends Controller
{
    public function show(){
        $data = InputController::getData();
        $data = InputController::registerData($data);

        return $data;

    }

    public function getData ($query="PowerBalance") 
    {
        $curl = curl_init();
        $url = "https://serpapi.webscrapingapi.com/v1?api_key=tvtFpr5MvNzkCeRAHfl1YnOibGEU1VE4&engine=google_scholar&lr=lang_en&&q=".$query;

        curl_setopt_array($curl, [
            CURLOPT_URL =>  $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $returns ="";

        if ($err) {
            return -1;
        } else {
             return $response;
        }
            // $txt = Storage::get('query.txt');
            // return $txt;
    }

    public function registerData($jsons){

        if($jsons==-1) return 0;

        $jsons = json_decode($jsons,true);
        $jsons = $jsons["organic_results"];

        foreach($jsons as $value){

            $InputV = new InputData();

            $title = $value["title"];
            $url = $value["link"];

            $InputV->title = $title;
            $InputV->url = $url;

            $InputV->save();
        }
        
        return InputController::showv();
    }

    public function showv(){

        $values = InputData::all();
        return view('inputshow', compact('values'));
        
    }
}
