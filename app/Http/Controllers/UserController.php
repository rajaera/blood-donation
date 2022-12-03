<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        return view('user.index', ['users' => User::orderBy('name')->get()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $userText = "$user->name | $user->email";

        if(in_array($user->id, array(1))) {
            //Restricted users that cannot be deleted
            $request->session()->flash('status', "User [{$userText}] cannot be deleted!");
            return redirect()->route('user');
        }

        
        //soft delete
        $user->delete();
        $request->session()->flash('status', "User [{$userText}] has been deleted successfully!");


        return redirect()->route('user');
    }
}
