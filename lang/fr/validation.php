<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

        "accepted" => "Le champ :attribute doit être accepté.",
        "accepted_if" => "Le champ :attribute doit être accepté lorsque :other est :value.",
        "active_url" => "Le champ :attribute doit être une URL valide.",
        "after" => "Le champ :attribute doit être une date postérieure à :date.",
        "after_or_equal" => "Le champ :attribute doit être une date postérieure ou égale à :date.",
        "alpha" => "Le champ :attribute ne doit contenir que des lettres.",
        "alpha_dash" => "Le champ :attribute ne doit contenir que des lettres, chiffres, tirets et underscores.",
        "alpha_num" => "Le champ :attribute ne doit contenir que des lettres et des chiffres.",
        "array" => "Le champ :attribute doit être un tableau.",
        "ascii" => "Le champ :attribute ne doit contenir que des caractères ASCII simples.",
        "before" => "Le champ :attribute doit être une date antérieure à :date.",
        "before_or_equal" => "Le champ :attribute doit être une date antérieure ou égale à :date.",
        "between" => [
            "array" => "Le champ :attribute doit contenir entre :min et :max éléments.",
            "file" => "Le champ :attribute doit être entre :min et :max kilo-octets.",
            "numeric" => "Le champ :attribute doit être entre :min et :max.",
            "string" => "Le champ :attribute doit contenir entre :min et :max caractères.",
        ],
        "boolean" => "Le champ :attribute doit être vrai ou faux.",
        "can" => "Le champ :attribute contient une valeur non autorisée.",
        "confirmed" => "La confirmation du champ :attribute ne correspond pas.",
        "contains" => "Le champ :attribute doit contenir une valeur requise.",
        "current_password" => "Le mot de passe est incorrect.",
        "date" => "Le champ :attribute doit être une date valide.",
        "date_equals" => "Le champ :attribute doit être une date égale à :date.",
        "date_format" => "Le champ :attribute doit correspondre au format :format.",
        "decimal" => "Le champ :attribute doit avoir :decimal décimales.",
        "declined" => "Le champ :attribute doit être refusé.",
        "declined_if" => "Le champ :attribute doit être refusé lorsque :other est :value.",
        "different" => "Les champs :attribute et :other doivent être différents.",
        "digits" => "Le champ :attribute doit contenir :digits chiffres.",
        "digits_between" => "Le champ :attribute doit contenir entre :min et :max chiffres.",
        "dimensions" => "Le champ :attribute a des dimensions d'image non valides.",
        "distinct" => "Le champ :attribute a une valeur en double.",
        "doesnt_end_with" => "Le champ :attribute ne doit pas se terminer par :values.",
        "doesnt_start_with" => "Le champ :attribute ne doit pas commencer par :values.",
        "email" => "Le champ :attribute doit être une adresse e-mail valide.",
        "ends_with" => "Le champ :attribute doit se terminer par :values.",
        "enum" => "Le champ :attribute sélectionné est invalide.",
        "exists" => "Le champ :attribute sélectionné est invalide.",
        "extensions" => "Le champ :attribute doit avoir une des extensions suivantes : :values.",
        "file" => "Le champ :attribute doit être un fichier.",
        "filled" => "Le champ :attribute doit avoir une valeur.",
        "gt" => [
            "array" => "Le champ :attribute doit avoir plus de :value éléments.",
            "file" => "Le champ :attribute doit être supérieur à :value kilo-octets.",
            "numeric" => "Le champ :attribute doit être supérieur à :value.",
            "string" => "Le champ :attribute doit contenir plus de :value caractères.",
        ],
        "gte" => [
            "array" => "Le champ :attribute doit contenir au moins :value éléments.",
            "file" => "Le champ :attribute doit être supérieur ou égal à :value kilo-octets.",
            "numeric" => "Le champ :attribute doit être supérieur ou égal à :value.",
            "string" => "Le champ :attribute doit contenir au moins :value caractères.",
        ],
        "hex_color" => "Le champ :attribute doit être une couleur hexadécimale valide.",
        "image" => "Le champ :attribute doit être une image.",
        "in" => "Le champ :attribute sélectionné est invalide.",
        "in_array" => "Le champ :attribute doit exister dans :other.",
        "integer" => "Le champ :attribute doit être un entier.",
        "ip" => "Le champ :attribute doit être une adresse IP valide.",
        "ipv4" => "Le champ :attribute doit être une adresse IPv4 valide.",
        "ipv6" => "Le champ :attribute doit être une adresse IPv6 valide.",
        "json" => "Le champ :attribute doit être une chaîne JSON valide.",
        "lowercase" => "Le champ :attribute doit être en minuscules.",
        "lt" => [
            "array" => "Le champ :attribute doit contenir moins de :value éléments.",
            "file" => "Le champ :attribute doit être inférieur à :value kilo-octets.",
            "numeric" => "Le champ :attribute doit être inférieur à :value.",
            "string" => "Le champ :attribute doit contenir moins de :value caractères.",
        ],
        "lte" => [
            "array" => "Le champ :attribute ne doit pas contenir plus de :value éléments.",
            "file" => "Le champ :attribute doit être inférieur ou égal à :value kilo-octets.",
            "numeric" => "Le champ :attribute doit être inférieur ou égal à :value.",
            "string" => "Le champ :attribute doit contenir au maximum :value caractères.",
        ],
        "max" => [
            "array" => "Le champ :attribute ne doit pas contenir plus de :max éléments.",
            "file" => "Le champ :attribute ne doit pas dépasser :max kilo-octets.",
            "numeric" => "Le champ :attribute ne doit pas dépasser :max.",
            "string" => "Le champ :attribute ne doit pas dépasser :max caractères.",
        ],
        "mimes" => "Le champ :attribute doit être un fichier de type : :values.",
        "min" => [
            "array" => "Le champ :attribute doit contenir au moins :min éléments.",
            "file" => "Le champ :attribute doit faire au moins :min kilo-octets.",
            "numeric" => "Le champ :attribute doit être supérieur ou égal à :min.",
            "string" => "Le champ :attribute doit contenir au moins :min caractères.",
        ],
        "unique" => ":attribute a déjà été utilisé.",
        "uploaded" => "Le fichier :attribute n'a pas pu être téléchargé.",
    
    

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
