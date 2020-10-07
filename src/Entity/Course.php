<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourseRepository::class)
 */
class Course
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
     * @ORM\Column (type="string", length=64, nullable=false)
     */
    private $title;

    /**
     * @ORM\Column (type="text", nullable=true)
     */
    private $description;

    // Relationship Columns

    /**
     * @ORM\OneToMany (targetEntity="App\Entity\DepartmentCourses", mappedBy="course")
     */
    private $departmentCourses;

    /**
     * @ORM\OneToMany (targetEntity="App\Entity\Exam", mappedBy="course")
     */
    private $exams;

    public function __construct()
    {
        $this->exams = new ArrayCollection();
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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
            $exam->setCourse($this);
        }

        return $this;
    }

    public function removeExam(Exam $exam): self
    {
        if ($this->exams->contains($exam)) {
            $this->exams->removeElement($exam);
            // set the owning side to null (unless already changed)
            if ($exam->getCourse() === $this) {
                $exam->setCourse(null);
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
            $departmentCourse->setCourse($this);
        }

        return $this;
    }

    public function removeDepartmentCourse(DepartmentCourses $departmentCourse): self
    {
        if ($this->departmentCourses->contains($departmentCourse)) {
            $this->departmentCourses->removeElement($departmentCourse);
            // set the owning side to null (unless already changed)
            if ($departmentCourse->getCourse() === $this) {
                $departmentCourse->setCourse(null);
            }
        }

        return $this;
    }
}
