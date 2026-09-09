<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalonSession extends Model
{
    use HasFactory;

    protected $table = 'salon_sessions';

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'rendered_services', 'session_id', 'service_id')
                    ->withPivot('actual_price');
    }
    public function beautician()
    {
        return $this->belongsTo(User::class, 'beautician_id');
    }

}
