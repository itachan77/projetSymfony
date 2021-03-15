<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201221215716 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE info_instrument (id INT AUTO_INCREMENT NOT NULL, eleve_id INT DEFAULT NULL, havemusic TINYINT(1) DEFAULT NULL, whathavemusic VARCHAR(255) DEFAULT NULL, doinstrument TINYINT(1) DEFAULT NULL, whatdoinstrument VARCHAR(255) DEFAULT NULL, haveinstrument TINYINT(1) DEFAULT NULL, whathaveinstrument VARCHAR(255) DEFAULT NULL, INDEX IDX_647A5571A6CC7B2 (eleve_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE info_instrument ADD CONSTRAINT FK_647A5571A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE info_instrument');
    }
}
