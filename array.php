<?php

/**
 * Sort a multidimensional array by the given key in the given order
 *
 * @author Maxime Culea
 *
 * @param $array : array to be sorted
 * @param $key   : key for array sorting
 * @param $order : default "asc" | "desc"
 *
 * @return array
 */
function mc_mu_array_sort_by_key( $array, $key, $order = 'asc' ) {
	//Check our variables
	if( empty( $array ) || empty( $key ) ) {
		return array();
	}

	uasort( $array,
		//Custom anonymous functions for sorting
		function ( $a, $b ) use ( $key, $order ) {

			//Case : empty values and egal values
			if ( ! isset( $a[ $key ] ) || ! isset( $b[ $key ] ) || strtolower( $a[ $key ] ) === strtolower( $b[ $key ] ) ) {
				return 0;
			}

			//Case : different values depending on the order
			switch ( $order ) {
				case 'asc':
					return strtolower( $a[ $key ] ) < strtolower( $b[ $key ] ) ? - 1 : 1;
				case 'desc':
					return strtolower( $a[ $key ] ) < strtolower( $b[ $key ] ) ? 1 : - 1;
				default :
					return 0;
			}
		}
	);

	return $array;
}