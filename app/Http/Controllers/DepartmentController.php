<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
{
    protected $apiUrl = "http://127.0.0.1:8000/api/departments";

    public function index()
    {
        $client = new Client();
        try {
            $response = $client->get($this->apiUrl);
            $departments = json_decode($response->getBody());
            //dd($departments);
            return view("pages.departments.index", compact("departments"));
        } catch (\Exception $e) {
            return view("api_error", ['error' => $e->getMessage()]);
        }
    }

    public function create()
    {
        return view("pages.departments.create");
    }

    public function show($id)
    {
        $client = new Client();
        try {
            $response = $client->get("{$this->apiUrl}/$id");
            $department = json_decode($response->getBody());
            //dd($department);
            return view("pages.departments.show", compact("department"));
        } catch (\Exception $e) {
            return view("api_error", ['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $client = new Client();
        try {
            $response = $client->get("{$this->apiUrl}/$id");
            $department = json_decode($response->getBody());
            return view("pages.departments.edit", compact("department"));
        } catch (\Exception $e) {
            return view("api_error", ['error' => $e->getMessage()]);
        }
    }

    public function store(DepartmentRequest $request)
    {
        $client = new Client();
        try {
            // Validate unique department name
            $departments = $this->getDepartmentNames();
            if (in_array($request->input('departmentName'), $departments)) {
                // Display popup alert
                echo '<script>alert("Department name already exists.");</script>';
                // You might want to redirect to the previous page or do something else after showing the popup
                return redirect()->back();
            }
            // If the department name is unique, proceed with storing it
            $response = $client->post($this->apiUrl, [
                'form_params' => [
                    'departmentName' => $request->input('departmentName'),
                ]
            ]);
            session()->flash('success', 'Department added successfully: ');
            //Alert::success('Deleted Successfully','Welcome');
            return redirect()->route('departments.index');
        } catch (\Exception $e) {
            // Set an error message in the session
            session()->flash('error', 'Error adding department: ' . $e->getMessage());
            return redirect()->route('departments.index');
        }
    }

    public function update(Request $request, $id)
    {
        $client = new Client();
        try {
            $response = $client->put("{$this->apiUrl}/$id", [
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

    public function destroy($id)
    {
        $client = new Client();
        try {
            $response = $client->delete("{$this->apiUrl}/$id");
            // Set a success message in the session
            session()->flash('success', 'Department deleted successfully: ');
            //Alert::success('Deleted Successfully','Welcome');
            return redirect()->route('departments.index');
        } catch (\Exception $e) {
            // Set an error message in the session
            session()->flash('error', 'Error deleting department: ' . $e->getMessage());
            return redirect()->route('departments.index');
        }
    }

    protected function getDepartmentNames()
    {
        $client = new Client();
        try {
            $response = $client->get($this->apiUrl);
            $responseData = json_decode($response->getBody(), true);
            return $responseData['departmentNames'] ?? [];
        } catch (\Exception $e) {
            return view("api_error", ['error' => $e->getMessage()]);
        }
    }
}
