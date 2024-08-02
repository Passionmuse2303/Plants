<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;
    protected $fillable = [
        'variety_report_id',
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
        'image_urls', // Add this if you intend to handle image URLs as well
    ];
    public function varietyReport()
    {
        return $this->belongsTo(VarietyReport::class, 'variety_report_id');
    }
}