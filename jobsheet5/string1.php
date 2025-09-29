<?php

$loremIpsum = "Lorem ipsum dolor sit amet consectetur adipisicing elit.
                voluptatem reprehenderit nobis veritatis commodi fugiat molestias 
                impedit unde ipzum voluptatum, corrupti minus sit excepturi nostrum 
                quisquam? Quos impedit eum nulla optio.";
echo "<p>{$loremIpsum}</p>";
echo "Panjang karakter: ". strlen($loremIpsum) . "<br>";
echo "Panjang kata: " . str_word_count($loremIpsum) . "<br>";
echo "<p>" . strtoupper($loremIpsum) . "<p>";
echo "<p>" . strtolower($loremIpsum) . "<p>";

?>