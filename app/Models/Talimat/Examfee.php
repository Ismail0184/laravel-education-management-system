<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examfee extends Model
{
    use HasFactory;
   
    public $table = 'examfee';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'examfee',
        'classes_id',
        'examname_id',
        'user_id',
    ];

    public function classes() {
        return $this->belongsTo(Classes::class);
    }

    public function examname() {
        return $this->belongsTo(Examname::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
