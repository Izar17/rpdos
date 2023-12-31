<?php

namespace App\Http\Requests;

use App\Transaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTransactionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'hospital_id' => [
                'required',
                'integer'],
            'asset_id'  => [
                'required',
                'integer'],
        ];

    }
}
