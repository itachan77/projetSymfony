<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210130210833 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7EBE4CB8F');
        $this->addSql('DROP INDEX UNIQ_ECA105F7EBE4CB8F ON eleve');
        $this->addSql('ALTER TABLE eleve ADD cpville VARCHAR(255) DEFAULT NULL, DROP cpville_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve ADD cpville_id INT DEFAULT NULL, DROP cpville');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7EBE4CB8F FOREIGN KEY (cpville_id) REFERENCES cpville (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ECA105F7EBE4CB8F ON eleve (cpville_id)');
    }
}
