<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       www.sven-hennig.de
 * @since      1.0.0
 *
 * @package    Bl_Tabelle
 * @subpackage Bl_Tabelle/public/partials
 */
    $json_file = @file_get_contents('https://www.openligadb.de/api/getbltable/bl1/' . $saison);
    $entries = json_decode($json_file, true);
    //var_dump($entries);
?>
<div class="bl-tabelle">
	<div class="bl-tabelle-heading">
		<span>#</span>
		<span>Mannschaft</span>
		<span>Pt.</span>
	</div>
	<div class="bl-tabelle-entries">
		<?php 
			$pos = 1;
			foreach ($entries as $entry) {
				?>
				<div class="bl-tabelle-entry">
					<span><?php echo $pos; ?></span>
					<div>
						<?php echo "<img src='" . $entry["TeamIconUrl"] . "'>"; ?>
						<span><?php echo $entry["ShortName"] ?></span>		
					</div>
					<span><?php echo $entry["Points"] ?></span>
				</div>
				<?php
				$pos++;
			}
		?>
	</div>
</div>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
