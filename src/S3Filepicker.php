<?php

namespace Kittyfinder\S3Filepicker;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class S3Filepicker extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 's3-filepicker';

    /**
     * Hydrate the given attribute on the model based on the incoming request.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @param string                                  $requestAttribute
     * @param object                                  $model
     * @param string                                  $attribute
     *
     * @return void
     */
    protected function fillAttributeFromRequest(
        NovaRequest $request,
        $requestAttribute,
        $model,
        $attribute
    ) {
        if ($request->exists($attribute)) {
            $model->{$attribute} = $request[$attribute];
        }
    }
}
