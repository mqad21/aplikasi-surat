<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutcomingLetter extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function publishingUnit()
    {
        return $this->belongsTo(PublishingUnit::class);
    }

    public function signer()
    {
        return $this->belongsTo(Signer::class);
    }
}
