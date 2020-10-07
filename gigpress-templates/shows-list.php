<?php
/*
	STOP! DO NOT MODIFY THIS FILE!
	If you wish to customize the output, you can safely do so by COPYING this file into a new folder called 'gigpress-templates' in your 'wp-content' directory	and then making your changes there. When in place, that file will load in place of this one.
	
	This template displays all of our individual show data in the main shows listing (upcoming and past).

	If you're curious what all variables are available in the $showdata array, have a look at the docs: http://gigpress.com/docs/
*/
?>

<tbody>
	
	<tr class="gigpress-row <?php echo $class; ?>">
	
		<td class="gigpress-date"><?php echo $showdata['date']; ?> <?php echo $showdata['time']; ?>
			<?php if($showdata['end_date']) : ?> - <?php echo $showdata['end_date']; ?> <?php endif; ?>
		</td>

	<?php if((!$artist && $group_artists == 'no') && $total_artists > 1) : ?>
		<td class="gigpress-artist">
			<?php echo $showdata['artist']; ?>
		</td>
	<?php endif; ?>
		
		<td class="gigpress-venue"><?php echo $showdata['venue']; ?></td>
		
		<td class="gigpress-notes"><?php echo $showdata['notes']; ?></td>
	
	</tr>
	
</tbody>	
