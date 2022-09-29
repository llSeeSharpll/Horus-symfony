<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220929081533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__circle AS SELECT id, tpye, radius, surface, circumference FROM circle');
        $this->addSql('DROP TABLE circle');
        $this->addSql('CREATE TABLE circle (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, type VARCHAR(255) NOT NULL, radius DOUBLE PRECISION NOT NULL, surface DOUBLE PRECISION NOT NULL, circumference DOUBLE PRECISION DEFAULT NULL)');
        $this->addSql('INSERT INTO circle (id, type, radius, surface, circumference) SELECT id, tpye, radius, surface, circumference FROM __temp__circle');
        $this->addSql('DROP TABLE __temp__circle');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__circle AS SELECT id, type, radius, surface, circumference FROM circle');
        $this->addSql('DROP TABLE circle');
        $this->addSql('CREATE TABLE circle (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, tpye VARCHAR(255) NOT NULL, radius DOUBLE PRECISION NOT NULL, surface DOUBLE PRECISION NOT NULL, circumference DOUBLE PRECISION DEFAULT NULL)');
        $this->addSql('INSERT INTO circle (id, tpye, radius, surface, circumference) SELECT id, type, radius, surface, circumference FROM __temp__circle');
        $this->addSql('DROP TABLE __temp__circle');
    }
}
