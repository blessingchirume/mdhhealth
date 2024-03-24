<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCalculateTotalAndInsertTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER calculate_total_and_insert AFTER INSERT ON treatment_plans
            FOR EACH ROW
            BEGIN
                DECLARE total DECIMAL(10, 2);
                SET total = NEW.dosage * NEW.frequency * NEW.duration;
                INSERT INTO episode_items (item_id, episode_id, quantity, created_at, updated_at)
                VALUES (NEW.item_id, NEW.episode_id, total, NOW(), NOW());
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS calculate_total_and_insert');
    }
}
