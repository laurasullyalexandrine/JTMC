<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210211144506 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commercial_service (id INT AUTO_INCREMENT NOT NULL, relais_colis TINYINT(1) DEFAULT NULL, mondial_relais TINYINT(1) DEFAULT NULL, click_and_collect TINYINT(1) DEFAULT NULL, too_go_to_go TINYINT(1) DEFAULT NULL, delivery TINYINT(1) DEFAULT NULL, to_take_away TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE commercial_service');
    }
}
