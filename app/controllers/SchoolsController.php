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

    public function daftarsekolah()
    {
        $schools = School::all();

        return View::make('schools.daftarsekolah', compact('schools'))->withTitle('Sekolah');
    }

    public function indexdetail($id)
    {
        Session::forget('nocontest');
        $nocontest = Session::put('nocontest', Crypt::decrypt($id));
        $vcontest  = Session::get('nocontest');

        Session::put('contests', Input::get('nocontest'));
        $vcontests = Session::get('contests');

        $thn = date('Y');
        if ($vcontests) {
            $atlits = Contest::where('user_id', $vcontest)->where(DB::raw('tahun'), '=', $thn)->where('nocontest', $vcontests)->get();
        } else {
            $atlits = Contest::where('user_id', $vcontest)->where(DB::raw('tahun'), '=', $thn)->get();
        }
        $school = School::where('user_id', $vcontest)->first();

        $jenjang = $school->jenjang;

        return View::make('schools.indexdetail', compact('atlits'))
            ->withTitle('Atlit')
            ->with('school', $school)
            ->with('jenjang', $jenjang)
            ->with('vcontests', $vcontests);
    }

    public function pendamping($id)
    {
        $name     = Crypt::decrypt($id);
        $thn      = date('Y');
        $officers = Officer::where('user_id', $name)->where(DB::raw('YEAR(created_at)'), '=', $thn)->get();
        $school   = School::where('user_id', $name)->first();

        return View::make('officers.pendamping', compact('officers'))
            ->withTitle('Atlit')
            ->with('school', $school);
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
            ->withTitle('Sudah Verifikasi');
    }

    public function atlitallv()
    {
        return View::make('schools.atlitallv')->withTitle('Daftar Atlet');
    }

    public function exportatlet()
    {
        Session::put('attahun', Input::get('tahun'));
        Session::put('atjenjang', Input::get('jenjang'));

        $atlets = Contest::where('tahun', Session::get('attahun'))->where('jenjang', Session::get('atjenjang'))->where('verifikasi', '1')->where('nodada', '!=', '')->orderBy('user_id', 'asc')->get();

        // $atlets = Contest::leftJoin('schools', function ($join) {
        //     $join->on('contests.user_id', '=', 'schools.user_id');
        // })->where('tahun', Session::get('attahun'))->where('contests.jenjang', Session::get('atjenjang'))->where('verifikasi', '1')->orderBy('contests.user_id', 'asc')->get();

        $output = Input::get('output');

        switch ($output) {
            case 'PDF':
                return $this->exportPdfatlet($atlets);
                break;
            case 'EXCEL':
                return $this->exportExcelatlet($atlets);
                break;
            default:
                break;
        }
    }

    private function exportPdfatlet($atlets)
    {
        $name          = 'Daftar Atlet_' . date('m-d-Y') . '.pdf';
        $data['datas'] = $atlets;

        // dd($data);

        $pdf = PDF::loadView('schools.cetakatlet', $data)->setPaper('a4')->setOrientation('portrait');

        return $pdf->download($name);
    }

    private function exportExcelatlet($atlets)
    {
        $name = 'Daftar Atlet_' . date('m-d-Y');
        Excel::create($name, function ($excel) use ($atlets) {
            // Set the properties
            $name = 'Daftar Atlet_' . date('m-d-Y');
            $excel->setTitle($name)
                ->setCreator('Atletik Unesa ' . date('Y')); $excel->sheet($name, function ($sheet) use ($atlets) {

                if (Session::get('atjenjang') == 'SD') {
                    $jenjang = 'SD SEDERAJAT';
                } elseif (Session::get('atjenjang') == 'SMP') {
                    $jenjang = 'SMP SEDERAJAT';
                } elseif (Session::get('atjenjang') == 'SMA') {
                    $jenjang = 'SMA SEDERAJAT';
                }

                $sheet->mergeCells('A1:G1')
                    ->row(1, array('URUTAN ACARA TINGKAT ' . $jenjang));
                $sheet->mergeCells('A2:G2')
                    ->row(2, array('KEJUARAAN ATLETIK UNESA TAHUN ' . Session::get('skctahun')));
                $sheet->mergeCells('A3:G3')
                    ->row(3, array(Session::get('skclomba') . Session::get('skcseri')));
                $row = 5;

                $sheet->row($row, array(
                    'No. Lomba',
                    'No. Dada',
                    'Nama Siswa',
                    'Tahun',
                    'Asal Sekolah',
                    'Kabupaten',
                    'Hasil',
                    'Urutan',
                ));
                foreach ($atlets as $value) {
                    $sheet->row(++$row, array(
                        $value->nocontest,
                        $value->nodada,
                        $value->name,
                        date('Y', strtotime($value->tgllhr)),
                        $value->akun->first_name,
                        $value->sklh->adcity,
                        // $value->name,
                        // $value->adcity,
                    ));
                }
            });
        })->export('xls');

    }

    public function atlitser()
    {
        return View::make('schools.seratlet')->withTitle('Daftar Sertifikat Atlet');
    }

    public function exportseratlet()
    {
        Session::put('sattahun', Input::get('tahun'));
        Session::put('satjenjang', Input::get('jenjang'));

        $seratlets = Contest::where('tahun', Session::get('sattahun'))->where('jenjang', Session::get('satjenjang'))->where('verifikasi', '1')->where('nodada', '!=', '')->where('sertifikat', '1')->orderBy('user_id', 'asc')->get();

        return $this->exportExcelseratlet($seratlets);
    }

    private function exportExcelseratlet($seratlets)
    {
        $name = 'Daftar Atlet cetak Sertifikat_' . date('Y');
        Excel::create($name, function ($excel) use ($seratlets) {
            // Set the properties
            $name = 'Atlet Cetak Sertifikat_' . date('Y');
            $excel->setTitle($name)
                ->setCreator('Atletik Unesa ' . date('Y')); $excel->sheet($name, function ($sheet) use ($seratlets) {

                if (Session::get('satjenjang') == 'SD') {
                    $jenjang = 'SD SEDERAJAT';
                } elseif (Session::get('satjenjang') == 'SMP') {
                    $jenjang = 'SMP SEDERAJAT';
                } elseif (Session::get('satjenjang') == 'SMA') {
                    $jenjang = 'SMA SEDERAJAT';
                }

                $sheet->mergeCells('A1:G1')
                    ->row(1, array('CETAK SERTIFIKAT ' . $jenjang));
                $sheet->mergeCells('A2:G2')
                    ->row(2, array('KEJUARAAN ATLETIK UNESA TAHUN ' . Session::get('sattahun')));
                $row = 4;

                $sheet->row($row, array(
                    'No. Lomba',
                    'No. Dada',
                    'Nama Siswa',
                    'Tahun',
                    'Asal Sekolah',
                    'Kabupaten',
                ));
                foreach ($seratlets as $value) {
                    $sheet->row(++$row, array(
                        $value->nocontest,
                        $value->nodada,
                        $value->name,
                        date('Y', strtotime($value->tgllhr)),
                        $value->akun->first_name,
                        $value->sklh->adcity,
                    ));
                }
            });
        })->export('xls');

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
        $sekolah = School::where('id', $id)->first();
        // User::where('id', $sekolah->user_id)->delete($id);
        $data['activated'] = 0;
        User::where('id', $sekolah->user_id)->update($data);
        School::destroy($id);

        return Redirect::route('admin.daftarsekolah')->with('successMessage', 'Sekolah berhasil dihapus');
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
        // dd(Session::get('contests'));

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

        // dd(Session::get('contests'));
        return Redirect::to('admin/schools/indexdetail/' . Crypt::encrypt($vcontest) . '?nocontest=' . Session::get('contests'))->with("successMessage", "Verifikasi berhasil dibatalkan.");
    }

    public function destroycontesta($id)
    {
        DB::table('contests')->where('id', $id)->delete($id);

        return Redirect::to('admin/atlit')->with('successMessage', 'Atlet berhasil dihapus');
    }

    public function destroycontest($id)
    {
        $vcontest = Session::get('nocontest');
        DB::table('contests')->where('id', $id)->delete($id);

        return Redirect::to('admin/schools/indexdetail/' . Crypt::encrypt($vcontest) . '?nocontest=' . Session::get('contests'))->with("successMessage", "Atlet berhasil dihapus");
    }

}
