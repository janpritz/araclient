<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use GuzzleHttp\Client;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $apiurl = "http://127.0.0.1:8000/api/users";
    public function index()
    {
        //
        $client = new Client();
        $apiurl = $this->apiurl;
        try {
            $response = $client->get($apiurl);
            $users = json_decode($response->getBody());
            //dd($users);
            return view("pages.users.index", compact("users"));
        } catch (\Exception $e) {
            return view("api_error", ['error'=>$e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("pages.users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client();
        $apiUrl = $this->apiurl;
        try {
            $response = $client->post($apiUrl, [
                'form_params' => [
                    'fname'=>$request->input('fname'),
                    'mname'=>$request->input('mname'),
                    'lname'=>$request->input('lname'),
                    'username'=>$request->input('username'),
                    'email'=>$request->input('email'),
                    'contact'=>$request->input('contact'),
                    'password'=>$request->input('password'),
                    'role'=>$request->input('role')
                ]
            ]);
            $message = json_decode($response->getBody());
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client = new Client();
        try {
            $response = $client->get("{$this->apiurl}/$id");
            $user = json_decode($response->getBody());
            //dd($department);
            return view("pages.users.show", compact("user"));
        } catch (\Exception $e) {
            return view("api_error", ['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = new Client();
        try {
            $response = $client->get("{$this->apiurl}/$id");
            $user = json_decode($response->getBody());
            return view("pages.users.edit", compact("user"));
        } catch (\Exception $e) {
            return view("api_error", ['error' => $e->getMessage()]);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $client = new Client();
        try {
            $client->put("{$this->apiurl}/$id", [
                'form_params' => [
                    'departmentName' => $request->input('departmentName'),
                ]
            ]);
            //$message = json_decode($response->getBody());
            session()->flash('success', 'Department updated successfully: ');
            //Alert::success('Deleted Successfully','Welcome');
            return redirect()->route('departments.index');
        } catch (\Exception $e) {
            // Set an error message in the session
            session()->flash('error', 'Error updating department: ' . $e->getMessage());
            return redirect()->route('departments.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
