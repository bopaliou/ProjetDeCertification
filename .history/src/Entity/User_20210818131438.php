<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
#[ApiResource]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank(message="Le '{{value}}' ne peut pas etre vide")
     *  @Assert\Email(message="L'adresse '{{value}}' n'est pas valide'")
     */
    
    #[Assert\NotBlank(message:"L'adresse email ne peut pas etre vide"),
    Assert\Email(message:"L'adresse email n'est pas valide'")]
    private $email;

    /**
     * @ORM\Column(type="json")
     * @Assert\NotBlank(message="Tu doit spécifier un role")
     */
    #[Assert\NotBlank(message:"Le role ne peut pas etre vide")]
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Le mot de passe ne peut pas etre vide")
     * @Assert\Length(
     *   min=6,
     *   max=255,
     *   minMessage="Votre mot de passe doit contenir au minimum 6 caractères",
     *   maxMessage="Votre mot de passe doit contenir au maximum 255 caractères"
     *)
     */
    #[Assert\NotBlank(message:"Le '{{value}}' ne peut pas etre vide"),Assert\Length(
        min:6,
        max:20,
        minMessage:"Votre mot de passe doit contenir au minimum '{{ limit }}' caract_res",
        maxMessage:"Votre mot de passe doit contenir au maximum '{{ limit }}' caractères"
        )]
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le {{value}} ne peut pas etre vide")
     */
    #[Assert\NotBlank(message:"Le '{{value}}' ne peut pas etre vide")]
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le {{value}} ne peut pas etre vide")
     */
    #[Assert\NotBlank(message:"Le '{{value}}' ne peut pas etre vide")]
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le {{value}} ne peut pas etre vide")
     */
    #[Assert\NotBlank(message:"Le '{{value}}' ne peut pas etre vide")]
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Le {{value}} ne peut pas etre vide")
     */
    #[Assert\NotBlank(message:"Le numéro de '{{value}}' ne peut pas etre vide")]
    private $telephone;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="Le {{value}} ne peut pas etre vide")
     */
    #[Assert\NotBlank(message:"Le '{{value}}' ne peut pas etre vide")]
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le {{value}} ne peut pas etre vide")
     */
    #[Assert\NotBlank(message:"Le '{{value}}' ne peut pas etre vide")]
    private $lieuNaissance;

    /**
     * @ORM\OneToMany(targetEntity=Document::class, mappedBy="user_document")
     */

    private $documents;

    public function __construct()
    {
        $this->documents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(string $lieuNaissance): self
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    /**
     * @return Collection|Document[]
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): self
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
            $document->setUserDocument($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->documents->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getUserDocument() === $this) {
                $document->setUserDocument(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->prenom." ".$this->nom;
    }
}
