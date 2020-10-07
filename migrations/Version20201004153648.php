<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201004153648 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin_user (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(32) NOT NULL, login_username VARCHAR(128) NOT NULL, login_password_hash VARCHAR(2048) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(32) NOT NULL, title VARCHAR(64) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE department (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(32) NOT NULL, name VARCHAR(64) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(32) NOT NULL, department_id INT NOT NULL, course_id INT NOT NULL, title VARCHAR(64) NOT NULL, unit_mark INT NOT NULL, pass_percentage INT NOT NULL, can_retake_if_fail TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_question (id INT AUTO_INCREMENT NOT NULL, exam_id INT NOT NULL, question_title VARCHAR(2048) NOT NULL, option1 VARCHAR(512) NOT NULL, option2 VARCHAR(512) NOT NULL, option3 VARCHAR(512) NOT NULL, option4 VARCHAR(512) NOT NULL, correct_option_number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(32) NOT NULL, first_name VARCHAR(32) NOT NULL, last_name VARCHAR(32) NOT NULL, login_username VARCHAR(128) NOT NULL, login_password_hash VARCHAR(2048) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_exam_report (id INT AUTO_INCREMENT NOT NULL, student_id INT NOT NULL, exam_id INT NOT NULL, total_questions_in_exam SMALLINT NOT NULL, total_questions_answered SMALLINT NOT NULL, total_correct_answers SMALLINT NOT NULL, remark SMALLINT NOT NULL, date_attempted DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE admin_user');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE exam');
        $this->addSql('DROP TABLE exam_question');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE student_exam_report');
    }
}
