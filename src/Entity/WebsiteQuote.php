<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;

class WebsiteQuote {

    /** 
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min=2 , max=50)
    */
    private $name;

    /** 
     * @var string
     * @Assert\NotBlank()
     * @Assert\Regex(pattern="/[0-9]{10}/")
    */
    private $phoneNumber;

    /** 
     * @var string
     * @Assert\NotBlank()
     * @Assert\Email()
    */
    private $email;

    /** 
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
    */
    private $message;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}