public function up(): void
{
    Schema::create('favorites', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->foreignId('test_id')->constrained('tests')->cascadeOnDelete();
        $table->timestamps();

        $table->unique(['user_id', 'test_id']);
    });
}

public function down(): void
{
    Schema::dropIfExists('favorites');
}
