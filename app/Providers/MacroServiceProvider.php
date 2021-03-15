<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::macro('whereLike', function ($attributes, string $searchTerm) {
            $this->where(function (Builder $query) use ($attributes, $searchTerm) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->when(
                        Str::contains($attribute, '.'),
                        function (Builder $query) use ($attribute, $searchTerm) {
                            if (count(explode('.', $attribute)) > 2) :

                                [$relationName_1, $relationName_2, $relationAttribute_1] = explode('.', $attribute);

                                $query->orWhereHas($relationName_1 . '.' . $relationName_2, function (Builder $query) use ($relationAttribute_1, $searchTerm) {
                                    $query->where($relationAttribute_1, 'LIKE', "%{$searchTerm}%");
                                });
                            else :
                                [$relationName, $relationAttribute] = explode('.', $attribute);

                                $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $searchTerm) {
                                    $query->where($relationAttribute, 'LIKE', "%{$searchTerm}%");
                                });
                            endif;
                        },
                        function (Builder $query) use ($attribute, $searchTerm) {
                            $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                        }
                    );
                }
            });

            return $this;
        });
    }
}
