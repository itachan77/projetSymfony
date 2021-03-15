<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201212154203 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE connu_par DROP FOREIGN KEY FK_571B10A7A6CC7B2');
        $this->addSql('DROP INDEX IDX_571B10A7A6CC7B2 ON connu_par');
        $this->addSql('ALTER TABLE connu_par DROP eleve_id');
        $this->addSql('ALTER TABLE cpville DROP FOREIGN KEY FK_A9F1AA19A6CC7B2');
        $this->addSql('DROP INDEX IDX_A9F1AA19A6CC7B2 ON cpville');
        $this->addSql('ALTER TABLE cpville DROP eleve_id');
        $this->addSql('ALTER TABLE eleve ADD connupar_id INT DEFAULT NULL, ADD cpville_id INT DEFAULT NULL, ADD tuteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F79A8B2E12 FOREIGN KEY (connupar_id) REFERENCES connu_par (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7EBE4CB8F FOREIGN KEY (cpville_id) REFERENCES cpville (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F786EC68D8 FOREIGN KEY (tuteur_id) REFERENCES tuteur (id)');
        $this->addSql('CREATE INDEX IDX_ECA105F79A8B2E12 ON eleve (connupar_id)');
        $this->addSql('CREATE INDEX IDX_ECA105F7EBE4CB8F ON eleve (cpville_id)');
        $this->addSql('CREATE INDEX IDX_ECA105F786EC68D8 ON eleve (tuteur_id)');
        $this->addSql('ALTER TABLE tuteur DROP FOREIGN KEY FK_56412268A6CC7B2');
        $this->addSql('DROP INDEX IDX_56412268A6CC7B2 ON tuteur');
        $this->addSql('ALTER TABLE tuteur DROP eleve_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE connu_par ADD eleve_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE connu_par ADD CONSTRAINT FK_571B10A7A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
        $this->addSql('CREATE INDEX IDX_571B10A7A6CC7B2 ON connu_par (eleve_id)');
        $this->addSql('ALTER TABLE cpville ADD eleve_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cpville ADD CONSTRAINT FK_A9F1AA19A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
        $this->addSql('CREATE INDEX IDX_A9F1AA19A6CC7B2 ON cpville (eleve_id)');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F79A8B2E12');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7EBE4CB8F');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F786EC68D8');
        $this->addSql('DROP INDEX IDX_ECA105F79A8B2E12 ON eleve');
        $this->addSql('DROP INDEX IDX_ECA105F7EBE4CB8F ON eleve');
        $this->addSql('DROP INDEX IDX_ECA105F786EC68D8 ON eleve');
        $this->addSql('ALTER TABLE eleve DROP connupar_id, DROP cpville_id, DROP tuteur_id');
        $this->addSql('ALTER TABLE tuteur ADD eleve_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tuteur ADD CONSTRAINT FK_56412268A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
        $this->addSql('CREATE INDEX IDX_56412268A6CC7B2 ON tuteur (eleve_id)');
    }
}
