<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column (type="integer", nullable=false)
     */
    private $departmentId;

    /**
     * @ORM\Column (type="string", length=32, nullable=false)
     */
    private $code;

    /**
     * @ORM\Column (type="string", length=32, nullable=false)
     */
    private $firstName;

    /**
     * @ORM\Column (type="string", length=32, nullable=false)
     */
    private $lastName;

    /**
     * @ORM\Column (type="string", length=128, nullable=false)
     */
    private $loginUsername;

    /**
     * @ORM\Column (type="string", length=2048, nullable=false)
     */
    private $loginPasswordHash;

    // Relationship Columns

    /**
     * @ORM\ManyToOne (targetEntity="App\Entity\Department", inversedBy="students")
     */
    private $department;

    /**
     * @ORM\OneToMany (targetEntity="App\Entity\StudentExamReport", mappedBy="student")
     */
    private $studentExamReports;

    public function __construct()
    {
        $this->studentExamReports = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
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

    public function getLoginUsername(): ?string
    {
        return $this->loginUsername;
    }

    public function setLoginUsername(string $loginUsername): self
    {
        $this->loginUsername = $loginUsername;

        return $this;
    }

    public function getLoginPasswordHash(): ?string
    {
        return $this->loginPasswordHash;
    }

    public function setLoginPasswordHash(string $loginPasswordHash): self
    {
        $this->loginPasswordHash = $loginPasswordHash;

        return $this;
    }

    public function getDepartmentId(): ?int
    {
        return $this->departmentId;
    }

    public function setDepartmentId(int $departmentId): self
    {
        $this->departmentId = $departmentId;

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

        return $this;
    }

    /**
     * @return Collection|StudentExamReport[]
     */
    public function getStudentExamReports(): Collection
    {
        return $this->studentExamReports;
    }

    public function addStudentExamReport(StudentExamReport $studentExamReport): self
    {
        if (!$this->studentExamReports->contains($studentExamReport)) {
            $this->studentExamReports[] = $studentExamReport;
            $studentExamReport->setStudent($this);
        }

        return $this;
    }

    public function removeStudentExamReport(StudentExamReport $studentExamReport): self
    {
        if ($this->studentExamReports->contains($studentExamReport)) {
            $this->studentExamReports->removeElement($studentExamReport);
            // set the owning side to null (unless already changed)
            if ($studentExamReport->getStudent() === $this) {
                $studentExamReport->setStudent(null);
            }
        }

        return $this;
    }
}
