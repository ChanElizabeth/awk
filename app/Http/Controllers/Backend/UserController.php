<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FeeByPartner;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function show()
    {
        $id = Auth::user()->id;
        $response = Auth::user();
        return view('backend.user.show', compact('response'));
    }

    public function userlist()
    {
        $response = User::where([['status', '=', 1], ['id', '!=', Auth::user()->id]])->get();
        return view('backend.user.index', compact('response'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('backend.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            if($request->input('password') == $request->input('confirm_password'))
            {
                $password = password_hash($request->input('password'), PASSWORD_DEFAULT);
                $user = new User();
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = $password;
                $user->phone = $request->input('phone');
                $user->role_id = $request->input('role_id');
                $user->status = 1;

                $user->save();

                if($request->input('role_id') == 4){
                    $banks = json_decode(file_get_contents(public_path('json/banks.json')));
                    foreach ($banks as $key => $bank) {
                        FeeByPartner::create([
                            'user_id' => $user->id,
                            'fee'   => 0,
                            'bank_code' => $bank->bank_code,
                            'bank' => $bank->name,
                            'created_at' => date('Y-m-d h:i:s', time()),
                            'updated_at' => date('Y-m-d h:i:s', time())
                        ]);
                    }
                }

                DB::commit();
                return redirect()->route('dashboard.user.admin.userlist')->with('success', 'User berhasil dibuat');
            }
            else
            {
                DB::rollBack();
                return redirect()->route('dashboard.user.admin.create')->with('error', 'Password tidak sama');
            }
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->route('dashboard.user.admin.create')->with('error', 'Terdapat gangguan, mohon dicoba kembali. \n Error: ['.$th->getMessage().']');
        }
    }

    public function update(Request $request)
    {
        User::where('id', $request->input('id'))->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email')
        ]);
        return redirect()->route('dashboard.user.show')->with('success', 'Profile berhasil diubah');
    }

    public function delete(Request $request)
    {
        $user = User::where('id', $request->input('id'))->first();
        $user->status = 0;
        $user->save();

        return redirect()->route('dashboard.user.admin.userlist')->with('success', 'User berhasil dihapus');
    }

    public function edit($id)
    {
        if(Auth::user()->id == $id){
            abort(403, 'Unauthorized Access');
        }
        $response = User::where('id', $id)->first();
        $roles = Role::all();
        return view('backend.user.edit', compact('response', 'roles'));
    }

    public function editSubmit(Request $request)
    {
        $user = User::where('id', $request->input('id'))->first();
        $user->role_id = $request->input('role_id');
        $user->limit = $request->input('limit');

        $user->save();

        return redirect()->route('dashboard.user.admin.userlist')->with('success', 'User berhasil diedit');
    }
}
