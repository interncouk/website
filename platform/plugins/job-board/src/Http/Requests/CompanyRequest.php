<?php

namespace Botble\JobBoard\Http\Requests;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class CompanyRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'slug' => 'nullable|string',
            'email' => 'nullable|email',
            'description' => 'nullable|max:400',
            'website' => 'nullable|max:120',
            'address' => 'nullable|max:250',
            'postal_code' => 'nullable|max:20',
            'phone' => 'nullable|max:25',
            'year_founded' => 'nullable|max:4',
            'ceo' => 'nullable|max:120',
            'number_of_offices' => 'nullable|numeric',
            'number_of_employees' => 'nullable|numeric',
            'annual_revenue' => 'nullable|string|max:60',
            'facebook' => 'nullable|max:200',
            'twitter' => 'nullable|max:200',
            'linkedin' => 'nullable|max:200',
            'instagram' => 'nullable|max:200',
            'latitude' => ['max:20', 'nullable', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'status' => Rule::in(BaseStatusEnum::values()),
        ];
    }
}
