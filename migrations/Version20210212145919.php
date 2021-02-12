<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210212145919 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commercial_service ADD servicetypes LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', DROP relais_colis, DROP mondial_relais, DROP click_and_collect, DROP too_good_to_go, DROP delivery, DROP to_take_away');
        $this->addSql('ALTER TABLE information_payment ADD payment_types LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', DROP card_bank, DROP american_express, DROP cash, DROP cheque, DROP gift_card, DROP luncheon_voucher, DROP ancv_vacation_check, DROP table_check, DROP restaurant_voucher_sodexo');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commercial_service ADD relais_colis TINYINT(1) DEFAULT NULL, ADD mondial_relais TINYINT(1) DEFAULT NULL, ADD click_and_collect TINYINT(1) DEFAULT NULL, ADD too_good_to_go TINYINT(1) DEFAULT NULL, ADD delivery TINYINT(1) DEFAULT NULL, ADD to_take_away TINYINT(1) DEFAULT NULL, DROP servicetypes');
        $this->addSql('ALTER TABLE information_payment ADD card_bank TINYINT(1) DEFAULT NULL, ADD american_express TINYINT(1) DEFAULT NULL, ADD cash TINYINT(1) NOT NULL, ADD cheque TINYINT(1) DEFAULT NULL, ADD gift_card TINYINT(1) DEFAULT NULL, ADD luncheon_voucher TINYINT(1) DEFAULT NULL, ADD ancv_vacation_check TINYINT(1) DEFAULT NULL, ADD table_check TINYINT(1) DEFAULT NULL, ADD restaurant_voucher_sodexo TINYINT(1) DEFAULT NULL, DROP payment_types');
    }
}
