<?php

declare(strict_types=1);

namespace App\Http\Api\Authentication\RevokeAccessToken;

use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Http\FormRequest;

final class Request extends FormRequest
{
    public function authorize(): Response
    {
        return Response::allow();
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
