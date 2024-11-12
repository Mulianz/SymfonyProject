<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241112152413 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE film_old (id_film VARCHAR(50) NOT NULL, PRIMARY KEY(id_film)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE film ADD id INT AUTO_INCREMENT NOT NULL, ADD nom VARCHAR(255) NOT NULL, ADD duree VARCHAR(255) NOT NULL, ADD description LONGTEXT NOT NULL, ADD note_generale DOUBLE PRECISION NOT NULL, ADD studio_film VARCHAR(255) NOT NULL, DROP id_film, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE film_old');
        $this->addSql('ALTER TABLE film MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON film');
        $this->addSql('ALTER TABLE film ADD id_film VARCHAR(50) NOT NULL, DROP id, DROP nom, DROP duree, DROP description, DROP note_generale, DROP studio_film');
        $this->addSql('ALTER TABLE film ADD PRIMARY KEY (id_film)');
    }
}
