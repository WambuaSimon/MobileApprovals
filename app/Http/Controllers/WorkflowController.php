<?php

namespace App\Http\Controllers;

use App\WizMobAppWorkFlow;
use DB;
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
    // public function update(Request $request, $id)
    // {
    //     dd($request);
    //    $workflow = WizMobAppWorkFlow::find($id);

    //    $workflow->update($request->all());

    //     return response()->json(['success' => true, 'message' => 'Workflow has been updated successfully']);

    // }

    public function update(Request $request, $id)
    {
// dd($request->all());

        $workflow = WizMobAppWorkFlow::find($id);

        $sequence = json_decode($workflow->SequenceID);

        $position = array_search($request['LastGroup'], $sequence);

        $nextpos = $position + 1;

        $appStatus = '2';

        if ($nextpos > (sizeof($sequence) - 1)) {
            // dd(sizeof($sequence));
            $appStatus = '1';

        }

        $next = $sequence[$nextpos];

        // dd('not');

        DB::table('wiz_mob_app_work_flows')
            ->where('DocType', $id)
            ->update(
                [
                    // 'SequenceID' => $request['SequenceID'],
                    'AgentID' => $request['AgentID'],
                    'LastGroup' => $request['LastGroup'],
                    'LastAgent' => $request['LastAgent'],
                    'NextGroup' => $next,
                    'ApprovalStatus' => $appStatus,

                ]
            );
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

        // dd(Auth::user()->group);
        $grpids = WizMobAppWorkFlow::with('document.appStatus')->get()->map(function ($workflow) {

            $workflow->SequenceID = json_decode($workflow->SequenceID);
            // dd($workflow->SequenceID);
            return $workflow;

        });

        return response()->json(['success' => true, 'message' => 'Workflow Retrieved Successfully', 'documents' => $grpids]);
    }
}
