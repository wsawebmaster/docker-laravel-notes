<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        // form validation
        $request->validate(
            // rules
            [
            'text_username' => 'required|email',
            'text_password' => 'required|min:6|max:16'
            ],
            // error messages
            [
                'text_username.required' => 'O username é obrigatório',
                'text_username.email' => 'O username deve ser um email válido',
                'text_password.required' => 'A password é obrigatória',
                'text_password.min' => 'A password deve ter ao menos :min caracteres',
                'text_password.max' => 'A password deve ter no máximo :max caracteres'
            ]
        );

        // get user input
        $username = $request->input('text_username');
        $password = $request->input('text_password');

        // check if the user exists in the database
        $user = User::where('username', '=', $username) 
                        ->where('deleted_at', NULL)
                        ->first();
        if(!$user) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('loginError', 'Username ou password incorretos.');
        }
        // check if password is correct
        if(!password_verify($password, $user->password)) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('loginError', 'Username ou password incorretos.');
        }
        // update last login
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        // login user
        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username
            ]
        ]);

        // redirect to the home page
        return redirect()->to('/');
        echo 'Login efetuado com sucesso';
        // get all the users from the database
        // $users = User::all()->toArray();
        // $userModel = new User();
        // $users = $userModel->all()->toArray();
        // echo '<pre>';
        // print_r($users);

        // test database connection
        // try { 
        //     DB::connection()->getPdo();
        //     echo 'Connected successfully';
        // } catch (\PDOException $e) {
        //     echo "Connection failed: " . $e->getMessage();
        // }
        // echo '<br>';
        // echo 'FIM';
    }

    public function logout()
    {
        // logout from the application
        session()->forget('user');
        return redirect()->to('/login');
    }
}
