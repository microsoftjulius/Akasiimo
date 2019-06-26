<?php

namespace App\Http\Controllers;

use App\Roles;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\beneficiaries;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SentMail;

require '..\vendor/autoload.php';
use Mailgun\Mailgun;



class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id','!=',Auth::user()->id)->get();
        return view('After.users',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
# Validator function for creating new users
public function validator(array $data){
    return Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
}
# function for creating new user by the supper Admin
public function create_user(Request $request){
    validator([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
    // return $request->user_role;
    User::create(array(
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'Role'     => $request->user_role
    ));
# Instantiate the client.
$mgClient = new Mailgun('192482bd7e72d7d36b5c83f49986ae02-2b778fc3-19ccb808');
$domain = "sandboxde675ea3f35f4d9da743eda7e99e1f68.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
	array('from'    => 'Akasiimo Opm <postmaster@sandboxde675ea3f35f4d9da743eda7e99e1f68.mailgun.org>',
		'to'      => 'Julius Ssemakula <julius@pahappa.com>',
		'subject' => 'Account Details',
        'text'    => 'Your User Name is ' . " " .$request->email . ' and Password is '. $request->password . " and the
        role assigned to u " . $request->user_role));
 return redirect()->back()->withErrors("Account created Success fully");
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(Roles $roles)
    {
        $users = beneficiaries::where('id','!=',auth()->user()->id);
        return view();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(Roles $roles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roles $roles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roles $roles, Request $request)
    {
        User::where('id',$request->user_id)->delete();
        return redirect()->back()->withErrors("User Success fully deleted");
    }
}
