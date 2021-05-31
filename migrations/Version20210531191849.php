<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531191849 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prestation_audio (prestation_id INT NOT NULL, audio_id INT NOT NULL, INDEX IDX_DAF67D149E45C554 (prestation_id), INDEX IDX_DAF67D143A3123C7 (audio_id), PRIMARY KEY(prestation_id, audio_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prestation_audio ADD CONSTRAINT FK_DAF67D149E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestation_audio ADD CONSTRAINT FK_DAF67D143A3123C7 FOREIGN KEY (audio_id) REFERENCES audio (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE prestation_audio');
    }
}
