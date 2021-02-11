<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210211135709 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE store (id INT AUTO_INCREMENT NOT NULL, store_activity VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, siret INT NOT NULL, address VARCHAR(255) NOT NULL, road_number INT NOT NULL, posta_code INT NOT NULL, email VARCHAR(255) NOT NULL, phone INT NOT NULL, website VARCHAR(255) DEFAULT NULL, open_days LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', open_hours INT NOT NULL, description VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE store');
    }
}
