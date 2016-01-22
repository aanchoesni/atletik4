<?php

class SchoolsController extends \BaseController
{

    /**
     * Display a listing of schools
     *
     * @return Response
     */
    public function index()
    {
        $schools = School::all();

        return View::make('schools.index', compact('schools'))->withTitle('Sekolah');
    }

    public function indexdetail($id)
    {
        Session::forget('nocontest');
        $nocontest = Session::push('nocontest', Crypt::decrypt($id));
        $vcontest  = Session::get('nocontest');

        Session::put('contests', Input::get('nocontest'));
        $vcontests = Session::get('contests');

        $thn    = date('Y');
        $atlits = Contest::where('user_id', $vcontest)->where(DB::raw('tahun'), '=', $thn)->where('nocontest', $vcontests)->get();
        $school = School::where('user_id', $vcontest)->first();

        $jenjang = $school->jenjang;

        return View::make('schools.indexdetail', compact('atlits'))
            ->withTitle('Atlit')
            ->with('school', $school)
            ->with('jenjang', $jenjang)
            ->with('vcontests', $vcontests);
    }

    public function atlit()
    {
        $atlits = Contest::where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', '0')->with('akun')->get();

        return View::make('schools.atlit', compact('atlits'))
            ->withTitle('Belum Verifikasi');
    }

    public function atlitok()
    {
        $atlits = Contest::where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', '1')->with('akun')->get();

        return View::make('schools.atlit', compact('atlits'))
            ->withTitle('Belum Verifikasi');
    }

    /**
     * Show the form for creating a new school
     *
     * @return Response
     */
    public function create()
    {
        return View::make('schools.create');
    }

    /**
     * Store a newly created school in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), School::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        School::create($data);

        return Redirect::route('schools.index');
    }

    /**
     * Display the specified school.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $school = School::findOrFail($id);

        return View::make('schools.show', compact('school'));
    }

    /**
     * Show the form for editing the specified school.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $school = School::find(Crypt::decrypt($id));

        return View::make('schools.edit', compact('school'));
    }

    /**
     * Update the specified school in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $school = School::findOrFail($id);

        $validator = Validator::make($data = Input::all(), School::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $school->update($data);

        return Redirect::route('schools.index');
    }

    /**
     * Remove the specified school from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        School::destroy($id);

        return Redirect::route('schools.index');
    }

    public function verifikasi($id)
    {
        $vcontest = Session::get('nocontest');
        // Sessions::forget('nocontest');
        // dd($vcontest);
        DB::table('contests')
            ->where('id', $id)
            ->update(array(
                'verifikasi' => '1',
            ));

        return Redirect::to('admin/schools/indexdetail/' . Crypt::encrypt($vcontest) . '?nocontest=' . Session::get('contests'))->with("successMessage", "Berhasil diverifikasi");
    }

    public function notverifikasi($id)
    {
        $vcontest = Session::get('nocontest');
        DB::table('contests')
            ->where('id', $id)
            ->update(array(
                'verifikasi' => '0',
            ));

        return Redirect::to('admin/schools/indexdetail/' . Crypt::encrypt($vcontest) . '?nocontest=' . Session::get('contests'))->with("successMessage", "Verifikasi berhasil dibatalkan.");
    }

}
