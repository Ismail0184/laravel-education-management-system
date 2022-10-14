<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siteplan extends Model
{
    use HasFactory;
   
    public $table = 'siteplan';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'admission_id',
        'exambench_id',
        'examname_id',
        'exambenchside_id',
        'user_id',
    ];

    public function admission() {
        return $this->belongsTo(Admission::class);
    }
    public function exambench() {
        return $this->belongsTo(Exambench::class);
    }
    public function examname() {
        return $this->belongsTo(Examname::class);
    }

    public function exambenchside() {
        return $this->belongsTo(Exambenchside::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
