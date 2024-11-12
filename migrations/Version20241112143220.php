<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241112143220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film DROP Nom, DROP Durée, DROP Description, DROP Note_generale, DROP Studio_a_film');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film ADD Nom VARCHAR(255) NOT NULL, ADD Durée VARCHAR(50) DEFAULT NULL, ADD Description TEXT DEFAULT NULL, ADD Note_generale NUMERIC(3, 1) DEFAULT NULL, ADD Studio_a_film VARCHAR(255) DEFAULT NULL');
    }
}
