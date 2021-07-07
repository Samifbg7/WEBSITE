<?php

namespace App\Http\Controllers\Dashboard\Users;

use App\Http\Controllers\Controller;

use App\Mail\Delete;
use App\Mail\Register;
use App\Models\User;
use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    /**
     * Generate password
     *
     * @return string
     */
    function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 12; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::get();
        return view('dashboard.Users.index', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.form.user.new', [
            'title' => "Cree un utilistateur",
            'up'=>false
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users',

        ], [
            'fname.required' => 'Le nom est requis',
            'lname.required' => 'Le prénom est requis',
            'email.required' => "L'adresse mail est requis",
            'email.email' => "L'adresse mail doit etre une adresse mail valide",
            'email.unique' => "Un utilisateur avec cette adresse mail est deja enregistrer",
        ]);
        $request['password'] = $this->randomPassword();
        Mail::to($request['email'])
            ->send(new Register($request->except('_token')));
        $request['password'] = Hash::make($request['password']);
        User::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'email' => $request['email'],
            'password' => $request['password']
        ]);

        return redirect(route('dashboard.user.index'))->with('success', "l'utilisateur a bien ete cree");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id == Auth::user()->id) {
            return redirect(route('dashboard.user.index'))->with('error', 'vous devais passer par le profil ');
        }
        $user = User::where('id', $id)->get()->first();
        return view('dashboard.Users.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {

        //if ($id == Auth::user()->id)
        //{
        //  return  redirect(route('dashboard.user.index'))->with('error','vous devais passer par le profil pour modifier vos donné');
        //}
        $user = User::where('id', $id)->get()->first();
        return view('dashboard.form.user.edit', [
            'title' => "Mettre un jour un utilisateur",
            'up' => true,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'email',
        ], [
            'email.email' => "L'adresse mail doit etre une adresse mail valide",
        ]);
        $update = [
            'lname' => $request->lname,
            'fname' => $request->fname,
            'email' => $request->email
        ];
        User::where('id', $request['id'])->update($update);
        return redirect(route('dashboard.user.index'))->with('error', 'Le profil de ' . $request->fname . ' ' . $request->lname . 'a été mise a jour .');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     *
     */
    public function destroy(Request $request)
    {
        dump($request);

        if ($request->id == $request->idd){
            return redirect(route('dashboard.user.index'))->with('error','vous pouvez pas supprimer votre propre compte');
        }
        if ($request->idd == 1){
            $userd =   User::where('id', $request['id'])->get()->first();
            $userr =   User::where('id', $request['idd'])->get()->first();

            $lname =$userd->lname;
            $fname=$userd->fname;


            Mail::to($userd->email)
                ->send(new Delete($userd , $userr ));
            User::where('id', $request['id'])->get()->first()->delete();

           return redirect(route('dashboard.user.index'))->with('success','vous venez de supprimer le compte de '.$fname.' '.$lname .'.');
       }else{
            return redirect(route('dashboard.user.index'))->with('error',"vous etes pas super admin");
        }

    }

}
