<?php

class AdminsController extends \BaseController
{

    /**
     * Display a listing of admins
     *
     * @return Response
     */
    public function index()
    {
        // $admins = DB::table('admins')->get();
        // $admins =
        // [
        //     'admins' => $admins
        // ];
        // return View::make('admins.index', $admins)->withTitle('Admin');
        $admins = Admin::all();

        return View::make('admins.index', compact('admins'))->withTitle('Admin');
    }

    /**
     * Show the form for creating a new admin
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admins.create')->withTitle('Tambah Admin');
    }

    /**
     * Store a newly created admin in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), User::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        // Register User tanpa diaktivasi
        $user = Sentry::register(array(
            'email'      => Input::get('email'),
            'password'   => Input::get('password'),
            'first_name' => Input::get('name'),
        ), false);
        // Cari grup user
        $regularGroup = Sentry::findGroupByName('panitia');

        // Masukkan user ke grup user
        $user->addGroup($regularGroup);

        // Persiapkan activation code untuk dikirim ke email
        $data = [
            'email'          => $user->email,
            // Generate kode aktivasi
            'activationCode' => $user->getActivationCode(),
        ];

        // Kirim email aktivasi
        Mail::send('emails.auth.register', $data, function ($message) use ($user) {
            $message->to($user->email, $user->first_name . ' ' . $user->last_name)->subject('Aktivasi Akun SIM Atletik UNESA');
        });

        $date       = \Carbon\Carbon::now();
        $validatora = Validator::make($dataa = Input::all(), Admin::$rules);

        if ($validatora->fails()) {
            return Redirect::back()->withErrors($validatora)->withInput();
        } else {
            if (Input::hasFile('foto')) {
                $uploaded_file = Input::file('foto');
                // mengambil extension file
                $extension = $uploaded_file->getClientOriginalExtension();
                // membuat nama file random dengan extension
                $filename        = Input::get('nohp') . '.' . $extension;
                $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'uploads/fotopanitia';
                // memindahkan file ke folder public/img
                $uploaded_file->move($destinationPath, $filename); // 25

                DB::table('admins')->insertGetId(
                    array(
                        'noi'         => Input::get('noi'),
                        'name'        => Input::get('name'),
                        'position_id' => Input::get('position_id'),
                        'tahun'       => Input::get('tahun'),
                        'user_id'     => $user->id,
                        'foto'        => $filename,
                        'nohp'        => Input::get('nohp'),
                        'sekolah'     => Input::get('sekolah'),
                        'created_at'  => $date,
                        'updated_at'  => $date,
                    )
                );
            } else {

                DB::table('admins')->insertGetId(
                    array(
                        'noi'         => Input::get('noi'),
                        'name'        => Input::get('name'),
                        'position_id' => Input::get('position_id'),
                        'tahun'       => Input::get('tahun'),
                        'user_id'     => $user->id,
                        'foto'        => '',
                        'nohp'        => Input::get('nohp'),
                        'sekolah'     => Input::get('sekolah'),
                        'created_at'  => $date,
                        'updated_at'  => $date,
                    )
                );
            }
        }

        // Redirect ke halaman login
        return Redirect::route('admin.admins.index')->with("successMessage", "Berhasil disimpan. Silahkan cek email ($user->email) untuk melakukan aktivasi akun.");
    }

    /**
     * Display the specified admin.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $admin = Admin::findOrFail(Crypt::decrypt($id));

        return View::make('admins.show', compact('admin'))->withTitle('Cetak');
    }

    /**
     * Show the form for editing the specified admin.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $admins = Admin::find(Crypt::decrypt($id));

        return View::make('admins.edit', compact('admins'))->withTitle("Ubah Admin");
        // return View::make('admins.edit', ['admins'=>$admins])->withTitle("Ubah $admins->first_name");
    }

    public function profile()
    {
        $idadmin = Admin::where('user_id', Sentry::getUser()->id)->first();
        $admins  = Admin::find($idadmin->id);
        // $admins = Admin::where('user_id', Sentry::getUser()->id);

        return View::make('admins.profile', compact('admins'))->withTitle("Profile");
    }

    /**
     * Update the specified admin in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $admin = Admin::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Admin::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (Input::hasFile('foto')) {
            $uploaded_file = Input::file('foto');
            // mengambil extension file
            $extension = $uploaded_file->getClientOriginalExtension();
            // membuat nama file random dengan extension
            $filename        = Input::get('nohp') . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'uploads/fotopanitia';
            // memindahkan file ke folder public/img
            $uploaded_file->move($destinationPath, $filename); // 25
            // ganti field cover dengan cover yang baru

            $admin->foto = $filename;
        }

        if (!$admin->update(Input::except('foto')) ? true : false) {
            return Redirect::back();
        }

        // $admin->update($data);

        // $user = User::findOrFail($id);

        // $validatoru = Validator::make($datau = Input::all(), User::$rules);

        // if ($validatoru->fails()) {
        //     return Redirect::back()->withErrors($validatoru)->withInput();
        // }

        // $user->update($datau);

        return Redirect::route('admin.admins.index')->with("successMessage", "Berhasil menyimpan $admin->name");
    }

    public function updateprofile($id)
    {
        $admin = Admin::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Admin::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (Input::hasFile('foto')) {
            $uploaded_file = Input::file('foto');
            // mengambil extension file
            $extension = $uploaded_file->getClientOriginalExtension();
            // membuat nama file random dengan extension
            $filename        = Input::get('nohp') . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'uploads/fotopanitia';
            // memindahkan file ke folder public/img
            $uploaded_file->move($destinationPath, $filename); // 25
            // ganti field cover dengan cover yang baru

            $admin->foto = $filename;
        }

        if (!$admin->update(Input::except('foto')) ? true : false) {
            return Redirect::back();
        }

        return Redirect::to('dashboard')->with("successMessage", "Berhasil menyimpan $admin->name");
    }

    /**
     * Remove the specified admin from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Admin::destroy($id);

        return Redirect::route('admin.admins.index')->with("successMessage", "Berhasil dihapus");
    }

    /**
     * Aktivasi seorang user
     * @param string $activationCode
     * @return response
     */
    public function activate()
    {
        $email          = Input::get('email');
        $activationCode = Input::get('activationCode');

        try {
            $user = Sentry::findUserByLogin($email);
            $user->attemptActivation($activationCode);
        } catch (UserAlreadyActivatedException $e) {
            return Redirect::route('login')->with('errorMessage', $e->getMessage());
        } catch (UserNotFoundException $e) {
            return Redirect::route('login')->with('errorMessage', $e->getMessage());
        }
        return Redirect::to('login')->with('successMessage', 'Akun Anda berhasil diaktivasi, silahkan login.');
    }

    public function exportadmin()
    {
        $admin = Admin::where('tahun', date('Y'))->orderBy('name', 'asc')->get();

        return $this->exportExceladmin($admin);
    }

    private function exportExceladmin($admin)
    {
        $name = 'Daftar Admin_' . date('Y');
        Excel::create($name, function ($excel) use ($admin) {
            // Set the properties
            $name = 'Daftar Admin_' . date('Y');
            $excel->setTitle($name)
                ->setCreator('Atletik Unesa ' . date('Y')); $excel->sheet($name, function ($sheet) use ($admin) {

                $sheet->mergeCells('A1:G1')
                    ->row(1, array('Daftar Admin ' . date('Y')));
                $row = 3;

                $sheet->row($row, array(
                    'NIM',
                    'Nama',
                    'Jabatan',
                    'Nomor HP',
                    'Email',
                    'Sekolah yang didaftarkan',
                ));
                foreach ($admin as $value) {
                    $sheet->row(++$row, array(
                        $value->noi,
                        $value->name,
                        $value->position->name,
                        $value->nohp,
                        $value->user->email,
                        $value->sekolah,
                    ));
                }
            });
        })->export('xls');

    }

}
