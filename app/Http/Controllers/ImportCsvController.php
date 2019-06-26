<?php

namespace App\Http\Controllers;

use DB;
use App\Imports\CsvImport;
use App\Http\Requests;
use Illuminate\Http\Request;
use Input;
use App\Post;
use Session;
use Excel;

class ImportCsvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index()
        {
            $data = DB::table('beneficiaries')->orderBy('id', 'DESC')->get();
            return view('After.excel', compact('data'));
        }

    public function csv_import(Request $request){
            if($request->hasFile('import_file')){
                Excel::load($request->file('import_file')->getRealPath(), function ($reader) {
                    foreach ($reader->toArray() as $key => $row) {
                        $data['title'] = $row['title'];
                        $data['description'] = $row['description'];
                        if(!empty($data)) {
                            DB::table('post')->insert($data);
                        }
                    }
                });
            }
            Session::put('success', 'Youe file successfully import in database!!!');

            return back();
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
     * @param  \App\Import_csv  $import_csv
     * @return \Illuminate\Http\Response
     */
    public function show(Import_csv $import_csv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Import_csv  $import_csv
     * @return \Illuminate\Http\Response
     */
    public function edit(Import_csv $import_csv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Import_csv  $import_csv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Import_csv $import_csv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Import_csv  $import_csv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Import_csv $import_csv)
    {
        //
    }
}
