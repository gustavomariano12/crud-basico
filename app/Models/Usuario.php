<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        "Username",
        "Email",
        "Senha"
    ];
}
