<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210226124244 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE store_open_days (store_id INT NOT NULL, open_days_id INT NOT NULL, INDEX IDX_F46D13EB092A811 (store_id), INDEX IDX_F46D13E5841366A (open_days_id), PRIMARY KEY(store_id, open_days_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE store_open_days ADD CONSTRAINT FK_F46D13EB092A811 FOREIGN KEY (store_id) REFERENCES store (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE store_open_days ADD CONSTRAINT FK_F46D13E5841366A FOREIGN KEY (open_days_id) REFERENCES open_days (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE open_days_store');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE open_days_store (open_days_id INT NOT NULL, store_id INT NOT NULL, INDEX IDX_2BD5ADCD5841366A (open_days_id), INDEX IDX_2BD5ADCDB092A811 (store_id), PRIMARY KEY(open_days_id, store_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE open_days_store ADD CONSTRAINT FK_2BD5ADCD5841366A FOREIGN KEY (open_days_id) REFERENCES open_days (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE open_days_store ADD CONSTRAINT FK_2BD5ADCDB092A811 FOREIGN KEY (store_id) REFERENCES store (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE store_open_days');
    }
}
