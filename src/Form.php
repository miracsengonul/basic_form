<?php

namespace mirac\BasicForm;

use mirac\BasicForm\Attributes\FormAttributes;

/**
 * Class Form
 *
 * @author Miraç Şengönül
 * @mail miracsengonul@gmail.com
 */

Class Form
{
    /**
     * Form Open Tag
     *
     * Form::open('Method', 'Route')
     *
     * @param string $action
     * @param string|null $method
     *
     * @return FormAttributes
     */
    static public function open($method, $action = null)
    {
        return FormAttributes::factory($method, $action);
    }


    /**
     * Form Input Generate
     * /Form::input(Array)
     *
     * @param array|NULL $custom_fields
     *
     * @return string
     */
    static public function input(array $custom_fields = NULL)
    {
        if ($custom_fields != NULL) {
            foreach ($custom_fields as $key => $value) {
                $input_array[] = $key . '="' . $value . '"';
            }
            $input_array = implode(' ', $input_array);
        } else {
            $input_array = NULL;
        }
        return '<input ' . $input_array . '>';
    }


    /**
     * Form Input Date
     * Form::date(Name,Array)
     *
     * @param $name
     * @param array|NULL $custom_fields
     *
     * @return string
     */
    static public function date($name, array $custom_fields = NULL)
    {
        if ($custom_fields != NULL) {
            foreach ($custom_fields as $key => $value) {
                $input_date_array[] = $key . '="' . $value . '"';
            }
            $input_date_array = implode(' ', $input_date_array);
        } else {
            $input_date_array = NULL;
        }
        return '<input type="date" name="' . $name . '" ' . $input_date_array . '>';
    }


    /**
     * Form Input Mail
     * Form::mail(Name,Array)
     *
     * @param $name
     * @param array|NULL $custom_fields
     *
     * @return string
     */
    static public function mail($name, array $custom_fields = NULL)
    {
        if ($custom_fields != NULL) {
            foreach ($custom_fields as $key => $value) {
                $input_mail_array[] = $key . '="' . $value . '"';
            }
            $input_mail_array = implode(' ', $input_mail_array);
        } else {
            $input_mail_array = NULL;
        }
        return '<input type="mail" name="' . $name . '" ' . $input_mail_array . '>';
    }


    /**
     * Form Input Password
     * Form::pass(Name,Array)
     *
     * @param $name
     * @param array|NULL $custom_fields
     *
     * @return string
     */
    static public function pass($name, array $custom_fields = NULL)
    {
        if ($custom_fields != NULL) {
            foreach ($custom_fields as $key => $value) {
                $input_pass_array[] = $key . '="' . $value . '"';
            }
            $input_pass_array = implode(' ', $input_pass_array);
        } else {
            $input_pass_array = NULL;
        }
        return '<input type="password" name="' . $name . '" ' . $input_pass_array . '>';
    }


    /**
     * Form Input Text
     * Form::text(Name,Array)
     *
     * @param $name
     * @param array|NULL $custom_fields
     *
     * @return string
     */
    static public function text($name, array $custom_fields = NULL)
    {
        if ($custom_fields != NULL) {
            foreach ($custom_fields as $key => $value) {
                $input_text_array[] = $key . '="' . $value . '"';
            }
            $input_text_array = implode(' ', $input_text_array);
        } else {
            $input_text_array = NULL;
        }
        return '<input type="text" name="' . $name . '" ' . $input_text_array . '>';
    }


    /**
     * Forum Submit Input
     * Form::submit(Name,Value,Array)
     *
     * @param $name
     * @param $value
     * @param array|NULL $custom_fields
     *
     * @return string
     */
    static public function submit($name, $value, array $custom_fields = NULL)
    {
        if ($custom_fields != NULL) {
            foreach ($custom_fields as $key => $value) {
                $input_submit_array[] = $key . '="' . $value . '"';
            }
            $input_submit_array = implode(' ', $input_submit_array);
        } else {
            $input_submit_array = NULL;
        }
        return '<input type="submit" value="' . $value . '" name="' . $name . '" ' . $input_submit_array . '>';
    }


    /**
     * Textarea Generate
     * Form::textarea(Name,Array)
     *
     * @param $name
     * @param array|NULL $custom_fields
     *
     * @return string
     */
    static public function textarea($name, array $custom_fields = NULL)
    {
        if ($custom_fields != NULL) {
            foreach ($custom_fields as $key => $value) {
                $textarea_array[] = $key . '="' . $value . '"';
            }
            $textarea_array = implode(' ', $textarea_array);
        } else {
            $textarea_array = NULL;
        }
        return '<textarea name="' . $name . '" ' . $textarea_array . '></textarea>';
    }


    /**
     * Select Input
     *
     * @param $name
     * @param array $options
     * @param array|NULL $custom_fields
     *
     * @return string
     */
    static public function select($name, array $options, array $custom_fields = NULL)
    {
        if ($custom_fields != NULL) {
            foreach ($custom_fields as $key => $value) {
                $select_array[] = $key . '="' . $value . '"';
            }
            $select_array = implode(' ', $select_array);
        } else {
            $select_array = NULL;
        }

        $select = '<select name="' . $name . '" ' . $select_array . '>';
        foreach ($options as $key => $option) {
            $select .= '<option value="' . $key . '">' . $option . '</option>';
        }
        $select .= '</select>';
        return $select;
    }

    /**
     * Label Generate
     *
     * @param $name
     * @param $for
     * @param array|NULL $custom_fields
     *
     * @return string
     */
    static public function label($name, $for, array $custom_fields = NULL)
    {
        if ($custom_fields != NULL) {
            foreach ($custom_fields as $key => $value) {
                $label_array[] = $key . '="' . $value . '"';
            }
            $label_array = implode(' ', $label_array);
        } else {
            $label_array = NULL;
        }
        return '<label for="' . $for . '" ' . $label_array . '>' . $name . '</label>';
    }

    /**
     * Form Close Tag
     * Form::close()
     * @return string
     */
    static public function close()
    {
        return '</form>';
    }

}
