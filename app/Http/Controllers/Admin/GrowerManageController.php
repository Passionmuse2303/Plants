<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grower;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GrowerManageController extends Controller
{
    public function viewPage($grower_id)
    {
        $grower_info = Grower::where('id', $grower_id)->first();
        return view('admin.Grower.view', compact('grower_info'));
    }
    public function overviewPage()
    {
        $growers_data = Grower::all();
        return view('admin.Grower.overview', compact('growers_data'));
    }
    public function addPage()
    {
        return view('admin.Grower.add');
    }
    public function editPage($grower_id)
    {
        $grower_info = Grower::where('id', $grower_id)->first();
        return view('admin.Grower.edit', compact('grower_info'));
    }
    public function delete($grower_id)
    {
        $grower = Grower::where('id', $grower_id)->first();
        if ($grower) {
            // Optionally delete the related User
            if ($grower->user) {
                $grower->user->delete();
            }

            // Delete the grower
            $grower->delete();
        }
        return redirect()->route('admin.breeder.overviewPage');
    }
    public function addNewGrower(Request $request)
    {
        $data = $request->only(
            'username',
            'email',
            'phonenumber',
            'password',
            'password_confirmation',

            'grower_id',
            'company_name',
            'street',
            'city',
            'postal_code',
            'country',
            'website',
        );

        $rules = [
            'email' => 'required|email',
            'username' => 'required',
            'phonenumber' => 'required',

            'grower_id' => 'required',
            'company_name' => 'required',
            'street' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
            'website' => 'required',
        ];

        if (!$request->has('id')) {
            $rules['email'] = 'required|email|unique:users,email';
            $rules['username'] = 'required|unique:users,username';
            $rules['password'] = 'required|min:8|confirmed';
        } else {
            $grower_obj = Grower::where('id', $request['id'])->first();
            $user_obj = $grower_obj->user;

            if ($user_obj->email !== $data['email']) {
                $rules['email'] = 'required|email|unique:users,email';
            }
            if ($user_obj->username !== $data['username']) {
                $rules['email'] = 'required|email|unique:users,email';
            }
        }

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            Session::flash('validation_flash_error', 'required');
            return redirect()->back()->withInput()->withErrors($validator->messages());
        }

        if (!$request->has('id')) {
            $grower_obj = new Grower;
            $user_obj = new User;

            $user_obj->role = 'grower';
            $grower_obj->person_id = $user_obj->id;
        }

        $user_obj->username = $data['username'];
        $user_obj->email = $data['email'];
        $user_obj->phonenumber = $data['phonenumber'];

        if (!$request->has('id')) {
            $user_obj->password = bcrypt($data['password']);
        }
        $user_obj->save();

        $grower_obj->person_id = $user_obj->id;
        $grower_obj->grower_id = $data['grower_id'];
        $grower_obj->company_name = $data['company_name'];
        $grower_obj->street = $data['street'];
        $grower_obj->city = $data['city'];
        $grower_obj->postal_code = $data['postal_code'];
        $grower_obj->country = $data['country'];
        $grower_obj->website = $data['website'];
        $grower_obj->save();

        if ($request->has('id')) {
            Session::flash('flash_message', "Edited Grower Sucessfully!");
            return redirect()->back();
        } else {
            Session::flash('flash_message', 'Added New Grower Sucessfully!');
            return redirect()->back();
        }
    }
    public function exportCSV()
    {
        $filename = 'grower-data.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        return response()->stream(function () {
            $handle = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($handle, [
                'username',
                'email',
                'phonenumber',
                'grower_id',
                'company_name',
                'street',
                'city',
                'postal_code',
                'country',
                'website',
            ]);

            // Fetch and process data in chunks
            Grower::chunk(25, function ($growers) use ($handle) {
                foreach ($growers as $grower) {
                    // Extract data from each grower.
                    $data = [
                        isset($grower->user->username) ? $grower->user->username : '',
                        isset($grower->user->email) ? $grower->user->email : '',
                        isset($grower->user->phonenumber) ? $grower->user->phonenumber : '',
                        isset($grower->grower_id) ? $grower->grower_id : '',
                        isset($grower->company_name) ? $grower->company_name : '',
                        isset($grower->street) ? $grower->street : '',
                        isset($grower->city) ? $grower->city : '',
                        isset($grower->postal_code) ? $grower->postal_code : '',
                        isset($grower->country) ? $grower->country : '',
                        isset($grower->website) ? $grower->website : '',
                    ];
                    // Write data to a CSV file.
                    fputcsv($handle, $data);
                }
            });
            // Close CSV file handle
            fclose($handle);
        }, 200, $headers);
    }
}
