<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'username',
        'name',
        'usertype',
        'email',
        'email_verified_at',
        // ... other relevant data fields
        'archived_at', // Optional column for archive date/time
    ];
}
