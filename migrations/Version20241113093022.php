<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241113093022 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE joue (personnages_id INT NOT NULL, film_id INT NOT NULL, INDEX IDX_59C45C027FFDACCA (personnages_id), INDEX IDX_59C45C02567F5183 (film_id), PRIMARY KEY(personnages_id, film_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE joue ADD CONSTRAINT FK_59C45C027FFDACCA FOREIGN KEY (personnages_id) REFERENCES personnages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joue ADD CONSTRAINT FK_59C45C02567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnages DROP films');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE joue DROP FOREIGN KEY FK_59C45C027FFDACCA');
        $this->addSql('ALTER TABLE joue DROP FOREIGN KEY FK_59C45C02567F5183');
        $this->addSql('DROP TABLE joue');
        $this->addSql('ALTER TABLE personnages ADD films VARCHAR(255) NOT NULL');
    }
}
