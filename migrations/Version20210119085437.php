<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210119085437 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE allergen CHANGE allergen_id allergen_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE category CHANGE category_id category_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE cooking DROP FOREIGN KEY fk_cooking_rec');
        $this->addSql('ALTER TABLE cooking CHANGE cooking_id cooking_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE cooking ADD CONSTRAINT FK_467BE66AFA26D9A7 FOREIGN KEY (fk_recipe) REFERENCES recipe (recipe_id)');
        $this->addSql('ALTER TABLE difficulty CHANGE difficulty_id difficulty_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE heading_ing CHANGE heading_ing_id heading_ing_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE ingridient CHANGE ingridient_id ingridient_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE nutrition_form CHANGE nutrition_form_id nutrition_form_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE origin CHANGE origin_id origin_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY fk_category');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY fk_difficulty');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY fk_nutrition_form');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY fk_tip');
        $this->addSql('ALTER TABLE recipe CHANGE recipe_id recipe_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B13734645A1F FOREIGN KEY (fk_category) REFERENCES category (category_id)');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B1374B05A57C FOREIGN KEY (fk_difficulty) REFERENCES difficulty (difficulty_id)');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B137CBCFA35 FOREIGN KEY (fk_nutrition_form) REFERENCES nutrition_form (nutrition_form_id)');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B137A5217512 FOREIGN KEY (fk_tip) REFERENCES tip (tip_id)');
        $this->addSql('ALTER TABLE recipe_allergen DROP FOREIGN KEY fk_allergen_rec');
        $this->addSql('ALTER TABLE recipe_allergen DROP FOREIGN KEY fk_recipe_all');
        $this->addSql('ALTER TABLE recipe_allergen CHANGE rec_all_id rec_all_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE recipe_allergen ADD CONSTRAINT FK_532FAD50B86B7F72 FOREIGN KEY (fk_allergen_rec) REFERENCES allergen (allergen_id)');
        $this->addSql('ALTER TABLE recipe_allergen ADD CONSTRAINT FK_532FAD50BA21DF02 FOREIGN KEY (fk_recipe_all) REFERENCES recipe (recipe_id)');
        $this->addSql('ALTER TABLE recipe_heading DROP FOREIGN KEY fk_heading_rec');
        $this->addSql('ALTER TABLE recipe_heading DROP FOREIGN KEY fk_recipe_hea');
        $this->addSql('ALTER TABLE recipe_heading CHANGE rec_hea_id rec_hea_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE recipe_heading ADD CONSTRAINT FK_4E503181CFF95EBC FOREIGN KEY (fk_heading_rec) REFERENCES heading_ing (heading_ing_id)');
        $this->addSql('ALTER TABLE recipe_heading ADD CONSTRAINT FK_4E5031811A832379 FOREIGN KEY (fk_recipe_hea) REFERENCES recipe (recipe_id)');
        $this->addSql('ALTER TABLE recipe_ingridient DROP FOREIGN KEY fk_ingridient_rec');
        $this->addSql('ALTER TABLE recipe_ingridient DROP FOREIGN KEY fk_recipe_ing');
        $this->addSql('ALTER TABLE recipe_ingridient CHANGE rec_ing_id rec_ing_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE recipe_ingridient ADD CONSTRAINT FK_55133E68847E5B33 FOREIGN KEY (fk_ingridient_rec) REFERENCES ingridient (ingridient_id)');
        $this->addSql('ALTER TABLE recipe_ingridient ADD CONSTRAINT FK_55133E6811D635B0 FOREIGN KEY (fk_recipe_ing) REFERENCES recipe (recipe_id)');
        $this->addSql('ALTER TABLE recipe_origin DROP FOREIGN KEY fk_origin_rec');
        $this->addSql('ALTER TABLE recipe_origin DROP FOREIGN KEY fk_recipe_ori');
        $this->addSql('ALTER TABLE recipe_origin CHANGE rec_ori_id rec_ori_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE recipe_origin ADD CONSTRAINT FK_53EF483F6D3B44C4 FOREIGN KEY (fk_origin_rec) REFERENCES origin (origin_id)');
        $this->addSql('ALTER TABLE recipe_origin ADD CONSTRAINT FK_53EF483F14943958 FOREIGN KEY (fk_recipe_ori) REFERENCES recipe (recipe_id)');
        $this->addSql('ALTER TABLE saved DROP FOREIGN KEY fk_recipe_user');
        $this->addSql('ALTER TABLE saved DROP FOREIGN KEY fk_user_recipe');
        $this->addSql('ALTER TABLE saved CHANGE saved_id saved_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE saved ADD CONSTRAINT FK_F9E3D3259B7E20A2 FOREIGN KEY (fk_recipe_user) REFERENCES recipe (recipe_id)');
        $this->addSql('ALTER TABLE saved ADD CONSTRAINT FK_F9E3D325D62C063E FOREIGN KEY (fk_user_recipe) REFERENCES user (user_id)');
        $this->addSql('ALTER TABLE tip CHANGE tip_id tip_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE user_id user_id INT AUTO_INCREMENT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE allergen CHANGE allergen_id allergen_id INT NOT NULL');
        $this->addSql('ALTER TABLE category CHANGE category_id category_id INT NOT NULL');
        $this->addSql('ALTER TABLE cooking DROP FOREIGN KEY FK_467BE66AFA26D9A7');
        $this->addSql('ALTER TABLE cooking CHANGE cooking_id cooking_id INT NOT NULL');
        $this->addSql('ALTER TABLE cooking ADD CONSTRAINT fk_cooking_rec FOREIGN KEY (fk_recipe) REFERENCES recipe (recipe_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE difficulty CHANGE difficulty_id difficulty_id INT NOT NULL');
        $this->addSql('ALTER TABLE heading_ing CHANGE heading_ing_id heading_ing_id INT NOT NULL');
        $this->addSql('ALTER TABLE ingridient CHANGE ingridient_id ingridient_id INT NOT NULL');
        $this->addSql('ALTER TABLE nutrition_form CHANGE nutrition_form_id nutrition_form_id INT NOT NULL');
        $this->addSql('ALTER TABLE origin CHANGE origin_id origin_id INT NOT NULL');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B13734645A1F');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B1374B05A57C');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B137CBCFA35');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B137A5217512');
        $this->addSql('ALTER TABLE recipe CHANGE recipe_id recipe_id INT NOT NULL');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT fk_category FOREIGN KEY (fk_category) REFERENCES category (category_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT fk_difficulty FOREIGN KEY (fk_difficulty) REFERENCES difficulty (difficulty_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT fk_nutrition_form FOREIGN KEY (fk_nutrition_form) REFERENCES nutrition_form (nutrition_form_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT fk_tip FOREIGN KEY (fk_tip) REFERENCES tip (tip_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_allergen DROP FOREIGN KEY FK_532FAD50B86B7F72');
        $this->addSql('ALTER TABLE recipe_allergen DROP FOREIGN KEY FK_532FAD50BA21DF02');
        $this->addSql('ALTER TABLE recipe_allergen CHANGE rec_all_id rec_all_id INT NOT NULL');
        $this->addSql('ALTER TABLE recipe_allergen ADD CONSTRAINT fk_allergen_rec FOREIGN KEY (fk_allergen_rec) REFERENCES allergen (allergen_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_allergen ADD CONSTRAINT fk_recipe_all FOREIGN KEY (fk_recipe_all) REFERENCES recipe (recipe_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_heading DROP FOREIGN KEY FK_4E503181CFF95EBC');
        $this->addSql('ALTER TABLE recipe_heading DROP FOREIGN KEY FK_4E5031811A832379');
        $this->addSql('ALTER TABLE recipe_heading CHANGE rec_hea_id rec_hea_id INT NOT NULL');
        $this->addSql('ALTER TABLE recipe_heading ADD CONSTRAINT fk_heading_rec FOREIGN KEY (fk_heading_rec) REFERENCES heading_ing (heading_ing_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_heading ADD CONSTRAINT fk_recipe_hea FOREIGN KEY (fk_recipe_hea) REFERENCES recipe (recipe_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_ingridient DROP FOREIGN KEY FK_55133E68847E5B33');
        $this->addSql('ALTER TABLE recipe_ingridient DROP FOREIGN KEY FK_55133E6811D635B0');
        $this->addSql('ALTER TABLE recipe_ingridient CHANGE rec_ing_id rec_ing_id INT NOT NULL');
        $this->addSql('ALTER TABLE recipe_ingridient ADD CONSTRAINT fk_ingridient_rec FOREIGN KEY (fk_ingridient_rec) REFERENCES ingridient (ingridient_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_ingridient ADD CONSTRAINT fk_recipe_ing FOREIGN KEY (fk_recipe_ing) REFERENCES recipe (recipe_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_origin DROP FOREIGN KEY FK_53EF483F6D3B44C4');
        $this->addSql('ALTER TABLE recipe_origin DROP FOREIGN KEY FK_53EF483F14943958');
        $this->addSql('ALTER TABLE recipe_origin CHANGE rec_ori_id rec_ori_id INT NOT NULL');
        $this->addSql('ALTER TABLE recipe_origin ADD CONSTRAINT fk_origin_rec FOREIGN KEY (fk_origin_rec) REFERENCES origin (origin_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_origin ADD CONSTRAINT fk_recipe_ori FOREIGN KEY (fk_recipe_ori) REFERENCES recipe (recipe_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE saved DROP FOREIGN KEY FK_F9E3D3259B7E20A2');
        $this->addSql('ALTER TABLE saved DROP FOREIGN KEY FK_F9E3D325D62C063E');
        $this->addSql('ALTER TABLE saved CHANGE saved_id saved_id INT NOT NULL');
        $this->addSql('ALTER TABLE saved ADD CONSTRAINT fk_recipe_user FOREIGN KEY (fk_recipe_user) REFERENCES recipe (recipe_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE saved ADD CONSTRAINT fk_user_recipe FOREIGN KEY (fk_user_recipe) REFERENCES user (user_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tip CHANGE tip_id tip_id INT NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE user_id user_id INT NOT NULL');
    }
}
