<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'role' => 'required',
            'repassword' => 'required|same:password'

        ]);
        $user = new User();
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.edit', [
            'user' => User::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::find($id)->update($request->all());
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/admin/users');
    }

    /**
     * The get route for changing password
     */
    public function changePassword(){
        return view('admin.users.password');
    }

    /**
     * The get route for changing password
     */
    public function updatePassword(Request $request){
        $old = $request->input('old-password');
        $new = $request->input('new-password');

        if (Auth::check($old, Auth::user()->getAuthPassword())){
            $user = Auth::user();
            $user->password = bcrypt($new);
            $user->save();
            // TODO: Add flash message here
        }
        return view('admin.users.password');
    }

    public function resetPassword($user_id){
        $user = User::findorFail($user_id)->first();
        $temporaryPassword = $this->generateRandomString(5);

        $user->password = bcrypt($temporaryPassword);
        $user->save();

        Session::flash(
            'flash_message',
            "Password has been reset for" . $user->name . ". The temporary password is <b>". $temporaryPassword ."<b>.");

        return redirect('/admin/users');
    }

    private function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    // TO DO
//    public function changeStatus($id) {
//        $user = User::findOrFail($id)->first();
//
//        $user->status = $user->status == "active" ? 'disabled' : 'active';
//        $user->save();
//    }
}
