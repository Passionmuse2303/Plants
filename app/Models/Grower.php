<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grower extends Model
{
    use HasFactory;
    protected $fillable = [
        'grower_id',
        'company_name',
        'person_id',
        'contact_person',
        'street',
        'city',
        'postal_code',
        'country',
        'website',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'person_id', 'id');
    }

    public function varietyReports()
    {
        return $this->hasMany(VarietyReport::class, 'grower_id');
    }
}