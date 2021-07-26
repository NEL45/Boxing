<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Account
{

    private string $email;
    private string $newPassword;
    private string $confirmNewPassword;

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=180)
     * @Assert\Email
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=255)
     */
    public function getNewPassword(): ?string
    {
        return $this->newPassword;
    }

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=255)
     */
    public function getConfirmNewPassword(): string
    {
        return $this->confirmNewPassword;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setNewPassword(string $password): void
    {
        $this->newPassword = $password;
    }

    public function setConfirmNewPassword(string $password): void
    {
        $this->confirmNewPassword = $password;
    }
}
