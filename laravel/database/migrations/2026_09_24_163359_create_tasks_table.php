public function up(): void
{
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->string('task_name');
        $table->text('description')->nullable();
        $table->string('status')->default('Pending');
        $table->date('due_date')->nullable();
        $table->timestamps();
    });
}