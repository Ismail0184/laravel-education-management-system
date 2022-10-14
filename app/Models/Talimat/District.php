<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    public $table = 'district';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'name',
        'division',
        'user_id',
    ];

    public function thana() {
        return $this->hasOne(Thana::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
