<?php

namespace App\Http\Controllers;

use App\Models\PpcrvPrecinct;
use App\Models\Precinct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function newAccount()
    {

        $precincts = Precinct::where(
            'municipality',
            auth()->user()->municipality
        )->get();

        return view('register-account', [
            'municipalities' => $this->validMuninicipalities(),
            'accountTypes' => $this->validAccountTypes(),
            'precincts' => $precincts
        ]);
    }

    private function validMuninicipalities()
    {                      
        return [
            'Anahawan',
            'Bontoc',
            'Hinunangan',
            'Hinundayan',
            'Libagon',
            'Liloan',
            'Limasawa',
            'Maasin',
            'Macrohon',
            'Malitbog',
            'Padre Burgos',
            'Pintuyan',
            'Saint Bernard',
            'San Francisco',
            'San Juan',
            'San Ricardo',
            'Silago',
            'Sogod',
            'Tomas Oppus'
        ];
    }

    private function validAccountTypes()
    {
        return [
            'Admin',
            'PPCRV'
        ];
    }

    public function saveNewAccount(Request $request)
    {
        $request->mergeIfMissing([
            'municipality' => Auth::user()->municipality,
            'account_type' => 
                Auth::user()->type === "superadmin" ? 'Admin' : 'PPCRV'
        ]);

        $request->validate([
            'account_name' => ['required'],
            'username' => ['required', 'unique:users,username', 'min:4'],
            'password' => ['required', 'confirmed', 'min:6'],
            'password_confirmation' => ['required'],
            'municipality' => [
                'required',
                Rule::in($this->validMuninicipalities())
            ],
            'precinct_assignment' => [Rule::requiredIf(Auth::user()->isAdmin())],
            'account_type' => ['required', Rule::in($this->validAccountTypes())]
        ]);

        User::create([
            'name' => $request->account_name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'municipality' => $request->municipality,
            'type' => $request->account_type
        ]);

        PpcrvPrecinct::create([
            'user_id' => Auth::user()->id,
            'precinct_id' => $request->precinct_assignment
        ]);

        return redirect('/account/new')->with([
            'message'=>'Account created successfully!'
        ]);

        
    }
}
