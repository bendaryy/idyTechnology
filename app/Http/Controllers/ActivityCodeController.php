<?php

namespace App\Http\Controllers;

use App\Models\Activitycode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityCodeController extends Controller
{
    public function index()
    {
        $activityCodes = Activitycode::all();
        return view('activitycodes.index', compact('activityCodes'));
    }

    public function create()
    {
        return view('activitycodes.create');
    }
    public function edit($id)
    {
        $activitycode = Activitycode::find($id);

        return view('activitycodes.edit', compact('activitycode'));
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

        $request->validate([
            'code' => 'required',
            'Desc_ar' => 'required',
        ]);

        DB::table('activity_code')
            ->where('id', $id)
            ->update([
                'code' => $request->code,
                "Desc_ar" => $request->Desc_ar,
            ]);

        session()->flash('message', 'تم التعديل بنجاح');

        return redirect()->route('activity');

    }

    public function store(Request $request)
    {

        $newcode = new Activitycode();
        $newcode->code = $request->code;
        $newcode->Desc_ar = $request->Desc_ar;
        $newcode->save();

        session()->flash('message', 'تمت الإضافة بنجاح');

        return redirect()->route('activity');

    }

    public function destroy($id)
    {
        $activitycode = Activitycode::find($id);
        $activitycode->delete();
        session()->flash('message', 'تم المسح بنجاح');
        return redirect()->route('activity');
    }
}
