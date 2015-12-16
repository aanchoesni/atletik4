<?php

class RegistrasiController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('registrasi.index')->with('successMessage', 'Silahkan isi dengan benar.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $date       = \Carbon\Carbon::now();
        $validator  = Validator::make($data = Input::all(), User::$rules);
        $validatora = Validator::make($dataa = Input::all(), Registrasi::$rules);

        if ($validatora->fails()) {
            return Redirect::back()->withErrors($validatora)->withInput();
        } else if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            // Register User tanpa diaktivasi
            $user = Sentry::register(array(
                'email'      => Input::get('email'),
                'password'   => Input::get('password'),
                'first_name' => Input::get('name'),
                'last_name'  => Input::get('jenjang'),
            ), false);
            // Cari grup user
            $regularGroup = Sentry::findGroupByName('user');

            // Masukkan user ke grup user
            $user->addGroup($regularGroup);

            DB::table('schools')->insertGetId(
                array(
                    'jenjang'      => input::get('jenjang'),
                    'name'         => Input::get('name'),
                    'adstreet'     => Input::get('adstreet'),
                    'advillage'    => Input::get('advillage'),
                    'addistricts'  => Input::get('addistricts'),
                    'adcity'       => Input::get('adcity'),
                    'adpostalcode' => Input::get('adpostalcode'),
                    'adphone'      => Input::get('adphone'),
                    'hmname'       => Input::get('hmname'),
                    'hmphone'      => Input::get('hmphone'),
                    'hmmobile'     => Input::get('hmphone'),
                    'user_id'      => $user->id,
                    'created_at'   => $date,
                    'updated_at'   => $date,
                )
            );

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

            // Redirect ke halaman login
            return Redirect::route('login')->with("successMessage", "Berhasil disimpan. Silahkan cek email ($user->email) untuk melakukan aktivasi akun.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
