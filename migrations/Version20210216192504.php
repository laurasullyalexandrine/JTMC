<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210216192504 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commercial_service (id INT AUTO_INCREMENT NOT NULL, servicetypes LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information_payment (id INT AUTO_INCREMENT NOT NULL, payment_types LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, store_activity VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, siret INT NOT NULL, address VARCHAR(255) NOT NULL, road_number INT NOT NULL, postal_code INT NOT NULL, email VARCHAR(255) NOT NULL, phone INT NOT NULL, website VARCHAR(255) DEFAULT NULL, open_days LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', open_hours INT NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_FF575877A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store_information_payment (store_id INT NOT NULL, information_payment_id INT NOT NULL, INDEX IDX_18B22A32B092A811 (store_id), INDEX IDX_18B22A327CBCDB2 (information_payment_id), PRIMARY KEY(store_id, information_payment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store_commercial_service (store_id INT NOT NULL, commercial_service_id INT NOT NULL, INDEX IDX_F5B197B1B092A811 (store_id), INDEX IDX_F5B197B1F7871AEE (commercial_service_id), PRIMARY KEY(store_id, commercial_service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE store ADD CONSTRAINT FK_FF575877A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE store_information_payment ADD CONSTRAINT FK_18B22A32B092A811 FOREIGN KEY (store_id) REFERENCES store (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE store_information_payment ADD CONSTRAINT FK_18B22A327CBCDB2 FOREIGN KEY (information_payment_id) REFERENCES information_payment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE store_commercial_service ADD CONSTRAINT FK_F5B197B1B092A811 FOREIGN KEY (store_id) REFERENCES store (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE store_commercial_service ADD CONSTRAINT FK_F5B197B1F7871AEE FOREIGN KEY (commercial_service_id) REFERENCES commercial_service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE store_commercial_service DROP FOREIGN KEY FK_F5B197B1F7871AEE');
        $this->addSql('ALTER TABLE store_information_payment DROP FOREIGN KEY FK_18B22A327CBCDB2');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE store_information_payment DROP FOREIGN KEY FK_18B22A32B092A811');
        $this->addSql('ALTER TABLE store_commercial_service DROP FOREIGN KEY FK_F5B197B1B092A811');
        $this->addSql('ALTER TABLE store DROP FOREIGN KEY FK_FF575877A76ED395');
        $this->addSql('DROP TABLE commercial_service');
        $this->addSql('DROP TABLE information_payment');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE store');
        $this->addSql('DROP TABLE store_information_payment');
        $this->addSql('DROP TABLE store_commercial_service');
        $this->addSql('DROP TABLE user');
    }
}