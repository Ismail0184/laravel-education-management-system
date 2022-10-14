<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monthlyfee extends Model
{
    use HasFactory;

    public $table = 'monthlyfee';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'monthlyfee',
        'classes_id',
        'user_id',
    ];

    public function classes() {
        return $this->belongsTo(Classes::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
