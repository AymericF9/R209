<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220414080325 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note ADD etat_note_id INT NOT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14213237D0 FOREIGN KEY (etat_note_id) REFERENCES etat_note (id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14213237D0 ON note (etat_note_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14213237D0');
        $this->addSql('DROP INDEX IDX_CFBDFA14213237D0 ON note');
        $this->addSql('ALTER TABLE note DROP etat_note_id');
    }
}
