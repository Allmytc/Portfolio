<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $lastName;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cv;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Experience", mappedBy="user")
     */
    private $experiences;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Project", mappedBy="user")
     */
    private $projects;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Diploma", mappedBy="user")
     */
    private $diplomas;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Skill", mappedBy="user")
     */
    private $skills;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Technos", mappedBy="user")
     */
    private $technos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Language", mappedBy="user")
     */
    private $languages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Loisir", mappedBy="user")
     */
    private $loisirs;

    public function __construct()
    {
        $this->experiences = new ArrayCollection();
        $this->projects = new ArrayCollection();
        $this->diplomas = new ArrayCollection();
        $this->skills = new ArrayCollection();
        $this->technos = new ArrayCollection();
        $this->languages = new ArrayCollection();
        $this->loisirs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

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

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    /**
     * @return Collection|Experience[]
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experience $experience): self
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences[] = $experience;
            $experience->setUser($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): self
    {
        if ($this->experiences->contains($experience)) {
            $this->experiences->removeElement($experience);
            // set the owning side to null (unless already changed)
            if ($experience->getUser() === $this) {
                $experience->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setUser($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->contains($project)) {
            $this->projects->removeElement($project);
            // set the owning side to null (unless already changed)
            if ($project->getUser() === $this) {
                $project->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Diploma[]
     */
    public function getDiplomas(): Collection
    {
        return $this->diplomas;
    }

    public function addDiploma(Diploma $diploma): self
    {
        if (!$this->diplomas->contains($diploma)) {
            $this->diplomas[] = $diploma;
            $diploma->setUser($this);
        }

        return $this;
    }

    public function removeDiploma(Diploma $diploma): self
    {
        if ($this->diplomas->contains($diploma)) {
            $this->diplomas->removeElement($diploma);
            // set the owning side to null (unless already changed)
            if ($diploma->getUser() === $this) {
                $diploma->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
            $skill->setUser($this);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        if ($this->skills->contains($skill)) {
            $this->skills->removeElement($skill);
            // set the owning side to null (unless already changed)
            if ($skill->getUser() === $this) {
                $skill->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Technos[]
     */
    public function getTechnos(): Collection
    {
        return $this->technos;
    }

    public function addTechno(Technos $techno): self
    {
        if (!$this->technos->contains($techno)) {
            $this->technos[] = $techno;
            $techno->setUser($this);
        }

        return $this;
    }

    public function removeTechno(Technos $techno): self
    {
        if ($this->technos->contains($techno)) {
            $this->technos->removeElement($techno);
            // set the owning side to null (unless already changed)
            if ($techno->getUser() === $this) {
                $techno->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Language[]
     */
    public function getLanguages(): Collection
    {
        return $this->languages;
    }

    public function addLanguage(Language $language): self
    {
        if (!$this->languages->contains($language)) {
            $this->languages[] = $language;
            $language->setUser($this);
        }

        return $this;
    }

    public function removeLanguage(Language $language): self
    {
        if ($this->languages->contains($language)) {
            $this->languages->removeElement($language);
            // set the owning side to null (unless already changed)
            if ($language->getUser() === $this) {
                $language->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Loisir[]
     */
    public function getLoisirs(): Collection
    {
        return $this->loisirs;
    }

    public function addLoisir(Loisir $loisir): self
    {
        if (!$this->loisirs->contains($loisir)) {
            $this->loisirs[] = $loisir;
            $loisir->setUser($this);
        }

        return $this;
    }

    public function removeLoisir(Loisir $loisir): self
    {
        if ($this->loisirs->contains($loisir)) {
            $this->loisirs->removeElement($loisir);
            // set the owning side to null (unless already changed)
            if ($loisir->getUser() === $this) {
                $loisir->setUser(null);
            }
        }

        return $this;
    }
}
