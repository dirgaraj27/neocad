<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'case_id', // Make sure to include this if it's not already included
        'file_name',
    ];

    public function caseRecord()
    {
        return $this->belongsTo(CaseRecord::class, 'case_id'); // 'case_id' is the foreign key column
    }


}
