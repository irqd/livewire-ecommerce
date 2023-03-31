<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $table = 'company_profile';

    protected $fillable = [
        'name',
        'logo',
    ];

    public function socials()
    {
        return $this->hasMany(CompanySocials::class);
    }

    public function documents()
    {
        return $this->hasMany(CompanyDocuments::class);
    }


}
