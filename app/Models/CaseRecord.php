<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseRecord extends Model
{
    use HasFactory;

    protected $table = 'cases';

    protected $fillable = [
        'user_id', // Make sure to include this if it's not already included
        'doctor_name',
        'gender',
        'patient_name',
        'service_type_id',
        'service_id',
        'due_date',
        'tooth',
        'stump_shade',
        'final_shade',
        'case_type',
        'pickup',
        'pickup_note',
        'pickup_date',
        'doctor_note',
        'total_cost',
        'status',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class);
    }

    public function caseFiles()
    {
        return $this->hasMany(CaseFile::class, 'case_id');
    }
}
