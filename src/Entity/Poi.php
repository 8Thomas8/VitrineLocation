<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="poi")
 * @ORM\HasLifecycleCallbacks
 */
class Poi implements Feature
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     *
     * @var UuidInterface
     */
    private $id;

    /**
     * @ORM\Column(name="title", type="string")
     *
     * @var string
     */
    private $title;

    /**
     * @ORM\Column(name="message", type="string")
     *
     * @var string
     */
    private $message;

    /**
     * @ORM\Column(name="created", type="datetime")
     *
     * @var DateTime
     */
    private $created;

    /**
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     *
     * @var DateTime|null
     */
    private $updated;

    /**
     * @ORM\PrePersist
     *
     * @throws Exception;
     */
    public function onPrePersist(): void
    {
        $this->id = Uuid::uuid4();
        $this->created = new DateTime('NOW');
    }

    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate(): void
    {
        $this->updated = new DateTime('NOW');
    }

    public function getId(): UuidInterface
    {
        if ($this->id == NULL) {
            $this->id = Uuid::uuid4();
        }

        return $this->id;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setCreated(DateTime $created): void
    {
        $this->created = $created;
    }

    public function getCreated(): DateTime
    {
        if ($this->created == NULL) {
            $this->created = new DateTime('Now');
        }

        return $this->created;
    }

    public function setUpdated(DateTime $updated): void
    {
        $this->updated = $updated;
    }


    public function getUpdated(): DateTime
    {
        if ($this->updated == NULL) {
            $this->updated = new DateTime('Now');
        }

        return $this->updated;
    }
}