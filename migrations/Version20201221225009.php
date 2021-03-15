<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201221225009 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve ADD info_i_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7A701A939 FOREIGN KEY (info_i_id) REFERENCES info_instrument (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ECA105F7A701A939 ON eleve (info_i_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7A701A939');
        $this->addSql('DROP INDEX UNIQ_ECA105F7A701A939 ON eleve');
        $this->addSql('ALTER TABLE eleve DROP info_i_id');
    }
}