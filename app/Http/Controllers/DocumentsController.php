<?php

namespace App\Http\Controllers;

use App\WizMobAppDocument;
use DB;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doc = WizMobAppDocument::with('appStatus')->get();
        return response()->json(['success' => true, 'message' => 'Documents Retrieved Successfully', 'documents' => $doc]);

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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($DocType)
    {

        $DocType1 = WizMobAppDocument::with('workflow')->where('DocType', $DocType)->get();
        // dd($DocType1);
        if (is_null($DocType1)) {
            return 'Document Not found';
        }
        return response()->json(['Success' => true, 'document' => $DocType1]);
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
        DB::table('wiz_mob_app_documents')
            ->where('id', $id)
            ->update(
                ['RejectionReason' => $request['RejectionReason'], 'AppStatus' => $request['AppStatus']]
            );
        return response()->json(['success' => true, 'message' => 'Document has been updated successfully']);

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
