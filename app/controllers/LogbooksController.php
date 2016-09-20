<?php

class LogbooksController extends \BaseController
{

    /**
     * Display a listing of logs
     *
     * @return Response
     */
    public function index()
    {
        $logs = Logbook::all();

        return View::make('logs.indexlogbook', compact('logs'))->withTitle('Log Book');
    }

    public function indexo()
    {
        $iduser = Input::get('nama');
        Session::put('lgnama', $iduser);
        $logs = Logbook::where('user_id', $iduser)->get();

        return View::make('logs.indexlogbook', compact('logs'))->withTitle('Log Book');
    }

    public function exportlogbook()
    {
        $admin = Admin::where('user_id', Session::get('lgnama'))->first();
        Session::put('slogname', $admin->name);
        Session::put('slognim', $admin->noi);
        Session::put('sjabatan', $admin->position->name);
        $logbooks = Logbook::where('user_id', Session::get('lgnama'))->get();

        return $this->exportExceldocbook($logbooks);
    }

    private function exportExceldocbook($logbooks)
    {
        $name = 'Daftar Kegiatan ' . Session::get('slognim') . ' ' . Session::get('slogname') . ' ' . date('Y');
        Excel::create($name, function ($excel) use ($logbooks) {
            // Set the properties
            $name = 'Daftar Kegiatan';
            $excel->setTitle($name)
                ->setCreator('Atletik Unesa ' . date('Y')); $excel->sheet($name, function ($sheet) use ($logbooks) {

                $sheet->mergeCells('A1:D1')
                    ->row(1, array('DAFTAR KEGIATAN PANITIA'));
                $sheet->mergeCells('A2:D2')
                    ->row(2, array('KEJUARAAN ATLETIK UNESA TAHUN ' . Session::get('dtahun')));
                $sheet->row(3, array(Session::get('slognim')));
                $sheet->row(4, array(Session::get('slogname')));
                $sheet->row(5, array(Session::get('sjabatan')));
                $row = 7;

                $sheet->row($row, array(
                    'Hari',
                    'Tanggal',
                    'Tempat',
                    'Kegiatan',
                    'Hasil',
                ));
                foreach ($logbooks as $value) {
                    $sheet->row(++$row, array(
                        $value->hari,
                        $value->tgl,
                        $value->tempat,
                        $value->kegiatan,
                        $value->hasil,
                    ));
                }
            });
        })->export('xls');
    }

    public function mahasiswacetaklogbook()
    {
        $admin = Admin::where('user_id', Sentry::getUser()->id)->first();
        Session::put('mslogname', $admin->name);
        Session::put('mslognim', $admin->noi);
        Session::put('msjabatan', $admin->position->name);

        $mlogbooks = Logbook::where('user_id', Sentry::getUser()->id)->get();

        return $this->exportmahasiswalogbook($mlogbooks);
    }

    private function exportmahasiswalogbook($mlogbooks)
    {
        $akun          = Admin::where('user_id', Sentry::getUser()->id)->first();
        $name          = 'Log_book_Atletik_' . Date('Y') . '_' . $akun->noi . '_' . $akun->name . '.pdf';
        $data['datas'] = $mlogbooks;
        $pdf           = PDF::loadView('logs.laporan', $data)->setPaper('a4')->setOrientation('landscape');
        return $pdf->download($name);
    }

    /**
     * Show the form for creating a new log
     *
     * @return Response
     */
    public function create()
    {
        return View::make('logs.create')->withTitle('Tambah Kegiatan');
    }

    /**
     * Store a newly created log in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Logbook::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $data['user_id'] = Sentry::getUser()->id;
        Logbook::create($data);

        return Redirect::route('admin.logs.index')->with("successMessage", "Berhasil menyimpan kegiatan baru");
    }

    /**
     * Display the specified log.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $log = Log::findOrFail($id);

        return View::make('logs.show', compact('log'));
    }

    /**
     * Show the form for editing the specified log.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $log = Logbook::find(Crypt::decrypt($id));

        return View::make('logs.edit', compact('log'))->withTitle("Ubah kegiatan");
    }

    /**
     * Update the specified log in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $log = Logbook::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Logbook::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $log->update($data);

        return Redirect::route('admin.logs.index')->with("successMessage", "Berhasil menyimpan kegiatan");
    }

    /**
     * Remove the specified log from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Logbook::destroy($id);

        return Redirect::route('admin.logs.index')->with('successMessage', 'Kegiatan berhasil dihapus.');
    }

}
