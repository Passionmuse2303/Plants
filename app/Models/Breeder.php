<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breeder extends Model
{
    use HasFactory;
    protected $fillable = [
        'breeder_id',
        'company_name',
        'contact_person',
        'person_id',
        'street',
        'city',
        'postal_code',
        'country',
        'website',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'person_id');
    }

    public function varietyReports()
    {
        return $this->hasMany(VarietyReport::class, 'breeder_id');
    }

}