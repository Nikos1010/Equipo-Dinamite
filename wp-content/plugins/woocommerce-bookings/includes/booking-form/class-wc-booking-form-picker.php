<?php
/**
 * Picker class
 */
abstract class WC_Booking_Form_Picker {

	protected $booking_form;
	protected $args = array();

	/**
	 * Get the label for the field based on booking durations and type
	 * @param  string $text text to insert into label string
	 * @return string
	 */
	protected function get_field_label( $text ) {
		// If the duration is > 1, dates and times are 'start' times and should thus have different labels
		if ( $this->booking_form->product->get_duration_type() === 'customer' && $this->booking_form->product->get_max_duration() > 1 && ! in_array( $this->booking_form->product->get_duration_unit(), array( 'hour', 'minute' ) ) ) {
			/* translators: 1: Text to insert into label string */
			$date_label = __( 'Start %s', 'woocommerce-bookings' );
		} else {
			$date_label = '%s';
		}

		return sprintf( $date_label, $text );
	}

	/**
	 * Get the min date in date picker format
	 * @return string
	 */
	protected function get_min_date() {
		$js_string = '';
		$min_date  = $this->booking_form->product->get_min_date();
		if ( $min_date['value'] ) {
			$unit = strtolower( substr( $min_date['unit'], 0, 1 ) );

			if ( in_array( $unit, array( 'd', 'w', 'y', 'm' ) ) ) {
				$js_string = "+{$min_date['value']}{$unit}";
			} elseif ( 'h' === $unit ) {

				// if less than 24 hours are entered, we determine if the time falls in today or tomorrow.
				// if more than 24 hours are entered, we determine how many days should be marked off
				if ( 24 > $min_date['value'] ) {
					$current_d = date( 'd', current_time( 'timestamp' ) );
					$min_d     = date( 'd', strtotime( "+{$min_date['value']} hour", current_time( 'timestamp' ) ) );
					$js_string = '+' . ( $current_d == $min_d ? 0 : 1 ) . 'd';
				} else {
					$min_d = (int) ( $min_date['value'] / 24 );
					$js_string = '+' . $min_d . 'd';
				}
			}
		}
		return $js_string;
	}

	/**
	 * Get the max date in date picker format
	 * @return string
	 */
	protected function get_max_date() {
		$js_string = '';
		$max_date  = $this->booking_form->product->get_max_date();
		$unit      = strtolower( substr( $max_date['unit'], 0, 1 ) );

		if ( in_array( $unit, array( 'd', 'w', 'y', 'm' ) ) ) {
			$js_string = "+{$max_date['value']}{$unit}";
		} elseif ( 'h' === $unit ) {
			$current_datetime = current_datetime();
			$max_datetime     = $current_datetime->add( new DateInterval( "PT{$max_date['value']}H" ) );

			if ( $max_datetime ) {
				// If dates are on same day, we only need to show that day.
				if ( $current_datetime->format( 'Y-m-d' ) === $max_datetime->format( 'Y-m-d' ) ) {
					$js_string = '+0d';
				} else {
					// Calculate difference between now and our max date.
					$max_day     = $max_datetime->format( 'd' );
					$current_day = $current_datetime->format( 'd' );

					if ( $max_day && $current_day ) {
						$days_between = (int) $max_day - (int) $current_day;

						// If we have a days, use that for our offset.
						if ( $days_between ) {
							$js_string = '+'. $days_between . 'd';
						}
					}
				}
			}
		}

		return $js_string;
	}

	/**
	 * Return args for the field
	 * @return array
	 */
	public function get_args() {
		return $this->args;
	}
}
