<div class="themestek-bmi-cal-wrapper themestek-hr themestek-bmi-calc-random-<?php echo esc_attr($random); ?>" data-themestek-random="<?php echo esc_attr($random); ?>">
	<div class="themestek-radio-box">
		<label class="themestek-checkcontainer">
			<input class="themestek-bmi-calc-type" type="radio" value="imperial" name="themestek-bmi-type-<?php echo esc_attr($random); ?>" checked="checked">
			<span class="themestek-radiobtn"></span>
			<?php esc_html_e('Imperial', 'liviza'); ?>
		</label>
		<label class="themestek-checkcontainer">
			<input class="themestek-bmi-calc-type" type="radio" value="metric" name="themestek-bmi-type-<?php echo esc_attr($random); ?>">
			<span class="themestek-radiobtn"></span>
			<?php esc_html_e('Metric', 'liviza'); ?>
		</label>
	</div>
	<div class="themestek-bmi-calc-imperial">
		<div class="row">
			<div class="col-lg-4 themestek-height">
				<div class="themestek-imp-box">
					<div class="input-box">
						<input type="number" name="themestek-feet-<?php echo esc_attr($random); ?>" class="themestek-input themestek-imperial-feet" placeholder="<?php esc_html_e('FT', 'liviza'); ?>">
					</div>
					<div class="input-box">
						<input type="number" name="themestek-inch-<?php echo esc_attr($random); ?>" class="themestek-input themestek-imperial-inch" placeholder="<?php esc_html_e('IN', 'liviza'); ?>">
					</div>
				</div>
				<label class="themestek-label"><?php esc_html_e('Height', 'liviza'); ?></label>
			</div>
			<div class="col-lg-5 themestek-weight">
				<div class="input-box">
					<input type="number" name="themestek-lbs-<?php echo esc_attr($random); ?>" value="" class="themestek-input themestek-imperial-lbs" placeholder="<?php esc_html_e('LBS', 'liviza'); ?>">
				</div>
				<label class="themestek-label"><?php esc_html_e('Weight', 'liviza'); ?></label>
			</div>
			<div class="col-lg-3">
				<div class="input-box">
					<button class="themestek-button"><?php esc_html_e('Calculate', 'liviza'); ?></button>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="themestek-bmi-result themestek-bmi-result-imperial themestek-alert-success themestek-hide"></div>
		</div>
	</div>
	<div class="themestek-bmi-calc-metric">
		<div class="row">
			<div class="col-lg-4 themestek-height">
				<div class="input-box">
					<input type="number" name="themestek-metric-cm-<?php echo esc_attr($random); ?>" value="" class="themestek-input themestek-metric-cm" placeholder="<?php esc_html_e('CM', 'liviza'); ?>">
				</div>
				<label class="themestek-label"><?php esc_html_e('Height', 'liviza'); ?></label>
			</div>
			<div class="col-lg-5 themestek-weight">
				<div class="input-box">
					<input type="number" name="themestek-metric-kg-<?php echo esc_attr($random); ?>" value="" class="themestek-input themestek-metric-kg" placeholder="<?php esc_html_e('KG', 'liviza'); ?>">
				</div>
				<label class="themestek-label"><?php esc_html_e('Weight', 'liviza'); ?></label>
			</div>
			<div class="col-lg-3">
				<div class="input-box">
					<button class="themestek-button"><?php esc_html_e('Calculate', 'liviza'); ?></button>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="themestek-bmi-result themestek-bmi-result-metric themestek-alert-success themestek-hide"></div>
		</div>
	</div>
</div>
