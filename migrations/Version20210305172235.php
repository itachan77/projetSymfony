<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210305172235 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE professeur_calendar (professeur_id INT NOT NULL, calendar_id INT NOT NULL, INDEX IDX_3A1C2A12BAB22EE9 (professeur_id), INDEX IDX_3A1C2A12A40A2C8 (calendar_id), PRIMARY KEY(professeur_id, calendar_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarif (id INT AUTO_INCREMENT NOT NULL, nb_1tarif DOUBLE PRECISION DEFAULT NULL, nb_2tarif DOUBLE PRECISION DEFAULT NULL, nb_3tarif DOUBLE PRECISION DEFAULT NULL, nb_4tarif DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE professeur_calendar ADD CONSTRAINT FK_3A1C2A12BAB22EE9 FOREIGN KEY (professeur_id) REFERENCES professeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE professeur_calendar ADD CONSTRAINT FK_3A1C2A12A40A2C8 FOREIGN KEY (calendar_id) REFERENCES calendar (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE professeur_calendar');
        $this->addSql('DROP TABLE tarif');
    }
}
