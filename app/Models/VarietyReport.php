<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VarietyReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'variety_name',
        'grower_id',
        'breeder_id',
        'amount_plants',
        'pot_size',
        'pot_trial',
        'open_field_trial',
        'date_propagation',
        'date_potting',
        'image_url',
        'trial_location',
        'date_planned_sample',
    ];

    public function grower()
    {
        return $this->belongsTo(Grower::class, 'grower_id');
    }
    public function breeder()
    {
        return $this->belongsTo(Breeder::class, 'breeder_id');
    }
    public function samples()
    {
        return $this->hasMany(Sample::class, 'variety_report_id');
    }
}
