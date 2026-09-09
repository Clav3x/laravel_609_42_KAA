<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function sessions()
    {
        return $this->belongsToMany(SalonSession::class, 'rendered_services', 'service_id', 'session_id')
                    ->withPivot('actual_price');
    }
}
