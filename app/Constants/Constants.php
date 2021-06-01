<?php

namespace App\Constants;

abstract class Constants
{
	/**
	 * Abstract method for constants array
	 * 
	 * @return array
	 */
	abstract public static function labels(): array;

	/**
	 * Get the label value where index
	 * 
	 * @param  int $index index of labels
	 * @return string
	 */
	public static function label(int $index): string
	{
		return (string)static::labels()[$index];
	}

	/**
	 * Get key from label
	 *
	 * @param string $label
	 * @return integer|null
	 */
	public static function key(string $label): ?int
	{
		$arr = array_change_key_case(
			array_flip(static::labels()),
			CASE_LOWER
		);

		return array_key_exists(strtolower($label), $arr)
			? $arr[strtolower($label)]
			: null;
	}
}
