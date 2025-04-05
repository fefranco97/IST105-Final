<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_items = [];

    foreach ($_POST as $key => $value) {
        if (is_numeric($value)) {
            $selected_items[] = escapeshellarg($value);
        }
    }

    if (empty($selected_items)) {
        echo "<p>No items selected.</p>";
        exit;
    }

    $command = "python3 party_planner.py " . implode(" ", $selected_items);
    $output = shell_exec($command);
    $response = json_decode($output, true);

    $host = gethostname();
    $host = gethostbyname($host);
    
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Party Results</title>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center px-4 py-10">
    <div class="bg-white rounded shadow-md p-8 max-w-xl w-full space-y-4">
        <?php
        $host = gethostname();
        $host = gethostbyname($host);
        
        echo "<p class='text-center text-slate-500 font-bold text-base'>Current IP: $host</p>";
      ?>
        <h1 class="text-2xl font-bold text-blue-600 text-center">🎉 Your Party Summary @ CCTB 🎉</h1>
        <?php if ($response && !isset($response['error'])): ?>
        <div class="space-y-2">
            <p><strong class="text-gray-700">Selected Items:</strong>
                <?= htmlspecialchars(implode(", ", $response['selected_items'])) ?></p>
            <p><strong class="text-gray-700">Item Values:</strong>
                <?= htmlspecialchars(implode(", ", $response['selected_values'])) ?></p>
            <p><strong class="text-gray-700">Base Party Code:</strong>
                <?= htmlspecialchars($response['base_code']) ?></p>
            <p><strong class="text-gray-700">Final Party Code:</strong>
                <?= htmlspecialchars($response['final_code']) ?></p>
            <p><strong class="text-gray-700">Message:</strong>
                <span class="italic text-green-600"><?= htmlspecialchars($response['message']) ?></span>
            </p>
        </div>
        <div class="pt-4 text-center">
            <a href="party_form.php"
                class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Plan Another Party
            </a>
        </div>
        <?php else: ?>
        <p class="text-red-600 font-bold">Error:
            <?= htmlspecialchars($response['error'] ?? 'Unknown error') ?>
        </p>
        <pre class="text-sm text-gray-500">Raw output:<br><?= htmlspecialchars($output) ?></pre>
        <?php endif; ?>
    </div>
</body>

</html>
<?php
} else {
    echo "<p>Invalid request.</p>";
}
?>