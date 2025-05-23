<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public const int STATUS_ACTIVE = 1;
    public const int STATUS_IN_PROGRESS = 2;
    public const int STATUS_COMPLETED = 3;
    public const int STATUS_ON_HOLD = 4;
    private static array $STATUSES_ARR = [];


    protected $attributes = [
        'status' => self::STATUS_ACTIVE,
    ];

    protected $fillable = [
        'user_id', 'company_id', 'title', 'description', 'status', 'scheduled_date',
    ];


    public static function getStatuses(): array
    {
        if (empty(self::$STATUSES_ARR)) {
            self::$STATUSES_ARR = [
                self::STATUS_ACTIVE      => __('tasks.statuses.active'),
                self::STATUS_IN_PROGRESS => __('tasks.statuses.active'),
                self::STATUS_COMPLETED   => __('tasks.statuses.completed'),
                self::STATUS_ON_HOLD     => __('tasks.statuses.on_hold'),
            ];
        }

        return self::$STATUSES_ARR;
    }

    public function scopeFilters(Builder $query, array $filters)
    {
        if (!empty($filters['user_id'])) {
            $query->where('user_id', $filters['user_id']);
        }

//        if (!empty($filters['company_id'])) {
//            $query->where('company_id', $filters['company_id']);
//        }

        if (!empty($filters['title'])) {
            $query->where('title', 'like', '%' . $filters['title'] . '%');
        }

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['start_scheduled_date'])) {
            $query->where('scheduled_date', '>=', $filters['start_scheduled_date']);
        }

        if (!empty($filters['end_scheduled_date'])) {
            $query->where('scheduled_date', '<=', $filters['end_scheduled_date']);
        }

        if (!empty($filters['start_completed_date'])) {
            $query->where('completed_date', '>=', $filters['start_completed_date']);
        }

        if (!empty($filters['end_completed_date'])) {
            $query->where('completed_date', '<=', $filters['end_completed_date']);
        }

        return $query;
    }

    public function validationRules() : array
    {
        return [
            'user_id'           => 'required|exists:users,id',
            'company_id'        => 'nullable|exists:companies,id',
            'title'             => 'required|string|max:255',
            'description'       => 'nullable|string',
            'scheduled_date'    => 'required|date',
            'completed_date'    => 'nullable|date',
        ];
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
