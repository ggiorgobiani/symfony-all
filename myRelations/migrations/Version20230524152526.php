<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524152526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game ADD team_a_id INT NOT NULL, ADD team_b_id INT NOT NULL');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CEA3FA723 FOREIGN KEY (team_a_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CF88A08CD FOREIGN KEY (team_b_id) REFERENCES team (id)');
        $this->addSql('CREATE INDEX IDX_232B318CEA3FA723 ON game (team_a_id)');
        $this->addSql('CREATE INDEX IDX_232B318CF88A08CD ON game (team_b_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CEA3FA723');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CF88A08CD');
        $this->addSql('DROP INDEX IDX_232B318CEA3FA723 ON game');
        $this->addSql('DROP INDEX IDX_232B318CF88A08CD ON game');
        $this->addSql('ALTER TABLE game DROP team_a_id, DROP team_b_id');
    }
}
