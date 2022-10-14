<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = 'teacher';
    protected $primaryKey = 'id';
    protected $dates = ['dob'];
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'fname',
        'mname',
        'dob',
        'nationality',
        'mobile',
        'email',
        'nid',
        'specialidentity',
        'caddress',
        'union_id',
        'thana_id',
        'district_id',
        'paddress',
        'punion_id',
        'pthana_id',
        'pdistrict_id',
        'highest_jamat',
        'highest_madrasha',
        'highest_board',
        'highest_pass_year',
        'hafez_madrasha',
        'hafez_board',
        'hafez_pass_year',
        'qirat_madrasha',
        'qirat_board',
        'qirat_pass_year',
        'ifta_madrasha',
        'ifta_board',
        'ifta_pass_year',
        'adab_madrasha',
        'adab_board',
        'adab_pass_year',
        'other_jamat',
        'other_madrasha',
        'other_board',
        'other_pass_year',
        'job_madrasha',
        'job_negran_jamat',
        'job_kitab',
        'job_experience_year',
        'job_note',
        'salary',
        'profile_image_name',
        'nid_image_name',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function thana() {
        return $this->belongsTo(Thana::class, 'thana_id');
    }
    public function district() {
        return $this->belongsTo(District::class, 'district_id');
    }

}
