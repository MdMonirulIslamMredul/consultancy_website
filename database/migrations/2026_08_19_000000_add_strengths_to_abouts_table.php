<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStrengthsToAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('abouts', function (Blueprint $table) {
            // Strength 1
            $table->string('strength_one_icon')->nullable()->after('description');
            $table->string('strength_one_title')->nullable()->after('strength_one_icon');
            $table->text('strength_one_details')->nullable()->after('strength_one_title');

            // Strength 2
            $table->string('strength_two_icon')->nullable()->after('strength_one_details');
            $table->string('strength_two_title')->nullable()->after('strength_two_icon');
            $table->text('strength_two_details')->nullable()->after('strength_two_title');

            // Strength 3
            $table->string('strength_three_icon')->nullable()->after('strength_two_details');
            $table->string('strength_three_title')->nullable()->after('strength_three_icon');
            $table->text('strength_three_details')->nullable()->after('strength_three_title');

            // Strength 4
            $table->string('strength_four_icon')->nullable()->after('strength_three_details');
            $table->string('strength_four_title')->nullable()->after('strength_four_icon');
            $table->text('strength_four_details')->nullable()->after('strength_four_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn([
                'strength_one_icon', 'strength_one_title', 'strength_one_details',
                'strength_two_icon', 'strength_two_title', 'strength_two_details',
                'strength_three_icon', 'strength_three_title', 'strength_three_details',
                'strength_four_icon', 'strength_four_title', 'strength_four_details',
            ]);
        });
    }
}
