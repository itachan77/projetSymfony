<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210206113037 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE concert_gp (id INT AUTO_INCREMENT NOT NULL, titre_concert_gp VARCHAR(255) DEFAULT NULL, logo_concert_gp VARCHAR(255) DEFAULT NULL, com_concert_gp LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE concert_ind (id INT AUTO_INCREMENT NOT NULL, titre_concert_ind VARCHAR(255) DEFAULT NULL, logo_concert_ind VARCHAR(255) DEFAULT NULL, com_concert_ind LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE concert_prof (id INT AUTO_INCREMENT NOT NULL, titre_concert_prof VARCHAR(255) DEFAULT NULL, logo_concert_prof VARCHAR(255) DEFAULT NULL, com_concert_prof LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE img_ci (id INT AUTO_INCREMENT NOT NULL, concert_ind_id INT DEFAULT NULL, nom_img_ci VARCHAR(255) DEFAULT NULL, des_img_ci VARCHAR(255) DEFAULT NULL, INDEX IDX_44340B6230705AEA (concert_ind_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE img_gp (id INT AUTO_INCREMENT NOT NULL, concert_gp_id INT DEFAULT NULL, nom_img_gp VARCHAR(255) DEFAULT NULL, des_img_gp VARCHAR(255) DEFAULT NULL, INDEX IDX_443366A61AAA0AD9 (concert_gp_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE img_prof (id INT AUTO_INCREMENT NOT NULL, concert_prof_id INT DEFAULT NULL, nom_img_prof VARCHAR(255) DEFAULT NULL, des_img_prof VARCHAR(255) DEFAULT NULL, INDEX IDX_95AB818331DB4B58 (concert_prof_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spectacle (id INT AUTO_INCREMENT NOT NULL, titre_spectacle VARCHAR(255) DEFAULT NULL, logo_spectacle VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE img_ci ADD CONSTRAINT FK_44340B6230705AEA FOREIGN KEY (concert_ind_id) REFERENCES concert_ind (id)');
        $this->addSql('ALTER TABLE img_gp ADD CONSTRAINT FK_443366A61AAA0AD9 FOREIGN KEY (concert_gp_id) REFERENCES concert_gp (id)');
        $this->addSql('ALTER TABLE img_prof ADD CONSTRAINT FK_95AB818331DB4B58 FOREIGN KEY (concert_prof_id) REFERENCES concert_prof (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE img_gp DROP FOREIGN KEY FK_443366A61AAA0AD9');
        $this->addSql('ALTER TABLE img_ci DROP FOREIGN KEY FK_44340B6230705AEA');
        $this->addSql('ALTER TABLE img_prof DROP FOREIGN KEY FK_95AB818331DB4B58');
        $this->addSql('DROP TABLE concert_gp');
        $this->addSql('DROP TABLE concert_ind');
        $this->addSql('DROP TABLE concert_prof');
        $this->addSql('DROP TABLE img_ci');
        $this->addSql('DROP TABLE img_gp');
        $this->addSql('DROP TABLE img_prof');
        $this->addSql('DROP TABLE spectacle');
    }
}
