<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012122156 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE specialitate DROP FOREIGN KEY specialitate_ibfk_1');
        $this->addSql('CREATE TABLE studenti (id INT AUTO_INCREMENT NOT NULL, specialitate_id INT NOT NULL, INDEX IDX_590B74C844E7ACCA (specialitate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, due_date DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_527EDB2512469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilizator (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE studenti ADD CONSTRAINT FK_590B74C844E7ACCA FOREIGN KEY (specialitate_id) REFERENCES specialitate (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB2512469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('DROP TABLE facultate');
        $this->addSql('ALTER TABLE category CHANGE name title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE specialitate MODIFY id_specialitate INT NOT NULL');
        $this->addSql('DROP INDEX id_facultate ON specialitate');
        $this->addSql('DROP INDEX `primary` ON specialitate');
        $this->addSql('ALTER TABLE specialitate ADD denumire LONGTEXT NOT NULL, DROP id_facultate, DROP denumire_specialitate, DROP durata_specialitate, CHANGE id_specialitate id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE specialitate ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE student MODIFY id_student INT NOT NULL');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY student_ibfk_1');
        $this->addSql('DROP INDEX id_specialitate ON student');
        $this->addSql('DROP INDEX `primary` ON student');
        $this->addSql('ALTER TABLE student ADD specialitate_id INT NOT NULL, ADD media_student DOUBLE PRECISION NOT NULL, ADD birth_date DATE NOT NULL, ADD grupa LONGTEXT NOT NULL, DROP id_specialitate, DROP prenume_student, DROP adresa_domiciliu, DROP nr_telefon, DROP email, DROP an_absolvire_liceu, DROP media_liceu, CHANGE nume_student nume_student VARCHAR(255) NOT NULL, CHANGE id_student id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF3344E7ACCA FOREIGN KEY (specialitate_id) REFERENCES specialitate (id)');
        $this->addSql('CREATE INDEX IDX_B723AF3344E7ACCA ON student (specialitate_id)');
        $this->addSql('ALTER TABLE student ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE facultate (id_facultate INT AUTO_INCREMENT NOT NULL, denumire_facultate CHAR(30) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, nr_telefon_secretar CHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id_facultate)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE studenti DROP FOREIGN KEY FK_590B74C844E7ACCA');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB2512469DE2');
        $this->addSql('DROP TABLE studenti');
        $this->addSql('DROP TABLE task');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE utilizator');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE category CHANGE title name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE specialitate MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON specialitate');
        $this->addSql('ALTER TABLE specialitate ADD id_facultate INT DEFAULT NULL, ADD denumire_specialitate CHAR(30) DEFAULT NULL, ADD durata_specialitate INT DEFAULT NULL, DROP denumire, CHANGE id id_specialitate INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE specialitate ADD CONSTRAINT specialitate_ibfk_1 FOREIGN KEY (id_facultate) REFERENCES facultate (id_facultate)');
        $this->addSql('CREATE INDEX id_facultate ON specialitate (id_facultate)');
        $this->addSql('ALTER TABLE specialitate ADD PRIMARY KEY (id_specialitate)');
        $this->addSql('ALTER TABLE student MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF3344E7ACCA');
        $this->addSql('DROP INDEX IDX_B723AF3344E7ACCA ON student');
        $this->addSql('DROP INDEX `PRIMARY` ON student');
        $this->addSql('ALTER TABLE student ADD id_specialitate INT DEFAULT NULL, ADD prenume_student CHAR(30) DEFAULT NULL, ADD adresa_domiciliu CHAR(30) DEFAULT NULL, ADD nr_telefon CHAR(15) DEFAULT NULL, ADD email CHAR(30) DEFAULT NULL, ADD an_absolvire_liceu DATE DEFAULT NULL, ADD media_liceu DOUBLE PRECISION DEFAULT NULL, DROP specialitate_id, DROP media_student, DROP birth_date, DROP grupa, CHANGE nume_student nume_student CHAR(30) DEFAULT NULL, CHANGE id id_student INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT student_ibfk_1 FOREIGN KEY (id_specialitate) REFERENCES specialitate (id_specialitate)');
        $this->addSql('CREATE INDEX id_specialitate ON student (id_specialitate)');
        $this->addSql('ALTER TABLE student ADD PRIMARY KEY (id_student)');
    }
}
