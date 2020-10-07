<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201004165647 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exam ADD CONSTRAINT FK_38BBA6C6AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE exam ADD CONSTRAINT FK_38BBA6C6591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('CREATE INDEX IDX_38BBA6C6AE80F5DF ON exam (department_id)');
        $this->addSql('CREATE INDEX IDX_38BBA6C6591CC992 ON exam (course_id)');
        $this->addSql('ALTER TABLE exam_question ADD CONSTRAINT FK_F593067D578D5E91 FOREIGN KEY (exam_id) REFERENCES exam (id)');
        $this->addSql('CREATE INDEX IDX_F593067D578D5E91 ON exam_question (exam_id)');
        $this->addSql('ALTER TABLE student ADD department_id INT NOT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('CREATE INDEX IDX_B723AF33AE80F5DF ON student (department_id)');
        $this->addSql('ALTER TABLE student_exam_report ADD CONSTRAINT FK_D8FC2C0D578D5E91 FOREIGN KEY (exam_id) REFERENCES exam (id)');
        $this->addSql('ALTER TABLE student_exam_report ADD CONSTRAINT FK_D8FC2C0DCB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('CREATE INDEX IDX_D8FC2C0D578D5E91 ON student_exam_report (exam_id)');
        $this->addSql('CREATE INDEX IDX_D8FC2C0DCB944F1A ON student_exam_report (student_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exam DROP FOREIGN KEY FK_38BBA6C6AE80F5DF');
        $this->addSql('ALTER TABLE exam DROP FOREIGN KEY FK_38BBA6C6591CC992');
        $this->addSql('DROP INDEX IDX_38BBA6C6AE80F5DF ON exam');
        $this->addSql('DROP INDEX IDX_38BBA6C6591CC992 ON exam');
        $this->addSql('ALTER TABLE exam_question DROP FOREIGN KEY FK_F593067D578D5E91');
        $this->addSql('DROP INDEX IDX_F593067D578D5E91 ON exam_question');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33AE80F5DF');
        $this->addSql('DROP INDEX IDX_B723AF33AE80F5DF ON student');
        $this->addSql('ALTER TABLE student DROP department_id');
        $this->addSql('ALTER TABLE student_exam_report DROP FOREIGN KEY FK_D8FC2C0D578D5E91');
        $this->addSql('ALTER TABLE student_exam_report DROP FOREIGN KEY FK_D8FC2C0DCB944F1A');
        $this->addSql('DROP INDEX IDX_D8FC2C0D578D5E91 ON student_exam_report');
        $this->addSql('DROP INDEX IDX_D8FC2C0DCB944F1A ON student_exam_report');
    }
}
