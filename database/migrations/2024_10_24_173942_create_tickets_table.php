    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateTicketsTable extends Migration
    {
        public function up()
        {
            Schema::create('tickets', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description');
                $table->string('attachment')->nullable();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->string('status')->default('Abierto');
                $table->string('urgency')->default('Normal');
                // tickets table migration
                $table->unsignedBigInteger('category_id');
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('tickets');
        }
    }
