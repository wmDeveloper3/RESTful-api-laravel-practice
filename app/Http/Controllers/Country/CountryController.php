<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CountryModel;
// use Validator;

class CountryController extends Controller
{
    public function country (){
        return response()->json(CountryModel::get(), 200);
    }

    public function countryById($id){
        $country = CountryModel::find($id);

        if (is_null($country)) {
            return response()->json("Record not found.!", 404);
        }
        return response()->json($country, 200);
    }

    public function countrySave(Request $request){
        // $validator = $request->validate([
        //     'name' => 'required|min:3',
        //     'iso' => 'required|min:2|max:2'
        // ]);

        // if ($validator->)



        $country = CountryModel::create($request->all());

        return response()->json($country, 201);
    }

    public function countryUpdate(Request $request, $id)
    {
        $country = CountryModel::find($id);

        if (is_null($country)) {
            return response()->json("Record not found.!", 404);
        }

        $country->update($request->all());

        return response()->json($country, 200);
    }

    public function countryDelete($id)
    {
        $country = CountryModel::find($id);

        if (is_null($country)) {
            return response()->json("Record not found.!", 404);
        }

        $country->delete();

        return response()->json(null, 204);
    }
}
