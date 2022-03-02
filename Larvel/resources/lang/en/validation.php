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

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute must not be greater than :max.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'string' => 'The :attribute must not be greater than :max characters.',
        'array' => 'The :attribute must not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    // 'required' => 'د پروګرام د :attribute ساحه باید خالي نه وي.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

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
        'password' => [
            'required' => ' پاسورډ باید وجودولري!',
            'string' => 'پاسورډ باید په (String) فارمټ کي وي!',
            'confirmed' => 'پاسورډ او د پاسورډ تائیدي یو شانته ندي!',
        ],
        'password_confirmation' => [
            'required' => ' پاسورډ باید وجودولري!',
            'string' => 'پاسورډ باید په (String) فارمټ کي وي!',
            // 'confirmed' => 'پاسورډ او د پاسورډ تائیدي یو شانته ندي!',
        ],
        'old_password' => [
            'required' => ' پاسورډ باید وجودولري!',
            'string' => 'پاسورډ باید په (String) فارمټ کي وي!',
            // 'confirmed' => 'پاسورډ او د پاسورډ تائیدي یو شانته ندي!',
        ],
        'name' => [
            'required' => 'د پروګرام (  نوم ) باید وجودولري!',
            'max' => 'د پروګرام (  نوم ) باید تر [۱۰۰] حروفو ډېر نه وي!',

        ],
        'type' => [
            'required' => 'د پروګرام (  ډول ) باید وجودولري!',
            'max' => 'د پروګرام (  ډول ) باید تر [۷] حروفو زیات نه وي!',
        ],
        'sponsor' => [
            'required' => 'د پروګرام ( سپانسر ) باید وجودولري!',
            'max' => 'د پروګرام (   سپانسر ) باید تر [۵۰] حروفو زیات نه وي!',
        ],
        'manager' => [
            'required' => 'د پروګرام (  تنظیمونکی ) باید وجودولري!',
            'max' => 'د پروګرام (   تنظیمونکی ) باید تر [۵۰] حروفو زیات نه وي!',
        ],
        'supporter' => [
            'required' => 'د پروګرام (  حمایه کوونکی ) باید وجودولري!',
            'max' => 'د پروګرام (    حمایه کوونکی ) باید تر [۵۰] حروفو زیات نه وي!',
        ],
        'fund' => [
            'required' => 'د پروګرام (  بودیجه ) باید وجودولري!',
        ],
        'fund_type' => [
            'required' => 'د پروګرام (  د بودیجې پولي واحد ) باید وجودولري!',
            'max' => 'د پروګرام ( د بودیجې پولي واحد ) باید تر [۶] حروفو زیات نه وي!',
        ],
        'fee_able' => [
            'required' => 'د پروګرام (  د فیس شتون یا نه شتون ) باید وجودولري!',
        ],
        'fee' => [
            'required' => 'د پروګرام (فیس ) باید وجودولري!',
            'integer' => 'د پروګرام (فیس ) باید حقیقي عدد وي!',
        ],
        'fee_unit' => [
            'required' => 'د پروګرام (  د فیس پولي واحد ) باید وجودولري!',
            'max' => 'د پروګرام ( د فیس پولي واحد  ) باید تر [۶] حروفو زیات نه وي!',
        ],
        'participant_amount' => [
            'required' => 'د پروګرام (  د ګډونوالو تعداد ) باید وجودولري!',
        ],
        'info_mobile_number' => [
            'required' => 'د پروګرام (  د معلوماتو شمېره ) باید وجودولري!',
            'max' => 'د پروګرام (   د معلوماتو شمېره  ) باید تر [۱۳] عددو ډېر نه وي!',
        ],
        'program_description' => [
            'required' => 'د پروګرام (  معلومات ) باید وجودولري!',
            'max' => 'د پروګرام (  معلومات ) باید تر [۲۰۰۰] حروفو ډېر نه وي!',
        ],
        'year' => [
            'required' => 'د پروګرام (  کال ) باید وجودولري!',
            'max' => 'د پروګرام (  کال ) باید تر [۴] عددو ډېر نه وي!',

        ],
        'month' => [
            'required' => 'د پروګرام (  میاشت ) باید وجودولري!',
            'between' => 'د میاشت ورځي باید د [۱ - ۱۲] په انټروال کي وي!',
        ],
        'start_day' => [
            'required' => 'د پروګرام (  د شروع کېدو ورځ ) باید وجودولري!',
            'between' => 'د شروع کېدو ورځ باید د [۱ - ۳۱] په انټروال کي وي!',
        ],
        'end_day' => [
            'required' => 'د پروګرام ( د ختمېدو ورځ ) باید وجودولري!',
            'between' => 'د ختم کېدو ورځ باید د [۱ - ۳۱] په انټروال کي وي!',
        ],
        'start_time' => [
            'required' => 'د پروګرام (  د شروع کېدو وخت ) باید وجودولري!',
            'regex' => 'د شروع کېدو واخت باید پدې فارمټ کي وي: [hh:MM:PM|AM]!',
        ],
        'end_time' => [
            'required' => 'د پروګرام (  د ختم کېدو وخت ) باید وجودولري!',
        ],
        'days_duration' => [
            'required' => 'د پروګرام (  د ورځو شمېر ) باید وجودولري!',
        ],
        'campus_name' => [
            'required' => 'د پروګرام (  د ساحې نوم ) باید وجودولري!',
            'max' => 'د پروګرام (   د ساحې نوم ) باید تر [۵۰] حروفو ډېر نه وي!',
        ],
        'block_name' => [
            'required' => 'د پروګرام (  د ودانۍ نوم ) باید وجودولري!',
            'max' => 'د پروګرام (  د ودانۍ نوم ) باید تر [۵۰] حروفو ډېر نه وي!',
        ],
        'block_number' => [
            'required' => 'د پروګرام (  د ودانۍ شمېره ) باید وجودولري!',
        ],
        'room_number' => [
            'required' => 'د پروګرام (  د اطاق شمېره ) باید وجودولري!',
        ],
        'facility.*' => [
            'required' => 'د پروګرام (  سهولتونه ) باید وجودولري!',
            'max' => 'د پروګرام (  سهولتونه ) باید تر [۱۰۰] حروفو ډېر نه وي!',
        ],
        'agenda.*' => [
            'required' => 'د پروګرام (  اجنډاوي ) باید وجود ولري!',
            'max' => 'د پروګرام (  اجنډاوي ) باید تر [۱۰۰] حروفو ډېر نه وي!',
        ],
        'program_evaluation.*' => [
            'required' => 'د پروګرام ( ارزوني ) باید وجود ولري!',
            'max' => 'د پروګرام (  ارزوني ) باید تر [۱۰۰] حروفو ډېر نه وي!',
        ],
        'program_result.*' => [
            'required' => 'د پروګرام ( پایلي ) باید وجود ولري!',
            'max' => 'د پروګرام (  پایلي ) باید تر [۱۰۰] حروفو ډېر نه وي!',
        ],
        'photo.*' => [
            'required' => 'د پروګرام ( عکس ) باید وجود ولري!',

            'mimes' => 'د پروګررام اړونه عکسونه باید پدې فارمټونو کي وي: [jpeg, png, jpg, gif, svg]',
            'max' => 'د پروګرام (  غکس ) باید تر [۱۰] مېکابایټ څخه ډېر نه وي!',
        ],
        'materials' => [
            'required' => 'د پروګرام ( فایل ) باید وجود ولري!',

            'mimes' => 'د پروګررام اړونه فایل باید پدې فارمټونو کي وي: [pdf, docx, doc, docm, rtf, txt, pptx, pptm, ppt, xlsx, xlsm, xlsb, xltx]',
            'max' => 'د پروګرام (  فایل ) باید تر [۴۰] مېکابایټ څخه ډېر نه وي!',
        ],
        'materials.*' => [
            'required' => 'د پروګرام ( فایل ) باید وجود ولري!',

            'mimes' => 'د پروګررام اړونه فایل باید پدې فارمټونو کي وي: [pdf, docx, doc, docm, rtf, txt, pptx, pptm, ppt, xlsx, xlsm, xlsb, xltx]',
            'max' => 'د پروګرام (  فایل ) باید تر [۴۰] مېکابایټ څخه ډېر نه وي!',
        ],
        'feedback_question_category.*' => [
            'required' => 'د پروګرام د پوښتني ( کتهګورۍ ) باید وجود ولري!',
            'string' => 'د پروګرام د پوښتني ( کتهګورۍ ) باید د (string) په فارمټ کي وي!'
        ],
        'feedback_question.*' => [
            'required' => 'د پروګرام  (پوښتني) باید وجود ولري!',
            'max' => 'د پروګرام (  پوښتنه ) باید تر [۱۰۰] حروفو څخه زیات نه وي!',
        ],
        // 'photo.*' => [
        //     'required' => 'د پروګرام ( عکس ) باید وجود ولري!',

        //     'mimes' => 'د پروګررام اړونه عکسونه باید پدې فارمټونو کي وي: [jpeg, png, jpg, gif, svg]',
        //     'max' => 'د پروګرام (  پایلي ) باید تر [۱۰۰] حروفو ډېر نه وي!',
        // ],
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
