<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220506075546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE diplome (id INT AUTO_INCREMENT NOT NULL, ville_id INT NOT NULL, univ_id INT NOT NULL, intitule_id INT NOT NULL, but_id INT NOT NULL, INDEX IDX_EB4C4D4EA73F0036 (ville_id), INDEX IDX_EB4C4D4E52B4B886 (univ_id), INDEX IDX_EB4C4D4E6729EDCE (intitule_id), INDEX IDX_EB4C4D4EB8914BA4 (but_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE diplome ADD CONSTRAINT FK_EB4C4D4EA73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE diplome ADD CONSTRAINT FK_EB4C4D4E52B4B886 FOREIGN KEY (univ_id) REFERENCES univ (id)');
        $this->addSql('ALTER TABLE diplome ADD CONSTRAINT FK_EB4C4D4E6729EDCE FOREIGN KEY (intitule_id) REFERENCES intitule (id)');
        $this->addSql('ALTER TABLE diplome ADD CONSTRAINT FK_EB4C4D4EB8914BA4 FOREIGN KEY (but_id) REFERENCES but (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE diplome');
    }
}
