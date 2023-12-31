<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateProductionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('production_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'asset_id' => [
                'required',
                'integer'],
        ];

    }
}
