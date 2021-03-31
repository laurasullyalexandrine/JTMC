<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210226143810 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commercial_service (id INT AUTO_INCREMENT NOT NULL, service_types VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information_payment (id INT AUTO_INCREMENT NOT NULL, payment_types VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE open_days (id INT AUTO_INCREMENT NOT NULL, days VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, store_activity VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, siret INT NOT NULL, road_number INT NOT NULL, address VARCHAR(255) NOT NULL, postal_code INT NOT NULL, city VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone INT NOT NULL, website VARCHAR(255) DEFAULT NULL, open_hours VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, latitude NUMERIC(10, 8) DEFAULT NULL, longitude NUMERIC(10, 8) DEFAULT NULL, INDEX IDX_FF575877A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store_open_days (store_id INT NOT NULL, open_days_id INT NOT NULL, INDEX IDX_F46D13EB092A811 (store_id), INDEX IDX_F46D13E5841366A (open_days_id), PRIMARY KEY(store_id, open_days_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store_information_payment (store_id INT NOT NULL, information_payment_id INT NOT NULL, INDEX IDX_18B22A32B092A811 (store_id), INDEX IDX_18B22A327CBCDB2 (information_payment_id), PRIMARY KEY(store_id, information_payment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store_commercial_service (store_id INT NOT NULL, commercial_service_id INT NOT NULL, INDEX IDX_F5B197B1B092A811 (store_id), INDEX IDX_F5B197B1F7871AEE (commercial_service_id), PRIMARY KEY(store_id, commercial_service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE store ADD CONSTRAINT FK_FF575877A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE store_open_days ADD CONSTRAINT FK_F46D13EB092A811 FOREIGN KEY (store_id) REFERENCES store (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE store_open_days ADD CONSTRAINT FK_F46D13E5841366A FOREIGN KEY (open_days_id) REFERENCES open_days (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE store_information_payment ADD CONSTRAINT FK_18B22A32B092A811 FOREIGN KEY (store_id) REFERENCES store (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE store_information_payment ADD CONSTRAINT FK_18B22A327CBCDB2 FOREIGN KEY (information_payment_id) REFERENCES information_payment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE store_commercial_service ADD CONSTRAINT FK_F5B197B1B092A811 FOREIGN KEY (store_id) REFERENCES store (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE store_commercial_service ADD CONSTRAINT FK_F5B197B1F7871AEE FOREIGN KEY (commercial_service_id) REFERENCES commercial_service (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE store_commercial_service DROP FOREIGN KEY FK_F5B197B1F7871AEE');
        $this->addSql('ALTER TABLE store_information_payment DROP FOREIGN KEY FK_18B22A327CBCDB2');
        $this->addSql('ALTER TABLE store_open_days DROP FOREIGN KEY FK_F46D13E5841366A');
        $this->addSql('ALTER TABLE store_open_days DROP FOREIGN KEY FK_F46D13EB092A811');
        $this->addSql('ALTER TABLE store_information_payment DROP FOREIGN KEY FK_18B22A32B092A811');
        $this->addSql('ALTER TABLE store_commercial_service DROP FOREIGN KEY FK_F5B197B1B092A811');
        $this->addSql('ALTER TABLE store DROP FOREIGN KEY FK_FF575877A76ED395');
        $this->addSql('DROP TABLE commercial_service');
        $this->addSql('DROP TABLE information_payment');
        $this->addSql('DROP TABLE open_days');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE store');
        $this->addSql('DROP TABLE store_open_days');
        $this->addSql('DROP TABLE store_information_payment');
        $this->addSql('DROP TABLE store_commercial_service');
        $this->addSql('DROP TABLE user');
    }
}
