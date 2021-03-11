<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class StoreActivityRequest extends FormRequest
{
    /**
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/datetime-local#value
     */
    const DATETIME_LOCAL_FORMAT = 'Y-m-d\TH:i';

    public function rules(): array
    {
        return [
            'start'    => 'required|date',
            'finish'   => 'required|date',
            'distance' => 'required|numeric|gt:0',
            'type'     => 'required|in:run,ride',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
