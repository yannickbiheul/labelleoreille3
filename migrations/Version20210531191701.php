<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531191701 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE audio DROP FOREIGN KEY FK_187D36959E45C554');
        $this->addSql('DROP INDEX IDX_187D36959E45C554 ON audio');
        $this->addSql('ALTER TABLE audio DROP prestation_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE audio ADD prestation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE audio ADD CONSTRAINT FK_187D36959E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id)');
        $this->addSql('CREATE INDEX IDX_187D36959E45C554 ON audio (prestation_id)');
    }
}
