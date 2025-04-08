<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'vat', 'type', 'status', 'address', 'phone', 'email', 'details'
    ];

    protected $guarded = ['id'];

    public const int STATUS_ACTIVE = 1;

    public const int STATUS_FUTURE_COLLABORATING = 2;

    public const int STATUS_COLLABORATING = 3;

    public const int STATUS_STOP_COLLABORATING = 4;

    public static array $STATUSES_ARR = [
        self::STATUS_ACTIVE                 => ['title' => 'Active'],
        self::STATUS_FUTURE_COLLABORATING   => ['title' => 'Future Collaborating'],
        self::STATUS_COLLABORATING          => ['title' => 'Collaborating'],
        self::STATUS_STOP_COLLABORATING     => ['title' => 'Collaboration Stopped'],
    ];

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
