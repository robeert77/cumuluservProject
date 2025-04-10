<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'user_id', 'title', 'description', 'date', 'start_time', 'end_time'
    ];

    public function scopeFilters(Builder $query, array $filters)
    {
        if (!empty($filters['title'])) {
            $query->where('title', 'like', '%' . $filters['title'] . '%');
        }

        if (!empty($filters['user_id'])) {
            $query->where('user_id', $filters['user_id']);
        }

       if (!empty($filters['start_date'])) {
           $query->where('date', '>=', $filters['start_date']);
       }

        if (!empty($filters['end_date'])) {
            $query->where('date', '<=', $filters['end_date']);
        }

        return $query;
    }

    public function validationRules(): array
    {
        return [
            'company_id'    => 'nullable|exists:companies,id',
            'user_id'       => 'nullable|exists:users,id',
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'date'          => 'required|date',
            'start_time'    => 'required|date_format:H:i',
            'end_time'      => 'nullable|date_format:H:i',
        ];
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
