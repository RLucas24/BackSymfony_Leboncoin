<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Contraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @UniqueEntity(fields=email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_username", type="string", length=50)
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_email", type="string", length=80, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $usrEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_pwd", type="string", length=30)
     */
    private $usrPwd;
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     * @ORM\Column(name="usr_plainPwd", type="string")
     */
    private $usrPlainPwd;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="usr_dateCreatUser", type="datetimetz")
     */
    private $usrDateCreatUser;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="usr_type", type="string", length=255)
     */
    private $usrType;

    /**
     * @ORM\Column(type="array")
     */
    private $roles;

    public function __construct()
    {
        $this->roles = array('ROLE_USER');
    }

    // other properties and methods


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set usrUsername
     *
     * @param string $usrUsername
     *
     * @return User
     */
    public function setUsrUsername($usrUsername)
    {
        $this->usrUsername = $usrUsername;

        return $this;
    }

    /**
     * Get usrUsername
     *
     * @return string
     */
    public function getUsrUsername()
    {
        return $this->usrUsername;
    }

    /**
     * Set usrEmail
     *
     * @param string $usrEmail
     *
     * @return User
     */
    public function setUsrEmail($usrEmail)
    {
        $this->usrEmail = $usrEmail;

        return $this;
    }

    /**
     * Get usrEmail
     *
     * @return string
     */
    public function getUsrEmail()
    {
        return $this->usrEmail;
    }

    /**
     * Set usrPwd
     *
     * @param string $usrPwd
     *
     * @return User
     */
    public function setUsrPwd($usrPwd)
    {
        $this->usrPwd = $usrPwd;

        return $this;
    }

    /**
     * Get usrPwd
     *
     * @return string
     *
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getUsrPwd()
    {
        return $this->usrPwd;
    }

    /**
     * Set $usrPlainPwd
     *
     * @param string $usrPlainPwd
     *
     * @return User
     */
    public function setUsrPlainPwd($usrPlainPwd)
    {
        $this->$usrPlainPwd = $usrPlainPwd;

        return $this;
    }

    /**
     * Get $usrPlainPwd
     *
     * @return string
     */
    public function getUsrPlainPwd()
    {
        return $this->usrPlainPwd;
    }

    /**
     * Set usrDateCreatUser
     *
     * @param \DateTime $usrDateCreatUser
     *
     * @return User
     */
    public function setUsrDateCreatUser($usrDateCreatUser)
    {
        $this->usrDateCreatUser = $usrDateCreatUser;

        return $this;
    }

    /**
     * Get usrDateCreatUser
     *
     * @return \DateTime
     */
    public function getUsrDateCreatUser()
    {
        return $this->usrDateCreatUser;
    }

    /**
     * Set usrType
     *
     * @param string $usrType
     *
     * @return User
     */
    public function setUsrType($usrType)
    {
        $this->usrType = $usrType;

        return $this;
    }

    /**
     * Get usrType
     *
     * @return string
     */
    public function getUsrType()
    {
        return $this->usrType;
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return $this->roles;
    }


    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }



    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        // TODO: Implement getPassword() method.
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }
}

