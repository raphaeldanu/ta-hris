<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user()->cannot('create', Employee::class)){
            return redirectNotAuthorized('employees');
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => 'required',
            'position_id' => 'required',
            'salary_range_id' => 'required',
            'nik' => 'required|string|unique:employees,nik|max:16',
            'bpjs_tk_number' => 'required|string',
            'bpjs_kes_number' => 'required|string',
            'bpjs_npwp_number' => 'required|string',
            'name' => 'required|string',
            'first_join' => 'required|date',
            'last_contract_start' => 'required|date',
            'last_contract_end' => 'required|date',
            'birth_place' => 'required|string',
            'birth_date' => 'required|date',
            'tax_status' => 'required|string',
            'address_on_id' => 'required|string',
            'phone_number' => 'required|string|max:16',
            'blood_type' => 'required|string',
        ];
    }
}
