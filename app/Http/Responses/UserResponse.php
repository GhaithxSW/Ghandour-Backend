<?php

namespace App\Http\Responses;

use JsonSerializable;
use Psr\Http\Message\ResponseInterface;

class UserResponse implements JsonSerializable
{
    private ?string $token;
    private ?int $userId;
    private ?string $username;
    private ?string $email;
    private ?string $childName;
    private ?int $childAge;
    private ?string $role;

    public function __construct($token, $userId, $username, $email, $childName, $childAge, $role)
    {
        $this->token = $token;
        $this->userId = $userId;
        $this->username = $username;
        $this->email = $email;
        $this->childName = $childName;
        $this->childAge = $childAge;
        $this->role = $role;
    }

    public function jsonSerialize(): array
    {
        return [
            'token' => $this->token,
            'userId' => $this->userId,
            'username' => $this->username,
            'email' => $this->email,
            'childName' => $this->childName,
            'childAge' => $this->childAge,
            'role' => $this->role
        ];
    }
}
