<?php

namespace App\Entity;

use App\Repository\StudentExamReportRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentExamReportRepository::class)
 */
class StudentExamReport
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
    private $studentId;

    /**
     * @ORM\Column (type="integer", nullable=false)
     */
    private $examId;

    /**
     * @ORM\Column (type="smallint", nullable=false)
     */
    private $totalQuestionsInExam;

    /**
     * @ORM\Column (type="smallint", nullable=false)
     */
    private $totalQuestionsAnswered;

    /**
     * @ORM\Column (type="smallint", nullable=false)
     */
    private $totalCorrectAnswers;

    /**
     * @ORM\Column (type="smallint", nullable=false)
     */
    private $remark;

    /**
     * @ORM\Column (type="datetime", nullable=false)
     */
    private $dateAttempted;

    // Relationship Columns

    /**
     * @ORM\ManyToOne (targetEntity="App\Entity\Exam", inversedBy="studentExamReports")
     */
    private $exam;

    /**
     * @ORM\ManyToOne (targetEntity="App\Entity\Student", inversedBy="studentExamReports")
     */
    private $student;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStudentId(): ?int
    {
        return $this->studentId;
    }

    public function setStudentId(int $studentId): self
    {
        $this->studentId = $studentId;

        return $this;
    }

    public function getExamId(): ?int
    {
        return $this->examId;
    }

    public function setExamId(int $examId): self
    {
        $this->examId = $examId;

        return $this;
    }

    public function getTotalQuestionsInExam(): ?int
    {
        return $this->totalQuestionsInExam;
    }

    public function setTotalQuestionsInExam(int $totalQuestionsInExam): self
    {
        $this->totalQuestionsInExam = $totalQuestionsInExam;

        return $this;
    }

    public function getTotalQuestionsAnswered(): ?int
    {
        return $this->totalQuestionsAnswered;
    }

    public function setTotalQuestionsAnswered(int $totalQuestionsAnswered): self
    {
        $this->totalQuestionsAnswered = $totalQuestionsAnswered;

        return $this;
    }

    public function getTotalCorrectAnswers(): ?int
    {
        return $this->totalCorrectAnswers;
    }

    public function setTotalCorrectAnswers(int $totalCorrectAnswers): self
    {
        $this->totalCorrectAnswers = $totalCorrectAnswers;

        return $this;
    }

    public function getRemark(): ?int
    {
        return $this->remark;
    }

    public function setRemark(int $remark): self
    {
        $this->remark = $remark;

        return $this;
    }

    public function getDateAttempted(): ?\DateTimeInterface
    {
        return $this->dateAttempted;
    }

    public function setDateAttempted(\DateTimeInterface $dateAttempted): self
    {
        $this->dateAttempted = $dateAttempted;

        return $this;
    }

    public function getExam(): ?Exam
    {
        return $this->exam;
    }

    public function setExam(?Exam $exam): self
    {
        $this->exam = $exam;

        return $this;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): self
    {
        $this->student = $student;

        return $this;
    }
}
