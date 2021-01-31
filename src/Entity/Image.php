<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;
use App\Entity\EntityInterface\Entity;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity
 * @ORM\Table(name="Picture")
 * @ORM\HasLifecycleCallbacks
 */
class Image implements Entity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     *
     * @var UuidInterface
     */
    private $id;

    /**
     * @ORM\Column(name="orderNb", type="integer")
     *
     * @var integer
     */
    private $orderNb;

    /**
     * @ORM\Column(name="title", type="string")
     *
     * @var string
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $file;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var boolean
     */
    private $display;

    /**
     * @return bool
     */
    public function isDisplay(): bool
    {
        return $this->display;
    }

    /**
     * @param bool $display
     */
    public function setDisplay(bool $display): void
    {
        $this->display = $display;
    }

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

    public function getFile(): string
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * Updates the hash value to force the preUpdate and postUpdate events to fire.
     */
    public function refreshUpdated()
    {
        $this->setUpdated(new DateTime());
    }

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

    public function getOrderNb(): int
    {
        if ($this->orderNb == NULL) {
            $this->orderNb = 0;
        }

        return $this->orderNb;
    }

    public function setOrderNb(int $orderNb): void
    {
        $this->orderNb = $orderNb;
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