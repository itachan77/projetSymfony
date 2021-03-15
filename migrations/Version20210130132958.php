<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210130132958 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX departments_code_index ON departments');
        $this->addSql('DROP INDEX departments_region_code_foreign ON departments');
        $this->addSql('ALTER TABLE departments CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE region_code region_code VARCHAR(3) DEFAULT NULL, CHANGE code code VARCHAR(3) DEFAULT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE slug slug VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7EBE4CB8F');
        $this->addSql('DROP INDEX IDX_ECA105F7EBE4CB8F ON eleve');
        $this->addSql('ALTER TABLE eleve DROP cpville_id');
        $this->addSql('DROP INDEX regions_code_unique ON regions');
        $this->addSql('ALTER TABLE regions CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE code code VARCHAR(3) DEFAULT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE slug slug VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE departments CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE region_code region_code VARCHAR(3) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code code VARCHAR(3) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE INDEX departments_code_index ON departments (code)');
        $this->addSql('CREATE INDEX departments_region_code_foreign ON departments (region_code)');
        $this->addSql('ALTER TABLE eleve ADD cpville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7EBE4CB8F FOREIGN KEY (cpville_id) REFERENCES cpville (id)');
        $this->addSql('CREATE INDEX IDX_ECA105F7EBE4CB8F ON eleve (cpville_id)');
        $this->addSql('ALTER TABLE regions CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE code code VARCHAR(3) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE UNIQUE INDEX regions_code_unique ON regions (code)');
    }
}
