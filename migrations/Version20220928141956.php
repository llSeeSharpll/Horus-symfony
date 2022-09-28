<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220928141956 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE circle (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, tpye VARCHAR(255) NOT NULL, radius DOUBLE PRECISION NOT NULL, surface DOUBLE PRECISION NOT NULL, circumference DOUBLE PRECISION DEFAULT NULL)');
        $this->addSql('CREATE TABLE triangle (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, a DOUBLE PRECISION NOT NULL, b DOUBLE PRECISION NOT NULL, c DOUBLE PRECISION NOT NULL, type VARCHAR(255) NOT NULL, surface DOUBLE PRECISION DEFAULT NULL, circumference DOUBLE PRECISION DEFAULT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE circle');
        $this->addSql('DROP TABLE triangle');
    }
}
