<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Final Felipe Camargo</title>
</head>

<body class="bg-gray-100 flex flex-col items-center min-h-screen space-y-4">
    <header class="bg-blue-500 text-white w-full py-4 text-center">
        <h1 class="text-2xl font-bold">CCTB Digital Party Planner</h1>
    </header>
    <form action="party_process.php" method="post"
        class="bg-white shadow-md rounded px-12 pt-6 pb-12 mb-4  w-full max-w-lg space-y-4">
        <h1 class="text-center text-xl">Select the items for your party:</h1>
        <?php
        $host = gethostname();
        $host = gethostbyname($host);
        
        echo "<p class='text-center text-slate-500 font-bold text-base mb-8'>Current IP: $host</p>";
      ?>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <label for="cake">
                <input class="cursor-pointer" type="checkbox" name="cake" id="cake" value="0" />
                Cake
            </label>
            <label for="balloons">
                <input class="cursor-pointer" type="checkbox" name="balloons" id="balloons" value="1" />
                Balloons
            </label>

            <label for="music_system">
                <input class="cursor-pointer" type="checkbox" name="music_system" id="music_system" value="2" />
                Music System
            </label>

            <label for="lights">
                <input class="cursor-pointer" type="checkbox" name="lights" id="lights" value="3" />
                Lights
            </label>
            <label for="catering_service">
                <input class="cursor-pointer" type="checkbox" name="catering_service" id="catering_service" value="4" />
                Catering Service
            </label>
            <label for="dj">
                <input class="cursor-pointer" type="checkbox" name="dj" id="dj" value="5" />
                DJ
            </label>
            <label for="photo_booth">
                <input class="cursor-pointer" type="checkbox" name="photo_booth" id="photo_booth" value="6" />
                Photo Booth
            </label>
            <label for="tables">
                <input class="cursor-pointer" type="checkbox" name="tables" id="tables" value="7" />
                Tables
            </label>
            <label for="chairs">
                <input class="cursor-pointer" type="checkbox" name="chairs" id="chairs" value="8" />
                Chairs
            </label>
            <label for="drinks">
                <input class="cursor-pointer" type="checkbox" name="drinks" id="drinks" value="9" />
                Drinks
            </label>
            <label for="party_hats">
                <input class="cursor-pointer" type="checkbox" name="party_hats" id="party_hats" value="10" />
                Party Hats
            </label>
            <label for="streamers">
                <input class="cursor-pointer" type="checkbox" name="streamers" id="streamers" value="11" />
                Streamers
            </label>
            <label for="invitation_cards">
                <input class="cursor-pointer" type="checkbox" name="invitation_cards" id="invitation_cards"
                    value="12" />
                Invitation Cards
            </label>
            <label for="party_games">
                <input class="cursor-pointer" type="checkbox" name="party_games" id="party_games" value="13" />
                Party Games
            </label>
            <label for="cleaning_service">
                <input class="cursor-pointer" type="checkbox" name="cleaning_service" id="cleaning_service"
                    value="14" />
                Cleaning Service
            </label>
        </div>
        <button type="submit" class="cursor-pointer w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
            Calculate
        </button>
    </form>
</body>

</html>