<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>asgn02 Inheritance</title>
    </head>
    <body>
    <h1>Inheritance Examples</h1>

    <?php 
        include 'Bird.php';

        // Display instance counts before using create() method
        echo '<p>Bird instance count before: ' . Bird::$instanceCount . '</p>';
        echo '<p>Yellow-bellied Flycatcher instance count before: ' . YellowBelliedFlyCatcher::$instanceCount . '</p>';
        echo '<p>Kiwi instance count before: ' . Kiwi::$instanceCount . '</p>';

        // Creating instances of Bird for Flycatcher and Kiwi using the create() method
        $flyCatcher = YellowBelliedFlyCatcher::create();
        $kiwi = Kiwi::create();

        // Display instance counts after using create() method
        echo '<p>Bird instance count after: ' . Bird::$instanceCount . '</p>';
        echo '<p>Yellow-bellied Flycatcher instance count after: ' . YellowBelliedFlyCatcher::$instanceCount . '</p>';
        echo '<p>Kiwi instance count after: ' . Kiwi::$instanceCount . '</p>';

        // Display the generic bird song using static method from Bird class
        echo '<p>The generic song of any bird is "' . Bird::getSong() . '".</p>';

        // Display the song of specific bird classes
        echo '<p>The song of the ' . $flyCatcher->name . ' on breeding grounds is "' . YellowBelliedFlyCatcher::getSong() . '".</p>';

        // Display whether they can fly or not
        echo "<p>The " . $flyCatcher->name . " " . $flyCatcher->canFly() . ".</p>";
        echo "<p>The " . $kiwi->name . " " . $kiwi->canFly() . ".</p>";    
    ?>
    </body>
</html>
