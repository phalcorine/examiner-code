<?php

namespace App\Entity;

use App\Repository\ExamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExamRepository::class)
 */
class Exam
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
     * @ORM\Column (type="integer", nullable=false)
     */
    private $departmentId;

    /**
     * @ORM\Column (type="integer", nullable=false)
     */
    private $courseId;

    /**
     * @ORM\Column (type="string", length=64, nullable=false)
     */
    private $title;

    /**
     * @ORM\Column (type="integer", nullable=false)
     */
    private $unitMark;

    /**
     * @ORM\Column (type="integer", nullable=false)
     */
    private $passPercentage;

    /**
     * @ORM\Column (type="boolean", nullable=false)
     */
    private $canRetakeIfFail;

    // Relationship Columns

    /**
     * @ORM\ManyToOne (targetEntity="App\Entity\Department", inversedBy="exams")
     */
    private $department;

    /**
     * @ORM\ManyToOne (targetEntity="App\Entity\Course", inversedBy="exams")
     */
    private $course;

    /**
     * @ORM\OneToMany (targetEntity="App\Entity\ExamQuestion", mappedBy="exam")
     */
    private $examQuestions;

    /**
     * @ORM\OneToMany (targetEntity="App\Entity\StudentExamReport", mappedBy="exam")
     */
    private $studentExamReports;

    public function __construct()
    {
        $this->examQuestions = new ArrayCollection();
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getUnitMark(): ?int
    {
        return $this->unitMark;
    }

    public function setUnitMark(int $unitMark): self
    {
        $this->unitMark = $unitMark;

        return $this;
    }

    public function getPassPercentage(): ?int
    {
        return $this->passPercentage;
    }

    public function setPassPercentage(int $passPercentage): self
    {
        $this->passPercentage = $passPercentage;

        return $this;
    }

    public function getCanRetakeIfFail(): ?bool
    {
        return $this->canRetakeIfFail;
    }

    public function setCanRetakeIfFail(bool $canRetakeIfFail): self
    {
        $this->canRetakeIfFail = $canRetakeIfFail;

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

    /**
     * @return Collection|ExamQuestion[]
     */
    public function getExamQuestions(): Collection
    {
        return $this->examQuestions;
    }

    public function addExamQuestion(ExamQuestion $examQuestion): self
    {
        if (!$this->examQuestions->contains($examQuestion)) {
            $this->examQuestions[] = $examQuestion;
            $examQuestion->setExam($this);
        }

        return $this;
    }

    public function removeExamQuestion(ExamQuestion $examQuestion): self
    {
        if ($this->examQuestions->contains($examQuestion)) {
            $this->examQuestions->removeElement($examQuestion);
            // set the owning side to null (unless already changed)
            if ($examQuestion->getExam() === $this) {
                $examQuestion->setExam(null);
            }
        }

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
            $studentExamReport->setExam($this);
        }

        return $this;
    }

    public function removeStudentExamReport(StudentExamReport $studentExamReport): self
    {
        if ($this->studentExamReports->contains($studentExamReport)) {
            $this->studentExamReports->removeElement($studentExamReport);
            // set the owning side to null (unless already changed)
            if ($studentExamReport->getExam() === $this) {
                $studentExamReport->setExam(null);
            }
        }

        return $this;
    }
}
