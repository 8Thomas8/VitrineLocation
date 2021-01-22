<?php

declare(strict_types=1);

namespace App\Entity\EntityInterface;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
interface Feature
{
    /**
     * @ORM\PrePersist
     *
     * @throws Exception;
     */
    public function onPrePersist(): void;

    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate(): void;

    public function getId(): UuidInterface;

    public function getMessage(): string;

    public function setMessage(string $message): void;

    public function getTitle(): string;

    public function setTitle(string $title): void;

    public function setCreated(DateTime $created): void;

    public function getCreated(): DateTime;

    public function setUpdated(DateTime $updated): void;

    public function getUpdated(): DateTime;
}