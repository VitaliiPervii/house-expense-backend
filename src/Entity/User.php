<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $apiToken;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;


    public function __construct()
    {
        $this->isActive = true;
    }

    /**
     * @param string $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $apiToken
     */
    public function setApiToken($apiToken): void
    {
        $this->apiToken = $apiToken;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
        //
    }
}
