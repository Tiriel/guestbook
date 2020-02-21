<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20200221104119 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql('ALTER TABLE conference ADD slug VARCHAR(255)');
        $this->addSql("UPDATE conference SET slug=CONCAT(LOWER(city), '-', year)");
        $this->addSql('ALTER TABLE conference ALTER COLUMN slug SET NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE conference DROP slug');
    }
}
