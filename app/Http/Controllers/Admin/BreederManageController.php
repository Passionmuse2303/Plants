<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Breeder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BreederManageController extends Controller
{
    public function viewPage($breeder_id)
    {
        $breeder_info = Breeder::where('id', $breeder_id)->first();
        return view('admin.Breeder.view', compact('breeder_info'));
    }
    public function overviewPage()
    {
        $breeders_data = Breeder::paginate(2);
        return view('admin.Breeder.overview', compact('breeders_data'));
    }
    public function addPage()
    {
        return view('admin.Breeder.add');
    }
    public function editPage($breeder_id)
    {
        $breeder_info = Breeder::where('id', $breeder_id)->first();
        return view('admin.Breeder.edit', compact('breeder_info'));
    }
    public function delete($breeder_id)
    {
        $breeder = Breeder::where('id', $breeder_id)->first();
        if ($breeder) {
            // Optionally delete the related User
            if ($breeder->user) {
                $breeder->user->delete();
            }

            // Delete the Breeder
            $breeder->delete();
        }
        return redirect()->route('admin.breeder.overviewPage');
    }
    public function addNewBreeder(Request $request)
    {
        $data = $request->only(
            'username',
            'email',
            'phonenumber',
            'password',
            'password_confirmation',

            'breeder_id',
            'company_name',
            'street',
            'city',
            'postal_code',
            'country',
            'website',
        );

        $rules = [
            'phonenumber' => 'required',

            'breeder_id' => 'required',
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
            $breeder_obj = Breeder::where('id', $request['id'])->first();
            $user_obj = $breeder_obj->user;

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
            $breeder_obj = new Breeder;
            $user_obj = new User;

            $user_obj->role = 'breeder';
        }

        $user_obj->username = $data['username'];
        $user_obj->email = $data['email'];
        $user_obj->phonenumber = $data['phonenumber'];

        if (!$request->has('id')) {
            $user_obj->password = bcrypt($data['password']);
        }
        $user_obj->save();

        $breeder_obj->person_id = $user_obj->id;
        $breeder_obj->breeder_id = $data['breeder_id'];
        $breeder_obj->company_name = $data['company_name'];
        $breeder_obj->street = $data['street'];
        $breeder_obj->city = $data['city'];
        $breeder_obj->postal_code = $data['postal_code'];
        $breeder_obj->country = $data['country'];
        $breeder_obj->website = $data['website'];
        $breeder_obj->save();

        if ($request->has('id')) {
            Session::flash('flash_message', "Edited Breeder Sucessfully!");
            return redirect()->back();
        } else {
            Session::flash('flash_message', 'Added New Breeder Sucessfully!');
            return redirect()->back();
        }
    }
    public function exportCSV()
    {
        $filename = 'breeder-data.csv';

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
                'breeder_id',
                'company_name',
                'street',
                'city',
                'postal_code',
                'country',
                'website',
            ]);

            // Fetch and process data in chunks
            breeder::chunk(25, function ($breeders) use ($handle) {
                foreach ($breeders as $breeder) {
                    // Extract data from each breeder.
                    $data = [
                        isset($breeder->user->username) ? $breeder->user->username : '',
                        isset($breeder->user->email) ? $breeder->user->email : '',
                        isset($breeder->user->phonenumber) ? $breeder->user->phonenumber : '',
                        isset($breeder->breeder_id) ? $breeder->breeder_id : '',
                        isset($breeder->company_name) ? $breeder->company_name : '',
                        isset($breeder->street) ? $breeder->street : '',
                        isset($breeder->city) ? $breeder->city : '',
                        isset($breeder->postal_code) ? $breeder->postal_code : '',
                        isset($breeder->country) ? $breeder->country : '',
                        isset($breeder->website) ? $breeder->website : '',
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