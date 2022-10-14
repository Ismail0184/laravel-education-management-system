<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exambench extends Model
{
    use HasFactory;
   
    public $table = 'exambench';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        
        'name',
        'bench_row',
        'c1',
        'c2',
        'c3',
        'examholl_id',
        'examname_id',
        'user_id',
    ];

   public function examholl() {
        return $this->belongsTo(Examholl::class);
    }

    public function examname() {
        return $this->belongsTo(Examname::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
