<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('media', function (Blueprint $table) {
            $table->dropMorphs('model');

            $table->string('model_type')->after('id');
            $table->string('model_id')->after('model_type');
            $table->index(['model_type','model_id']);

            /**
             * @var \Callmeaf\User\App\Repo\Contracts\UserRepoInterface $userRepo
             */
            $userRepo = app(\Callmeaf\User\App\Repo\Contracts\UserRepoInterface::class);
            $table->string('creator_identifier')->nullable()->after('model_id');
            $table->foreign('creator_identifier')->references($userRepo->getModel()->getRouteKeyName())->on($userRepo->getTable())->cascadeOnUpdate()->nullOnDelete();

            $table->softDeletes()->after('order_column');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('media',function (Blueprint $table) {
            if(Schema::hasColumn('media','deleted_at')) {
                $table->dropSoftDeletes();
            }
            if(Schema::hasColumn('media','creator_identifier')) {
                $table->dropForeign('media_creator_identifier_foreign');
                $table->dropColumn('creator_identifier');
            }
        });
    }
};
