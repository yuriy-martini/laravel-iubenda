<?php

namespace SoluzioneSoftware\Iubenda\Objects;

class Subject
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $ownerId;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var bool
     */
    private $verified;

    /**
     * @var array
     */
    private $preferences;

    public function __construct(string $id, string $ownerId, string $email, string $firstName, string $lastName, bool $verified, array $preferences)
    {
        $this->id = $id;
        $this->ownerId = $ownerId;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->verified = $verified;
        $this->preferences = $preferences;
    }

    public static function create(array $attrs): self
    {
        return new self($attrs['id'], $attrs['owner_id'], $attrs['email'], $attrs['first_name'], $attrs['last_name'], (bool)$attrs['verified'], $attrs['preferences']);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getOwnerId(): string
    {
        return $this->ownerId;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return bool
     */
    public function isVerified(): bool
    {
        return $this->verified;
    }

    /**
     * @return array
     */
    public function getPreferences(): array
    {
        return $this->preferences;
    }
}
