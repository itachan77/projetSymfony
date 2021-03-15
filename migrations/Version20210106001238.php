<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210106001238 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve DROP INDEX IDX_ECA105F7F7173861, ADD UNIQUE INDEX UNIQ_ECA105F7F7173861 (nom_connu_par_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve DROP INDEX UNIQ_ECA105F7F7173861, ADD INDEX IDX_ECA105F7F7173861 (nom_connu_par_id)');
    }
}
