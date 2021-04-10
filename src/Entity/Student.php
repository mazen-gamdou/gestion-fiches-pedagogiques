<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numEtudiant;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $portable;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adressePostal;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $regimespecialetude;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typecontrole;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $redoublant;

    /**
     * @ORM\Column(type="integer")
     */
    private $semestreobtenu;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $demandetemps;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\Column(type="json")
     */
    private $module = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $parcours;

    /**
     * @ORM\Column(type="integer")
     */
    private $semestre;

    /**
     * @ORM\Column(type="smallint")
     */
    private $valide;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNumEtudiant(): ?string
    {
        return $this->numEtudiant;
    }

    public function setNumEtudiant(string $numEtudiant): self
    {
        $this->numEtudiant = $numEtudiant;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

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

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getPortable(): ?string
    {
        return $this->portable;
    }

    public function setPortable(string $portable): self
    {
        $this->portable = $portable;

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

    public function getAdressePostal(): ?string
    {
        return $this->adressePostal;
    }

    public function setAdressePostal(string $adressePostal): self
    {
        $this->adressePostal = $adressePostal;

        return $this;
    }

    public function getRegimespecialetude(): ?string
    {
        return $this->regimespecialetude;
    }

    public function setRegimespecialetude(string $regimespecialetude): self
    {
        $this->regimespecialetude = $regimespecialetude;

        return $this;
    }

    public function getTypecontrole(): ?string
    {
        return $this->typecontrole;
    }

    public function setTypecontrole(string $typecontrole): self
    {
        $this->typecontrole = $typecontrole;

        return $this;
    }

    public function getRedoublant(): ?string
    {
        return $this->redoublant;
    }

    public function setRedoublant(string $redoublant): self
    {
        $this->redoublant = $redoublant;

        return $this;
    }

    public function getSemestreobtenu(): ?int
    {
        return $this->semestreobtenu;
    }

    public function setSemestreobtenu(int $semestreobtenu): self
    {
        $this->semestreobtenu = $semestreobtenu;

        return $this;
    }

    public function getDemandetemps(): ?string
    {
        return $this->demandetemps;
    }

    public function setDemandetemps(string $demandetemps): self
    {
        $this->demandetemps = $demandetemps;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getModule(): ?array
    {
        return $this->module;
    }

    public function setModule(array $module): self
    {
        $this->module = $module;

        return $this;
    }

    public function getParcours(): ?string
    {
        return $this->parcours;
    }

    public function setParcours(string $parcours): self
    {
        $this->parcours = $parcours;

        return $this;
    }

    public function getSemestre(): ?int
    {
        return $this->semestre;
    }

    public function setSemestre(int $semestre): self
    {
        $this->semestre = $semestre;

        return $this;
    }

    public function getValide(): ?int
    {
        return $this->valide;
    }

    public function setValide(int $valide): self
    {
        $this->valide = $valide;

        return $this;
    }


}
