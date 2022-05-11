<?php

namespace App\Models;
/**
 *
 * @property-read string $full_name
 */

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Role;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends \TCG\Voyager\Models\User implements JWTSubject
{
    use HasFactory, Notifiable, SoftDeletes;

    public const STUDENT_ROLE = 'student';
    public const MANAGER_ROLE = 'manager';
    public const COACH_ROLE = 'coach';
    public const ADMIN_ROLE = 'admin';
    public $additional_attributes = ['full_name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'fathers_name',
        'name',
        'email',
        'password',
        'fio',
        'location_city_id',
        'location_country_id',
        'manager_id',
        'phone',
        'second_phone',
        'occupation',
        'birth_date',
        'gender',
        'is_active_notification',
        'company_name',
        'holding_name',
        'languages',
        'iin',
        'id_card_file',
        'resume_file',
        'requisites_file',
        'agreement_files',
        'coach_type',
        'coach_status',
        'coach_fee',
        'scoring_file',
        'scoring',
        'rups',
        'email_private',
        'division',
        'project',
        'personal_type',
        'person_id',
        'employee_number',
        'employee_code',
        'position_level',
        'position_level_top',
        'position_family',
        'grade',
    ];

    public $defaultImagePath = 'users/default.png';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /** Relationships */
    public function locationCity(): BelongsTo
    {
        return $this->belongsTo(LocationCity::class);
    }

    public function locationCountry(): BelongsTo
    {
        return $this->belongsTo(LocationCountry::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(CourseGroup::class, 'course_group_student', 'user_id', 'course_group_id');
    }

    public function homeworkAnswers(): HasMany
    {
        return $this->hasMany(HomeworkAnswer::class);
    }

    public function coach(): HasOne
    {
        return $this->hasOne(Coach::class);
    }

    public function manager(): HasOne
    {
        return $this->hasOne(Manager::class);
    }
    /** Accessors */
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getCityNameAttribute()
    {
        return !empty($this->locationCity) ? $this->locationCity->name : '';
    }

    public function getCountryNameAttribute()
    {
        return !empty($this->locationCountry->name) ? $this->locationCountry->name : '';
    }

    public function getCoursesAttribute(): Collection
    {
        $ids = $this->groups->pluck('id');
        return Course::query()->whereHas('groups', function ($query) use ($ids) {
            $query->whereIn('id', $ids);
        })->with('groups')->get();
    }

    public function getActiveCoursesAttribute(): Collection
    {
        $ids = $this->groups->pluck('id');
        return Course::whereHas('groups', function ($query) use ($ids) {
            $query->whereIn('id', $ids);
        })->with('groups', 'completed')->doesntHave('completed')->get();
    }

    public function getFinishedCoursesAttribute(): Collection
    {
        $ids = $this->groups->pluck('id');
        return Course::query()->whereHas('groups', function ($query) use ($ids) {
            $query->whereIn('id', $ids);
        })->with('groups', 'completed')->has('completed')->get();
    }

    /**
     * @param $number number of lessons needed
     * @return \Illuminate\Database\Eloquent\Builder[]|Collection
     */
    public function getClosestFutureLessons($number)
    {
        $groupIds = $this->groups->pluck('id');
        return Lesson::query()->whereIn('course_group_id', $groupIds)->where(DB::raw('date + time_from'), '>', now())->orderBy(DB::raw('date + time_from'))->take($number)->get();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function sendResetPasswordNotification()
    {
        $this->notify(new \App\Notifications\SendPasswordLinkNotification());
    }

    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }

    public function getFirstLastNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getFullNameAttribute()
    {
        return mb_convert_case("{$this->last_name} {$this->first_name} {$this->fathers_name}", MB_CASE_TITLE, "UTF-8");
    }

    public function getAvatarImageAttribute(): string
    {
        return $this->avatar !== null ? Voyager::image($this->avatar) : Voyager::image($this->defaultImagePath);
    }

    public function getRoleNameAttribute(): string
    {
        $role = 'student';
        if (!empty($this->coach)) {
            $role = self::COACH_ROLE;
        } else if (!empty($this->role)) {
            if ($this->role->name === self::ADMIN_ROLE) {
                $role = self::ADMIN_ROLE;
            }
        }
        return $role;
    }

    /*/ SCOPES */
    public function scopeStudents($query)
    {
        return $query->with('manager', 'coach', 'role')->doesntHave('manager')->doesntHave('coach')->whereHas('role', function ($q) {
            return $q->where('name', '!=', self::ADMIN_ROLE);
        });
    }
}
