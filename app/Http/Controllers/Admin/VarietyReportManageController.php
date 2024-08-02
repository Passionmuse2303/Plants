<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NotificationController;
use App\Models\Breeder;
use App\Models\Grower;
use App\Models\User;
use App\Models\VarietyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class VarietyReportManageController extends Controller
{
    public function viewPage($varietyReport_id)
    {
        $varietyReports_data = VarietyReport::all();
        $varietyReport_info = VarietyReport::where('id', $varietyReport_id)->first();
        return view('admin.VarietyReport.view', compact('varietyReport_info', 'varietyReports_data'));
    }
    public function overviewPage()
    {
        $varietyReports_data = VarietyReport::all();
        return view('admin.VarietyReport.overview', compact('varietyReports_data'));
    }
    public function addPage()
    {
        $growers_data = Grower::all();
        $breeders_data = Breeder::all();

        NotificationController::newReportNotification();
        return view('admin.VarietyReport.add', compact('growers_data', 'breeders_data'));
    }
    public function editPage($varietyReport_id)
    {
        $growers_data = Grower::all();
        $breeders_data = Breeder::all();
        $varietyReport_info = VarietyReport::where('id', $varietyReport_id)->first();

        $samples_data = $varietyReport_info->samples;

        return view('admin.VarietyReport.edit', compact('varietyReport_info', 'growers_data', 'breeders_data', 'samples_data'));
    }
    public function delete($VarietyReport_id)
    {
        $VarietyReport = VarietyReport::where('id', $VarietyReport_id)->first();
        $VarietyReport->delete();
        return redirect()->route('admin.varietyReport.overviewPage');
    }
    public function addNewVarietyReport(Request $request)
    {
        $data = $request->only(
            'variety_name',
            'grower_id',
            'breeder_id',
            'amount_plants',
            'pot_size',
            'pot_trial',
            'open_field_trial',
            'date_propagation',
            'date_potting',
            'trial_location',
            'date_planned_sample'
        );

        $rules = [
            'variety_name' => 'required',
            'grower_id' => 'required',
            'breeder_id' => 'required',
            'amount_plants' => 'required',
            'pot_size' => 'required',
            'pot_trial' => 'required',
            'trial_location' => 'required',
            'open_field_trial' => 'required',
            'date_propagation' => 'required',
            'date_potting' => 'required',
            'date_planned_sample' => 'required',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            Session::flash('validation_flash_error', 'required');
            return redirect()->back()->withInput()->withErrors($validator->messages());
        }

        if ($request->has('id')) {
            $varietyReport_obj = VarietyReport::where('id', $request['id'])->first();
        } else {
            $varietyReport_obj = new VarietyReport;
            $varietyReport_obj->image_url = "/upload/image/varietyReport/tAKRJHhbcm.avatar.jpg";
        }

        $varietyReport_obj->variety_name = $data['variety_name'];
        $varietyReport_obj->grower_id = $data['grower_id'];
        $varietyReport_obj->breeder_id = $data['breeder_id'];
        $varietyReport_obj->amount_plants = $data['amount_plants'];
        $varietyReport_obj->pot_size = $data['pot_size'];
        $varietyReport_obj->pot_trial = $data['pot_trial'];
        $varietyReport_obj->open_field_trial = $data['open_field_trial'];
        $varietyReport_obj->date_propagation = $data['date_propagation'];
        $varietyReport_obj->date_potting = $data['date_potting'];
        $varietyReport_obj->date_planned_sample = $data['date_planned_sample'];
        $varietyReport_obj->trial_location = $data['trial_location'];

        //Image Upload, Change Image name with random string + origin name
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $newFileName = Str::random(10) . '.' . $file->getClientOriginalName();
            $varietyReport_obj->image_url = "/upload/" . $file->storeAs('image/varietyReport', $newFileName, 'file_upload');
        }

        $varietyReport_obj->save();

        NotificationController::newReportNotification();

        if ($request->has('id')) {
            Session::flash('flash_message', "Edited VarietyReport Sucessfully!");
            return redirect()->back();
        } else {
            Session::flash('flash_message', 'Added New VarietyReport Sucessfully!');
            return redirect()->back();
        }
    }
    public function exportCSV()
    {
        $filename = 'varietyReport-data.csv';

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
                'Variety Name',
                'Grower Name',
                'Breeder Name',
                'Amount Plants',
                'Pot size',
                'Pot trial',
                'Open filed trial',
                'Propagation Date',
                'Date_potting',
                'Trial Location',
                'Planned Sampled Date',
            ]);

            // Fetch and process data in chunks
            VarietyReport::chunk(25, function ($varietyReports) use ($handle) {
                foreach ($varietyReports as $varietyReport) {
                    // Extract data from each varietyReport.
                    $data = [
                        isset($varietyReport->variety_name) ? $varietyReport->variety_name : '',
                        isset($varietyReport->grower->user->username) ? $varietyReport->grower->user->username : '',
                        isset($varietyReport->breeder->user->username) ? $varietyReport->breeder->user->username : '',
                        isset($varietyReport->amount_plants) ? $varietyReport->amount_plants : '',
                        isset($varietyReport->pot_size) ? $varietyReport->pot_size : '',
                        isset($varietyReport->pot_trial) ? $varietyReport->pot_trial : '',
                        isset($varietyReport->open_field_trial) ? $varietyReport->open_field_trial : '',
                        isset($varietyReport->date_propagation) ? $varietyReport->date_propagation : '',
                        isset($varietyReport->date_potting) ? $varietyReport->date_potting : '',
                        isset($varietyReport->trial_location) ? $varietyReport->trial_location : '',
                        isset($varietyReport->date_planned_sample) ? $varietyReport->date_planned_sample : '',
                    ];
                    // Write data to a CSV file.
                    fputcsv($handle, $data);
                }
            });
            // Close CSV file handle
            fclose($handle);
        }, 200, $headers);
    }
    public function importCSV(Request $request)
    {
        $request->validate([
            'import_csv' => 'required|mimes:csv',
        ]);
        //read csv file and skip data
        $file = $request->file('import_csv');
        $handle = fopen($file->path(), 'r');

        //skip the header row
        fgetcsv($handle);

        $chunksize = 25;
        while (!feof($handle)) {
            $chunkdata = [];

            for ($i = 0; $i < $chunksize; $i++) {
                $data = fgetcsv($handle);
                if ($data === false) {
                    break;
                }
                $chunkdata[] = $data;
            }

            $this->getchunkdata($chunkdata);
        }
        fclose($handle);

        Session::flash('flash_message', 'Successfuly imported');

        return redirect()->back();
    }
    public function getchunkdata($chuckdata)
    {

        foreach ($chuckdata as $column) {
            $variety_name = $column[0];
            $grower_name = $column[1];
            $breeder_name = $column[2];
            $amount_plants = $column[3];
            $pot_size = $column[4];
            $pot_trial = $column[5];
            $open_field_trial = $column[6];
            $date_propagation = $column[7];
            $date_potting = $column[8];
            $trial_location = $column[9];
            $date_planned_sample = $column[10];

            //create new employee
            $varietyReport = new VarietyReport();

            $varietyReport->variety_name = $variety_name;
            $varietyReport->grower_id = User::where('username', $grower_name)->first()->id;
            $varietyReport->breeder_id = User::where('username', $breeder_name)->first()->id;
            $varietyReport->amount_plants = $amount_plants;
            $varietyReport->pot_size = $pot_size;
            $varietyReport->pot_trial = $pot_trial;
            $varietyReport->open_field_trial = $open_field_trial;
            $varietyReport->date_propagation = $date_propagation;
            $varietyReport->date_potting = $date_potting;
            $varietyReport->trial_location = $trial_location;
            $varietyReport->date_planned_sample = $date_planned_sample;
            $varietyReport->save();
        }
    }
}
