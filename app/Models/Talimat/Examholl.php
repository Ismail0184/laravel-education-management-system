<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examholl extends Model
{
    use HasFactory;
   
    public $table = 'examholl';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'name',
        'bench_count',
        'bench_row',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }   
}
