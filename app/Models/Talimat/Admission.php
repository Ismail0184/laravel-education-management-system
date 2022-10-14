<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = 'admission';
    protected $primaryKey = 'id';
    protected $dates = ['dob'];
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'roll',
        'name',
        'fname',
        'mname',
        'dob',
        'nationality',
        'mobile',
        'email',
        'nid',
        'specialidentity',
        'session',
        'oldornew',
        'classes_id',
        'branch_id',
        'caddress',
        'union_id',
        'thana_id',
        'district_id',
        'paddress',
        'punion_id',
        'pthana_id',
        'pdistrict_id',
        'madrasha',
        'pclass_id',
        'classyear',
        'result',   
        'monthlyfee_id',
        'profile_image_name',
        'nid_image_name',
        'birth_image_name',
        'user_id',
    ];

   public function user() {
        return $this->belongsTo(User::class);
    }
    public function classes() {
        return $this->belongsTo(Classes::class);
    }
    public function branch() {
        return $this->belongsTo(Branch::class);
    }
    public function pclass() {
        return $this->belongsTo(Classes::class, 'pclass_id');
    }
    
    public function monthlyfee() {
        return $this->belongsTo(Monthlyfee::class, 'monthlyfee_id');
    }
    public function thana() {
        return $this->belongsTo(Thana::class, 'thana_id');
    }
    public function district() {
        return $this->belongsTo(District::class, 'district_id');
    }
    
}
