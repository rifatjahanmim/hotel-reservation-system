<?php
    function formValidate($request, $rules)
    {
        $errors = [];

        foreach($rules as $key => $rule) {
            if ($rule == 'required' && $request[$key] == null) {
                $errors[$key] = ucfirst(str_replace('_', ' ',$key))." Field is required";
            }
        }
        
        return $errors;
    }
