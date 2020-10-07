<?php

namespace App\Entity;

use App\Repository\ExamQuestionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExamQuestionRepository::class)
 */
class ExamQuestion
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
    private $examId;

    /**
     * @ORM\Column (type="string", length=2048, nullable=false)
     */
    private $questionTitle;

    /**
     * @ORM\Column (type="string", length=512, nullable=false)
     */
    private $option1;

    /**
     * @ORM\Column (type="string", length=512, nullable=false)
     */
    private $option2;

    /**
     * @ORM\Column (type="string", length=512, nullable=false)
     */
    private $option3;

    /**
     * @ORM\Column (type="string", length=512, nullable=false)
     */
    private $option4;

    /**
     * @ORM\Column (type="integer", nullable=false)
     */
    private $correctOptionNumber;

    // Relationship Columns

    /**
     * @ORM\ManyToOne (targetEntity="App\Entity\Exam", inversedBy="examQuestions")
     */
    private $exam;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getQuestionTitle(): ?string
    {
        return $this->questionTitle;
    }

    public function setQuestionTitle(string $questionTitle): self
    {
        $this->questionTitle = $questionTitle;

        return $this;
    }

    public function getOption1(): ?string
    {
        return $this->option1;
    }

    public function setOption1(string $option1): self
    {
        $this->option1 = $option1;

        return $this;
    }

    public function getOption2(): ?string
    {
        return $this->option2;
    }

    public function setOption2(string $option2): self
    {
        $this->option2 = $option2;

        return $this;
    }

    public function getOption3(): ?string
    {
        return $this->option3;
    }

    public function setOption3(string $option3): self
    {
        $this->option3 = $option3;

        return $this;
    }

    public function getOption4(): ?string
    {
        return $this->option4;
    }

    public function setOption4(string $option4): self
    {
        $this->option4 = $option4;

        return $this;
    }

    public function getCorrectOptionNumber(): ?int
    {
        return $this->correctOptionNumber;
    }

    public function setCorrectOptionNumber(int $correctOptionNumber): self
    {
        $this->correctOptionNumber = $correctOptionNumber;

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
}
