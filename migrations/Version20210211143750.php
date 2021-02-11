<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210211143750 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE information_payment (id INT AUTO_INCREMENT NOT NULL, card_bank TINYINT(1) DEFAULT NULL, american_express TINYINT(1) DEFAULT NULL, cash TINYINT(1) NOT NULL, cheque TINYINT(1) DEFAULT NULL, gift_card TINYINT(1) DEFAULT NULL, luncheon_voucher TINYINT(1) DEFAULT NULL, ancv_vacation_chek TINYINT(1) DEFAULT NULL, table_check TINYINT(1) DEFAULT NULL, restaurant_voucher_sodexo TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE informationpayment');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE informationpayment (id INT AUTO_INCREMENT NOT NULL, card_bank TINYINT(1) DEFAULT NULL, american_express TINYINT(1) DEFAULT NULL, cash TINYINT(1) NOT NULL, cheque TINYINT(1) DEFAULT NULL, gift_card TINYINT(1) DEFAULT NULL, luncheon_voucher TINYINT(1) DEFAULT NULL, ancv_vacation_check TINYINT(1) DEFAULT NULL, table_check TINYINT(1) DEFAULT NULL, restaurant_vaucher_sodexo TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE information_payment');
    }
}
