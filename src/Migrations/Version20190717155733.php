<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190717155733 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE loisir (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, INDEX IDX_CF3B2060A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(80) NOT NULL, INDEX IDX_5E3DE477A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technos (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, logo VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_9452D61AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(70) NOT NULL, last_name VARCHAR(70) NOT NULL, birthday DATE NOT NULL, adress VARCHAR(255) NOT NULL, city VARCHAR(60) NOT NULL, country VARCHAR(50) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(60) NOT NULL, cv VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, github_account VARCHAR(255) NOT NULL, linkedin_account VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, company VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, type VARCHAR(30) NOT NULL, place VARCHAR(255) NOT NULL, date_start DATE NOT NULL, date_end DATE DEFAULT NULL, INDEX IDX_590C103A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, level INT NOT NULL, INDEX IDX_D4DB71B5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diploma (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, school VARCHAR(255) NOT NULL, date_start DATE NOT NULL, date_end DATE DEFAULT NULL, niveau VARCHAR(80) NOT NULL, INDEX IDX_EC218957A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, github_link VARCHAR(255) NOT NULL, date_start DATE NOT NULL, date_end DATE DEFAULT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_2FB3D0EEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_technos (project_id INT NOT NULL, technos_id INT NOT NULL, INDEX IDX_24CDA7F166D1F9C (project_id), INDEX IDX_24CDA7F25F7B143 (technos_id), PRIMARY KEY(project_id, technos_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE loisir ADD CONSTRAINT FK_CF3B2060A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE477A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE technos ADD CONSTRAINT FK_9452D61AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE language ADD CONSTRAINT FK_D4DB71B5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE diploma ADD CONSTRAINT FK_EC218957A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE project_technos ADD CONSTRAINT FK_24CDA7F166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_technos ADD CONSTRAINT FK_24CDA7F25F7B143 FOREIGN KEY (technos_id) REFERENCES technos (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE project_technos DROP FOREIGN KEY FK_24CDA7F25F7B143');
        $this->addSql('ALTER TABLE loisir DROP FOREIGN KEY FK_CF3B2060A76ED395');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE477A76ED395');
        $this->addSql('ALTER TABLE technos DROP FOREIGN KEY FK_9452D61AA76ED395');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103A76ED395');
        $this->addSql('ALTER TABLE language DROP FOREIGN KEY FK_D4DB71B5A76ED395');
        $this->addSql('ALTER TABLE diploma DROP FOREIGN KEY FK_EC218957A76ED395');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EEA76ED395');
        $this->addSql('ALTER TABLE project_technos DROP FOREIGN KEY FK_24CDA7F166D1F9C');
        $this->addSql('DROP TABLE loisir');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE technos');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE diploma');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE project_technos');
    }
}
