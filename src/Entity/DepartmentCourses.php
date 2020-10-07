<?php

namespace App\Entity;

use App\Repository\DepartmentCoursesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartmentCoursesRepository::class)
 */
class DepartmentCourses
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
     * @ORM\Column (type="integer", nullable=false)
     */
    private $courseId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Department", inversedBy="departmentCourses")
     */
    private $department;

    /**
     * @ORM\ManyToOne (targetEntity="App\Entity\Course", inversedBy="departmentCourses")
     */
    private $course;



    public function getId(): ?int
    {
        return $this->id;
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

    public function getCourseId(): ?int
    {
        return $this->courseId;
    }

    public function setCourseId(int $courseId): self
    {
        $this->courseId = $courseId;

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

    public function getCourse(): ?Course
    {
        return $this->course;
    }

    public function setCourse(?Course $course): self
    {
        $this->course = $course;

        return $this;
    }
}
