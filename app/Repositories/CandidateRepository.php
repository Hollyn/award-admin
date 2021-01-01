<?php

namespace App\Repositories;

use App\Models\Candidate;

class CandidateRepository
{
    public function getAllCandidates()
    {
        $candidate = Candidate::get();
        return $candidate;
    }

    public function saveCandidate($candidateName)
    {
        $candidate = Candidate::firstOrCreate([
            'name' => $candidateName
        ]);
        return $candidate;
    }
}
