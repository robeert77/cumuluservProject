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

    public static array $TYPES_ARR = [
        self::TYPE_COMPANY      => 'Company',
        self::TYPE_INDIVIDUAL   => 'Individual',
        self::TYPE_NON_PROFIT   => 'Non Profit Organization',
    ];

    public const int STATUS_ACTIVE = 1;

    public const int STATUS_FUTURE_COLLABORATING = 2;

    public const int STATUS_COLLABORATING = 3;

    public const int STATUS_STOP_COLLABORATING = 4;

    public static array $STATUSES_ARR = [
        self::STATUS_ACTIVE                 => 'Active',
        self::STATUS_FUTURE_COLLABORATING   => 'Future Collaborating',
        self::STATUS_COLLABORATING          => 'Collaborating',
        self::STATUS_STOP_COLLABORATING     => 'Collaboration Stopped',
    ];

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
            'status'        => 'required|integer|in:'.implode(',', array_keys(self::$STATUSES_ARR)),
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

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
