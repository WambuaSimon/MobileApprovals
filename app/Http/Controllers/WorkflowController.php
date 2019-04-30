<?php

namespace App\Http\Controllers;

use App\WizMobAppWorkFlow;
use DB;
use Auth;
use Illuminate\Http\Request;

class WorkflowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
    //    $request->SequenceID = json_encode($request->SequenceID);
        // dd($request);
        $workflow = WizMobAppWorkFlow::create($request->all());
        return response()->json(['Success' => true, 'message' => 'Workflow created successfully', 'workflow' => $workflow]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        DB::table('wiz_mob_app_work_flows')
            ->where('id', $id)
            ->update(['SequenceID' => $request['SequenceID']]);
        return response()->json(['success' => true, 'message' => 'Workflow has been updated successfully']);

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

    public function groupDocs()
    {
        $grpid = WizMobAppWorkFlow::with('document')->where('groupID', Auth::user()->id)->get();
        return $grpid;
        return response()->json(['success' => true, 'message' => 'Workflow Retrieved Successfully', 'documents' => $grpid]);
    }
}
