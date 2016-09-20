<?php

class LogsController extends \BaseController
{

    /**
     * Display a listing of logs
     *
     * @return Response
     */
    public function index()
    {
        $logs = Logbook::where('user_id', Sentry::getUser()->id)->get();

        return View::make('logs.index', compact('logs'))->withTitle('Log Book');
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
