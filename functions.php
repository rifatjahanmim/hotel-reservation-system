<?php
    function formValidate($request, $rules)
    {
        $errors = [];

        foreach($rules as $key => $rule) {
            if ($rule == 'required' && $request[$key] == null) {
                $errors[$key] = ucfirst(str_replace('_', ' ',$key))." Field must be filled";
            }
        }
        
        return $errors;
    }

    function database_formatted_date($value)
    {
        $date = null; 
        
        if ($value) {
            $date = date('Y-m-d', strtotime($value));
        }

        return $date;
    }
?>