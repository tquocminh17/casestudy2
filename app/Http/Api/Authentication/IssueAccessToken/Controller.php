<?php

declare(strict_types=1);

namespace App\Http\Api\Authentication\IssueAccessToken;

use App\Actions\Authentication\IssueAccessToken;

final class Controller
{
    public function __construct(
        private readonly IssueAccessToken\Action $issueAccessToken
    ) {}

    public function __invoke(Request $request): Response
    {
        $response = $this->issueAccessToken->execute(
            new IssueAccessToken\ActionOptions(
                $request->email(),
                $request->password()
            )
        );

        return new Response($response->token);
    }
}
