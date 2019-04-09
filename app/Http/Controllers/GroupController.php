<?php

namespace App\Http\Controllers;
use App\WizMobAppGroup;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grp = WizMobAppGroup::all();
        return response()->json(['Success' => true, 'message' => 'Groups Retrieved Successfully', 'groups' => $grp]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grpCtrl = WizMobAppGroup::with('agents')->find($id);
        if (is_null($grpCtrl)) {
            return 'Group Not found';
        }

        return response()->json(['Success' => true,  'group' => $grpCtrl]);



        // $DocType1 = WizMobAppDocument::with('workflow')->where('DocType', $DocType)->get();
        // // dd($DocType1);
        // if (is_null($DocType1)) {
        //     return 'Document Not found';
        // }
        // return response()->json(['Success' => true, 'document' => $DocType1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
