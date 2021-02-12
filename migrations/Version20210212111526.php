<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210212111526 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE store_information_payment (store_id INT NOT NULL, information_payment_id INT NOT NULL, INDEX IDX_18B22A32B092A811 (store_id), INDEX IDX_18B22A327CBCDB2 (information_payment_id), PRIMARY KEY(store_id, information_payment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store_commercial_service (store_id INT NOT NULL, commercial_service_id INT NOT NULL, INDEX IDX_F5B197B1B092A811 (store_id), INDEX IDX_F5B197B1F7871AEE (commercial_service_id), PRIMARY KEY(store_id, commercial_service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE store_information_payment ADD CONSTRAINT FK_18B22A32B092A811 FOREIGN KEY (store_id) REFERENCES store (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE store_information_payment ADD CONSTRAINT FK_18B22A327CBCDB2 FOREIGN KEY (information_payment_id) REFERENCES information_payment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE store_commercial_service ADD CONSTRAINT FK_F5B197B1B092A811 FOREIGN KEY (store_id) REFERENCES store (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE store_commercial_service ADD CONSTRAINT FK_F5B197B1F7871AEE FOREIGN KEY (commercial_service_id) REFERENCES commercial_service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE store ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE store ADD CONSTRAINT FK_FF575877A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_FF575877A76ED395 ON store (user_id)');
        $this->addSql('ALTER TABLE user ADD role_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649D60322AC ON user (role_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE store_information_payment');
        $this->addSql('DROP TABLE store_commercial_service');
        $this->addSql('ALTER TABLE store DROP FOREIGN KEY FK_FF575877A76ED395');
        $this->addSql('DROP INDEX IDX_FF575877A76ED395 ON store');
        $this->addSql('ALTER TABLE store DROP user_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('DROP INDEX IDX_8D93D649D60322AC ON user');
        $this->addSql('ALTER TABLE user DROP role_id');
    }
}
