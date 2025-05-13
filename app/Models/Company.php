<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'vat', 'type', 'status', 'with_contract', 'address', 'phone', 'email', 'details'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'with_contract' => 'boolean',
    ];

    public const int TYPE_COMPANY = 1;
    public const int TYPE_INDIVIDUAL = 2;
    public const int TYPE_NON_PROFIT = 3;

    public const int STATUS_ACTIVE = 1;
    public const int STATUS_FUTURE_COLLABORATING = 2;
    public const int STATUS_COLLABORATING = 3;
    public const int STATUS_STOP_COLLABORATING = 4;

    private static array $TYPES_ARR = [];
    private static array $STATUSES_ARR = [];
    public static function getTypes(): array
    {
        if (empty(self::$TYPES_ARR)) {
            self::$TYPES_ARR = [
                self::TYPE_COMPANY => __('companies.types.company'),
                self::TYPE_INDIVIDUAL => __('companies.types.individual'),
                self::TYPE_NON_PROFIT => __('companies.types.non_profit'),
            ];
        }

        return self::$TYPES_ARR;
    }

    public static function getStatuses(): array
    {
        if (empty(self::$STATUSES_ARR)) {
            self::$STATUSES_ARR = [
                self::STATUS_ACTIVE                => __('companies.statuses.active'),
                self::STATUS_FUTURE_COLLABORATING  => __('companies.statuses.future_collaborating'),
                self::STATUS_COLLABORATING         => __('companies.statuses.collaborating'),
                self::STATUS_STOP_COLLABORATING    => __('companies.statuses.stop_collaborating'),
            ];
        }

        return self::$STATUSES_ARR;
    }

    public function setWithContractAttribute($value)
    {
        $this->attributes['with_contract'] = ($value === '1');
    }

    public function scopeFilters(Builder $query, array $filters)
    {
        if (!empty($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        if (!empty($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (isset($filters['with_contract'])) {
            $query->where('with_contract', $filters['with_contract']);
        }

        if (!empty($filters['vat'])) {
            $query->where('vat', 'like', '%' . $filters['vat'] . '%');
        }

        if (!empty($filters['phone'])) {
            $query->where('phone', 'like', '%' . $filters['phone'] . '%');
        }

        if (!empty($filters['email'])) {
            $query->where('email', 'like', '%' . $filters['email'] . '%');
        }

        return $query;
    }

    public function validationRules(): array
    {
        return [
            'name'          => 'required|string|max:255',
            'vat'           => 'required|string|max:20',
            'type'          => 'required|integer',
            'status'        => 'required|integer|in:'.implode(',', array_keys(self::getStatuses())),
            'with_contract' => 'required|boolean',
            'address'       => 'nullable|string',
            'phone'         => 'nullable|string|max:20',
            'email'         => 'nullable|email|max:255',
            'details'       => 'nullable|string|min:10',
        ];
    }

    public function interventions()
    {
        return $this->hasMany(Intervention::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
