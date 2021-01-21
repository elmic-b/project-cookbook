<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210119184048 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE IF NOT EXISTS recipe_heading_ing (recipe_id INT NOT NULL, heading_ing_id INT NOT NULL, INDEX IDX_8617EDAF59D8A214 (recipe_id), INDEX IDX_8617EDAFAEF1451E (heading_ing_id), PRIMARY KEY(recipe_id, heading_ing_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS recipe_ingridient (recipe_id INT NOT NULL, ingridient_id INT NOT NULL, INDEX IDX_55133E6859D8A214 (recipe_id), INDEX IDX_55133E68750B1398 (ingridient_id), PRIMARY KEY(recipe_id, ingridient_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS recipe_origin (recipe_id INT NOT NULL, origin_id INT NOT NULL, INDEX IDX_53EF483F59D8A214 (recipe_id), INDEX IDX_53EF483F56A273CC (origin_id), PRIMARY KEY(recipe_id, origin_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recipe_allergen ADD CONSTRAINT FK_532FAD5059D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_allergen ADD CONSTRAINT FK_532FAD506E775A4A FOREIGN KEY (allergen_id) REFERENCES allergen (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_heading_ing ADD CONSTRAINT FK_8617EDAF59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_heading_ing ADD CONSTRAINT FK_8617EDAFAEF1451E FOREIGN KEY (heading_ing_id) REFERENCES heading_ing (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_ingridient ADD CONSTRAINT FK_55133E6859D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_ingridient ADD CONSTRAINT FK_55133E68750B1398 FOREIGN KEY (ingridient_id) REFERENCES ingridient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_origin ADD CONSTRAINT FK_53EF483F59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_origin ADD CONSTRAINT FK_53EF483F56A273CC FOREIGN KEY (origin_id) REFERENCES origin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cooking ADD fk_recipe_id INT NOT NULL');
        $this->addSql('ALTER TABLE cooking ADD CONSTRAINT FK_467BE66A38817584 FOREIGN KEY (fk_recipe_id) REFERENCES recipe (id)');
        $this->addSql('CREATE INDEX IDX_467BE66A38817584 ON cooking (fk_recipe_id)');
        $this->addSql('ALTER TABLE recipe ADD fk_category_id INT NOT NULL, ADD fk_difficulty_id INT NOT NULL, ADD fk_nutrition_form_id INT NOT NULL, ADD fk_tip_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B1377BB031D6 FOREIGN KEY (fk_category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B13798B0E86C FOREIGN KEY (fk_difficulty_id) REFERENCES difficulty (id)');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B137686514D7 FOREIGN KEY (fk_nutrition_form_id) REFERENCES nutrition_form (id)');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B13767C22F66 FOREIGN KEY (fk_tip_id) REFERENCES tip (id)');
        $this->addSql('CREATE INDEX IDX_DA88B1377BB031D6 ON recipe (fk_category_id)');
        $this->addSql('CREATE INDEX IDX_DA88B13798B0E86C ON recipe (fk_difficulty_id)');
        $this->addSql('CREATE INDEX IDX_DA88B137686514D7 ON recipe (fk_nutrition_form_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DA88B13767C22F66 ON recipe (fk_tip_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE recipe_allergen');
        $this->addSql('DROP TABLE recipe_heading_ing');
        $this->addSql('DROP TABLE recipe_ingridient');
        $this->addSql('DROP TABLE recipe_origin');
        $this->addSql('ALTER TABLE cooking DROP FOREIGN KEY FK_467BE66A38817584');
        $this->addSql('DROP INDEX IDX_467BE66A38817584 ON cooking');
        $this->addSql('ALTER TABLE cooking DROP fk_recipe_id');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B1377BB031D6');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B13798B0E86C');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B137686514D7');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B13767C22F66');
        $this->addSql('DROP INDEX IDX_DA88B1377BB031D6 ON recipe');
        $this->addSql('DROP INDEX IDX_DA88B13798B0E86C ON recipe');
        $this->addSql('DROP INDEX IDX_DA88B137686514D7 ON recipe');
        $this->addSql('DROP INDEX UNIQ_DA88B13767C22F66 ON recipe');
        $this->addSql('ALTER TABLE recipe DROP fk_category_id, DROP fk_difficulty_id, DROP fk_nutrition_form_id, DROP fk_tip_id');
    }
}
