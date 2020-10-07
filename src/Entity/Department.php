<?php

namespace App\Entity;

use App\Repository\DepartmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartmentRepository::class)
 */
class Department
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column (type="string", length=32, nullable=false)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=64, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column (type="text", nullable=true)
     */
    private $description;

    // Relationship Columns

    /**
     * @ORM\OneToMany (targetEntity="App\Entity\DepartmentCourses", mappedBy="department")
     */
    private $departmentCourses;

    /**
     * @ORM\OneToMany (targetEntity="App\Entity\Exam", mappedBy="department")
     */
    private $exams;

    /**
     * @ORM\OneToMany (targetEntity="App\Entity\Student", mappedBy="department")
     */
    private $students;

    public function __construct()
    {
        $this->exams = new ArrayCollection();
        $this->students = new ArrayCollection();
        $this->departmentCourses = new ArrayCollection();
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Exam[]
     */
    public function getExams(): Collection
    {
        return $this->exams;
    }

    public function addExam(Exam $exam): self
    {
        if (!$this->exams->contains($exam)) {
            $this->exams[] = $exam;
            $exam->setDepartment($this);
        }

        return $this;
    }

    public function removeExam(Exam $exam): self
    {
        if ($this->exams->contains($exam)) {
            $this->exams->removeElement($exam);
            // set the owning side to null (unless already changed)
            if ($exam->getDepartment() === $this) {
                $exam->setDepartment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Student[]
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
            $student->setDepartment($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->students->contains($student)) {
            $this->students->removeElement($student);
            // set the owning side to null (unless already changed)
            if ($student->getDepartment() === $this) {
                $student->setDepartment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DepartmentCourses[]
     */
    public function getDepartmentCourses(): Collection
    {
        return $this->departmentCourses;
    }

    public function addDepartmentCourse(DepartmentCourses $departmentCourse): self
    {
        if (!$this->departmentCourses->contains($departmentCourse)) {
            $this->departmentCourses[] = $departmentCourse;
            $departmentCourse->setDepartment($this);
        }

        return $this;
    }

    public function removeDepartmentCourse(DepartmentCourses $departmentCourse): self
    {
        if ($this->departmentCourses->contains($departmentCourse)) {
            $this->departmentCourses->removeElement($departmentCourse);
            // set the owning side to null (unless already changed)
            if ($departmentCourse->getDepartment() === $this) {
                $departmentCourse->setDepartment(null);
            }
        }

        return $this;
    }
}
