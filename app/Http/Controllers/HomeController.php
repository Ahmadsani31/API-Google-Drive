<?php

namespace App\Http\Controllers;

use Google\Service\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use Yaza\LaravelGoogleDriveStorage\Gdrive;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $data =  Storage::disk('google')->put('va.png', public_path('images/va.png'));
        // $data = Gdrive::get('valoran1.png');
        // print_r($data);
        return view('home');
        // $param =   Gdrive::put('valoran23.png', public_path('images/va.png'));
        // echo 'berhasil';
    }

    public function simpan(Request $request)
    {

        Validator::validate($request->all(), [
            'nama' => 'required',
            'filePdf' => [
                'required',
                File::types(['pdf'])
            ]
        ]);

        $File = $request->file('filePdf');
        $name = Str::random(16) . time() . '.' .  $File->getClientOriginalExtension();

        $patch = 'PDF/' . $name;

        Gdrive::put($patch, $File);
    }
}
