<?php

class OfficersController extends \BaseController
{

    /**
     * Display a listing of officers
     *
     * @return Response
     */
    public function index()
    {
        $date         = \Carbon\Carbon::now();
        $thn          = date('Y');
        $menu         = Menu::where('tipe', Sentry::getUser()->last_name)->get();
        $announcement = Setting::first();

        // $officers = Officer::all();
        $officers = Officer::where('user_id', Sentry::getUser()->id)->where(DB::raw('YEAR(created_at)'), '=', $thn)->get();

        return View::make('officers.index', compact('officers'))
            ->withTitle('Petugas')
            ->with('menu', $menu)
            ->with('thn', $thn)
            ->with('announcement', $announcement);
    }

    public function indexthn()
    {
        $date         = \Carbon\Carbon::now();
        $thn          = Input::get('tahun');
        $menu         = Menu::where('tipe', Sentry::getUser()->last_name)->get();
        $announcement = Setting::first();

        // $officers = Officer::all();
        $officers = Officer::where('user_id', Sentry::getUser()->id)->where(DB::raw('YEAR(created_at)'), '=', $thn)->get();

        return View::make('officers.index', compact('officers'))
            ->withTitle('Petugas')
            ->with('menu', $menu)
            ->with('thn', $thn)
            ->with('announcement', $announcement);
    }

    /**
     * Show the form for creating a new officer
     *
     * @return Response
     */
    public function create()
    {
        $menu = Menu::where('tipe', Sentry::getUser()->last_name)->get();

        return View::make('officers.create')
            ->withTitle('Tambah Petugas')
            ->with('menu', $menu);
    }

    /**
     * Store a newly created officer in storage.
     *
     * @return Response
     */
    public function store()
    {
        $date = \Carbon\Carbon::now();
        $thn  = date('Y');

        // $officer = Officer::where('type', Input::get('type'))->where('user_id', Sentry::getUser()->id)->where(DB::raw('YEAR(created_at)'), '=', $thn)->count();

        // if ($officer < 1) {
        $validator = Validator::make($data = Input::all(), Officer::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (Input::hasFile('foto')) {
            $uploaded_file = Input::file('foto');
            // mengambil extension file
            $extension = $uploaded_file->getClientOriginalExtension();
            // membuat nama file random dengan extension
            $filename        = Input::get('nohp') . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'uploads/fotopetugas';
            // memindahkan file ke folder public/img
            $uploaded_file->move($destinationPath, $filename); // 25

            $data['sertifikat'] = Input::has('sertifikat') ? true : false;
            $data['foto']       = $filename;
            $data['user_id']    = Sentry::getUser()->id;
            Officer::create($data);

            return Redirect::route('user.officers.index')->with("successMessage", "Petugas berhasil disimpan");
        } else {
            return Redirect::back()->withErrors('File foto tidak ada')->withInput();
        }
        // } else {
        // return Redirect::route('user.officers.index')->with('errorMessage', trans(Input::get('type') . ' sudah ada.'));
        // }
    }

    /**
     * Display the specified officer.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $officer = Officer::findOrFail(Crypt::decrypt($id));

        return View::make('officers.show', compact('officer'))->withTitle('Cetak');
    }

    /**
     * Show the form for editing the specified officer.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $menu    = Menu::where('tipe', Sentry::getUser()->last_name)->get();
        $officer = Officer::find(Crypt::decrypt($id));

        return View::make('officers.edit', compact('officer'))
            ->withTitle('Ubah')
            ->with('menu', $menu);
    }

    /**
     * Update the specified officer in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $date = \Carbon\Carbon::now();
        $thn  = date('Y');
        $menu = Menu::where('tipe', Sentry::getUser()->last_name)->get();

        // $officer = Officer::where('type', Input::get('type'))->where('user_id', Sentry::getUser()->id)->where(DB::raw('YEAR(created_at)'), '=', $thn)->count();

        // if ($officer < 1) {
        $officer = Officer::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Officer::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (Input::hasFile('foto')) {
            $uploaded_file = Input::file('foto');
            // mengambil extension file
            $extension = $uploaded_file->getClientOriginalExtension();
            // membuat nama file random dengan extension
            $filename        = Input::get('nohp') . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'uploads/fotopetugas';
            // memindahkan file ke folder public/img
            $uploaded_file->move($destinationPath, $filename); // 25
            // ganti field cover dengan cover yang baru

            $officer->foto = $filename;
        }

        $officer['sertifikat'] = Input::has('sertifikat') ? true : false;
        if (!$officer->update(Input::except('foto')) && $data['sertifikat'] = Input::has('sertifikat') ? true : false) {
            return Redirect::back();
        }
        // $officer->update($data);

        return Redirect::route('user.officers.index')->with("successMessage", "Data petugas berhasil diubah");
        // } else {
        //     return Redirect::route('user.officers.index')->with('errorMessage', trans(Input::get('type') . ' sudah ada.'));
        // }
    }

    /**
     * Remove the specified officer from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $officer         = Officer::findOrFail($id);
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'uploads/fotopetugas' . DIRECTORY_SEPARATOR . $officer->foto;
        try {
            File::delete($destinationPath);
        } catch (FileNotFound $e) {
            // File sudah dihapus/tidak ada
        }

        Officer::destroy($id);

        return Redirect::route('user.officers.index')->with("successMessage", "Data petugas berhasil dihapus");
    }

    public function rekappendamping()
    {
        return View::make('officers.rekap')->withTitle('Rekap Pendamping');
    }

    public function exportrekappendamping()
    {
        Session::put('softahun', Input::get('tahun'));
        // Session::put('sofjenjang', Input::get('jenjang'));
        $pilihan = Input::get('pilihan');
        if ($pilihan == 'Daftar') {
            $officers = Officer::where(DB::raw('YEAR(created_at)'), '=', Session::get('softahun'))->orderBy('user_id', 'asc')->get();
        } else if ($pilihan == 'Sertifikat') {
            $officers = Officer::where(DB::raw('YEAR(created_at)'), '=', Session::get('softahun'))->where('sertifikat', '1')->orderBy('user_id', 'asc')->get();
        }

        return $this->exportExcelseratlet($officers, $pilihan);
    }

    private function exportExcelseratlet($officers, $pilihan)
    {
        if ($pilihan == 'Daftar') {
            $name = 'Daftar Rekap Pendamping_' . date('Y');
            Excel::create($name, function ($excel) use ($officers) {
                // Set the properties
                $name = 'Daftar Pendamping_' . date('Y');
                $excel->setTitle($name)
                    ->setCreator('Atletik Unesa ' . date('Y')); $excel->sheet($name, function ($sheet) use ($officers) {

                    // if (Session::get('sofjenjang') == 'SD') {
                    //     $jenjang = 'SD SEDERAJAT';
                    // } elseif (Session::get('sofjenjang') == 'SMP') {
                    //     $jenjang = 'SMP SEDERAJAT';
                    // } elseif (Session::get('sofjenjang') == 'SMA') {
                    //     $jenjang = 'SMA SEDERAJAT';
                    // }

                    $sheet->mergeCells('A1:D1')
                        ->row(1, array('REKAP PENDAMPING '));
                    $sheet->mergeCells('A2:D2')
                        ->row(2, array('KEJUARAAN ATLETIK UNESA TAHUN ' . Session::get('softahun')));
                    $row = 4;

                    $sheet->row($row, array(
                        'Nama',
                        'No. HP',
                        'Jenis Pendamping',
                        'Asal Sekolah',
                        'Jenjang',
                    ));
                    foreach ($officers as $value) {
                        $sheet->row(++$row, array(
                            $value->name,
                            $value->nohp,
                            $value->type,
                            $value->akun->first_name,
                            $value->akun->last_name,
                        ));
                    }
                });
            })->export('xls');
        } else if ($pilihan == 'Sertifikat') {
            $name = 'Daftar Sert Pendamping_' . date('Y');
            Excel::create($name, function ($excel) use ($officers) {
                // Set the properties
                $name = 'Daftar Sert. Pendamping_' . date('Y');
                $excel->setTitle($name)
                    ->setCreator('Atletik Unesa ' . date('Y')); $excel->sheet($name, function ($sheet) use ($officers) {

                    // if (Session::get('sofjenjang') == 'SD') {
                    //     $jenjang = 'SD SEDERAJAT';
                    // } elseif (Session::get('sofjenjang') == 'SMP') {
                    //     $jenjang = 'SMP SEDERAJAT';
                    // } elseif (Session::get('sofjenjang') == 'SMA') {
                    //     $jenjang = 'SMA SEDERAJAT';
                    // }

                    $sheet->mergeCells('A1:D1')
                        ->row(1, array('REKAP SERTIFIKAT PENDAMPING '));
                    $sheet->mergeCells('A2:D2')
                        ->row(2, array('KEJUARAAN ATLETIK UNESA TAHUN ' . Session::get('softahun')));
                    $row = 4;

                    $sheet->row($row, array(
                        'Nama',
                        'No. HP',
                        'Jenis Pendamping',
                        'Asal Sekolah',
                        'Jenjang',
                    ));
                    foreach ($officers as $value) {
                        $sheet->row(++$row, array(
                            $value->name,
                            $value->nohp,
                            $value->type,
                            $value->akun->first_name,
                            $value->akun->last_name,
                        ));
                    }
                });
            })->export('xls');
        }
    }

    public function bukudokumentasi()
    {
        return View::make('docbooks.rekap')->withTitle('Rekap Buku Dokumentasi');
    }

    public function exportdocbook()
    {
        Session::put('dtahun', Input::get('tahun'));

        $docbooks = Docbook::rightJoin('payments', function ($join) {
            $join->on('docbooks.user_id', '=', 'payments.user_id');
        })->rightJoin('schools', function ($join) {
            $join->on('schools.user_id', '=', 'docbooks.user_id');
        })->where('payments.year', Session::get('dtahun'))->where('payments.verifikasi', '1')->orderBy('payments.user_id', 'asc')->where('docbooks.docbook', '1')->get();
        // dd($docbooks);
        // $docbooks = Docbook::where(DB::raw('YEAR(created_at)'), '=', Session::get('dtahun'))->where('docbook', '1')->orderBy('user_id', 'asc')->get();

        return $this->exportExceldocbook($docbooks);
    }

    private function exportExceldocbook($docbooks)
    {
        $name = 'Daftar Cetak Buku_' . date('Y');
        Excel::create($name, function ($excel) use ($docbooks) {
            // Set the properties
            $name = 'Daftar Cetak Buku_' . date('Y');
            $excel->setTitle($name)
                ->setCreator('Atletik Unesa ' . date('Y')); $excel->sheet($name, function ($sheet) use ($docbooks) {

                $sheet->mergeCells('A1:D1')
                    ->row(1, array('REKAP CETAK BUKU DOKUMENTASI '));
                $sheet->mergeCells('A2:D2')
                    ->row(2, array('KEJUARAAN ATLETIK UNESA TAHUN ' . Session::get('dtahun')));
                $row = 4;

                $sheet->row($row, array(
                    'Sekolah',
                    'Kota/Kabupaten',
                ));
                foreach ($docbooks as $value) {
                    $sheet->row(++$row, array(
                        $value->name,
                        $value->adcity,
                    ));
                }
            });
        })->export('xls');
    }
}
