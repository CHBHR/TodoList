<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table
 * @ORM\Entity(repositoryClass="App\Repository\TaskRepository")
 */
class Task
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Vous devez saisir un titre.")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Vous devez saisir du contenu.")
     */
    private $content;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDone;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="tasks")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasDeadLine;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deadLine;

    public function __construct()
    {
        $this->createdAt = new \Datetime();
        $this->isDone = false;
        $this->deadLine = null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function isDone()
    {
        return $this->isDone;
    }

    public function toggleIsDone($flag)
    {
        $this->isDone = $flag;
    }

    public function getHasDeadLine()
    {
        return $this->hasDeadLine;
    }

    public function setHasDeadLine($hasDeadLine)
    {
        return $this->hasDeadLine = $hasDeadLine;
    }

    public function toggleDeadLine($flag)
    {
        $this->hasDeadLine = $flag;
    }

    public function getDeadLine()
    {
        return $this->deadLine;
    }

    public function setDeadLine($deadLine)
    {
        $this->deadLine = $deadLine;
    }

    /**
     * Set isDone
     *
     * @param boolean $isDone
     *
     * @return Task
     */
    public function setIsDone($isDone)
    {
        $this->isDone = $isDone;

        return $this;
    }

    /**
     * Get isDone
     *
     * @return boolean
     */
    public function getIsDone()
    {
        return $this->isDone;
    }

    /**
     * Set user
     *
     * @param \App\Entity\User $user
     *
     * @return Task
     */
    public function setUser(\App\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \App\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
