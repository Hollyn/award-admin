<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name'];

    public function candidateCategories()
    {
        return $this->hasMany(CandidateCategory::class);
    }
}
