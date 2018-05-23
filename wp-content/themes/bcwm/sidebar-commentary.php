					<?php if ( is_active_sidebar( 'commentary' ) ) : ?>

						<?php dynamic_sidebar( 'commentary' ); ?>

					<?php else : ?>

						<?php
							/*
							 * This content shows up if there are no widgets defined in the backend.
							*/
						?>


					<?php endif; ?>
