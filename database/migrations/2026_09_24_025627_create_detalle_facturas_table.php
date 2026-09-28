$table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
$table->date('fecha');
$table->decimal('total', 10, 2);
