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
	 * @param  int    $index index of labels
	 * @return string
	 */
	public static function label(int $index): string
	{
        return (string)static::labels()[$int];
	}
}