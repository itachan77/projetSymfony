<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201221224620 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info_instrument DROP FOREIGN KEY FK_647A5571A6CC7B2');
        $this->addSql('DROP INDEX IDX_647A5571A6CC7B2 ON info_instrument');
        $this->addSql('ALTER TABLE info_instrument DROP eleve_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info_instrument ADD eleve_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE info_instrument ADD CONSTRAINT FK_647A5571A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
        $this->addSql('CREATE INDEX IDX_647A5571A6CC7B2 ON info_instrument (eleve_id)');
    }
}
