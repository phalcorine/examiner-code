<?php

namespace App\Entity;

use App\Repository\AdminUserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdminUserRepository::class)
 */
class AdminUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column (type="string", length=32, nullable=false)
     */
    private $fullName;

    /**
     * @ORM\Column (type="string", length=128, nullable=false)
     */
    private $loginUsername;

    /**
     * @ORM\Column (type="string", length=2048, nullable=false)
     */
    private $loginPasswordHash;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getLoginUsername(): ?string
    {
        return $this->loginUsername;
    }

    public function setLoginUsername(string $loginUsername): self
    {
        $this->loginUsername = $loginUsername;

        return $this;
    }

    public function getLoginPasswordHash(): ?string
    {
        return $this->loginPasswordHash;
    }

    public function setLoginPasswordHash(string $loginPasswordHash): self
    {
        $this->loginPasswordHash = $loginPasswordHash;

        return $this;
    }
}
