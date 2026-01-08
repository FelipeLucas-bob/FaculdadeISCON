<?php

namespace App\Http\Requests;

use App\Exceptions\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserPutUpdatePassword extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $passValidation = 'required|min:8|max:20';
        return [
            'old-password' => $passValidation,
            'new-password' => $passValidation,
            'confirm-password' => $passValidation,
        ];
    }

    public function attributes(): array
    {
        return [
            'old-password' => 'Senha Atual',
            'new-password' => 'Nova Senha',
            'confirm-password' => 'Confirmar Senha',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException(
            'Erro ao validar os campos',
            'warning',
            route('user.edit.alterar-senha', Auth::user()->id),
            $this->getCleanData(),
            $validator->errors()->toArray()
        );
    }

    public function getCleanData(): array
    {
        $valueList = $this->input();

        unset($valueList['_token']);
        unset($valueList['_method']);

        return $valueList;
    }
}
