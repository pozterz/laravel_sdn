<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\KnapSack;
use App\Http\Requests;

class KuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kk = KnapSack::all();
        return view('show',compact('kk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $MW = null;
        $arrw = array();
        $arrv = array();
        

        for($i = 0; $i < 5; $i++){
            $arrw[$i] = null;
        }

        for($i = 0; $i < 5; $i++){
            $arrv[$i] = null;
        }

        $res = 0;
        $ans = array();
        return view('index',compact('MW','arrw','arrv','res','ans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kk = KnapSack::all();
        return view('show',compact('kk'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kk[] = KnapSack::findOrFail($id);
        return view('show',compact('kk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tmp = KnapSack::findOrFail($id);
        $MW = null;
        $arrw = array();
        $arrv = array();
        
        for($i = 0; $i < 5; $i++){
            $arrw[$i] = null;
        }

        for($i = 0; $i < 5; $i++){
            $arrv[$i] = null;
        }

        $input1 = $tmp->MW;
        $input2 = $tmp->Best;
        $res = 0;
        $ans = array();
        return view('edit',compact('MW','arrw','arrv','res','ans','id','input1','input2','tmp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'Fahrenheit' => array('required','int'),
            'Celsius' => array('required','int')
        );

        $message = array('Fahrenheit.required' => 'Input Fahrenheit',
                            'Celsius.required' => 'Input Celsius',
        );

        $validator = Validator::make(Input::all(), $rules, $message);

        if ( $validator->passes() ){
            $Fahrenheit = Input::get('Fahrenheit');
            $Celsius = Input::get('Celsius');
            $newCelsius = (5/9)*($Fahrenheit-32);
            $newFahrenheit = ((9/5)*$Celsius)+32;

            $tmp = array(
                'Fahrenheit' => null,
                'Celsius' => null,
                'newCelsius' => null,
                'newFahrenheit' => null
                );

            $tmp['Fahrenheit'] = $Fahrenheit;
            $tmp['Celsius'] = $Celsius;
            $tmp['newCelsius'] = $newCelsius;
            $tmp['newFahrenheit'] = $newFahrenheit;

            $db = KnapSack::findOrFail($id);
            $db->update($tmp);
            return Redirect::to('/knap');
        }
         else{
            return Redirect::to('/knap/'.$id.'/edit')->withErrors($validator->messages());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
