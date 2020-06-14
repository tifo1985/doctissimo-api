<?php

namespace App\Model;

use Symfony\Component\Serializer\Annotation\Groups;

class Article
{
    /**
     * @var int
     *
     * @Groups({"get_article"})
     */
    private $id;

    /**
     * @var string
     *
     * @Groups({"get_article"})
     */
    private $title;

    /**
     * @var string
     *
     * @Groups({"get_article"})
     */
    private $description;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}