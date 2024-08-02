<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Sample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SampleController extends Controller
{
    //View Page
    public function viewPage($sample_id)
    {
        $sample_info = Sample::where('id', $sample_id)->first();
        return view('User.Sample.view', compact('sample_info'));
    }
    //Add Page
    public function addPage($varietyReport_id)
    {
        return view('User.Sample.add', compact('varietyReport_id'));
    }
    public function addNewSample(Request $request)
    {
        $data = $request->only(
            'sample_date',
            'leaf_color',
            'amount_branches',
            'flower_buds',
            'branch_color',
            'roots',
            'flower_color',
            'flower_petals',
            'flowering_time',
            'length_flowering',
            'seeds',
            'seeds_color',
            'amount_seeds',
            'variety_report_id',
        );

        $rules = [
            'sample_date' => 'required',
            'leaf_color' => 'required',
            'amount_branches' => 'required',
            'flower_buds' => 'required',
            'branch_color' => 'required',
            'roots' => 'required',
            'flower_color' => 'required',
            'flower_petals' => 'required',
            'flowering_time' => 'required',
            'length_flowering' => 'required',
            'seeds' => 'required',
            'seeds_color' => 'required',
            'amount_seeds' => 'required',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            Session::flash('validation_flash_error', 'required');
            return redirect()->back()->withInput()->withErrors($validator->messages());
        }

        $sample_obj = new Sample;
        $sample_obj->variety_report_id = $request['variety_report_id'];
        $sample_obj->image_urls = '/upload/image/varietyReport/tAKRJHhbcm.avatar.jpg';
        $sample_obj->sample_date = $data['sample_date'];
        $sample_obj->leaf_color = $data['leaf_color'];
        $sample_obj->amount_branches = $data['amount_branches'];
        $sample_obj->flower_buds = $data['flower_buds'];
        $sample_obj->branch_color = $data['branch_color'];
        $sample_obj->roots = $data['roots'];
        $sample_obj->flower_color = $data['flower_color'];
        $sample_obj->flower_petals = $data['flower_petals'];
        $sample_obj->flowering_time = $data['flowering_time'];
        $sample_obj->flowering_time = $data['flowering_time'];
        $sample_obj->length_flowering = $data['length_flowering'];
        $sample_obj->seeds = $data['seeds'];
        $sample_obj->seeds_color = $data['seeds_color'];
        $sample_obj->amount_seeds = $data['amount_seeds'];

        //Image Upload, Change Image name with random string + origin name
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newFileName = Str::random(10) . '.' . $file->getClientOriginalName();
            $sample_obj->image_urls = '/upload/' . $file->storeAs('image/sample', $newFileName, 'file_upload');
        }

        $sample_obj->save();

        Session::flash('flash_message', 'Added New Sample Sucessfully!');
        return redirect()->back();
    }
}