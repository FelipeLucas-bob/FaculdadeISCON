<?php

namespace App\Exceptions;

use Exception;

class ValidationException extends Exception
{
    private string $type;
    private string $route;
    private array|null $errorList;
    private array|null $valueList;
    // string $message = "", int $code = 0, \Throwable|null $previous = null
    public function __construct(string $message, string $type, string $route, array|null $valueList = null, array|null $errorList = null)
    {
        $this->code = 422;
        $this->message = $message;

        $this->type = $type;
        $this->route = $route;
        $this->errorList = $errorList;
        $this->valueList = $valueList;
    }

    public function render()
    {
        if (!in_array($this->type, ['danger', 'warning'])) {
            return redirect()
                ->to($this->route)
                ->with('danger', 'Tipo de erro inválido. Favor falar com a equipe de desenvolvimento');
        }
        $redirectObject = redirect()
            ->to($this->route)
            ->with($this->type, $this->message);

        if (!empty($this->errorList)) {
            $redirectObject->with('field-error-list', json_encode($this->errorList));
        }

        if (!empty($this->valueList)) {
            $redirectObject->with('field-value-list', json_encode($this->valueList));
        }

        return $redirectObject;
    }
}
