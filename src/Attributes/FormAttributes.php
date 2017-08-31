<?php namespace mirac\BasicForm\Attributes;

use mirac\BasicForm\Exceptions\AttributeValueException;

class FormAttributes
{
    /**
     * Not supported in HTML5.
     * Specifies a comma-separated list of file types
     * that the server accepts (that can be submitted
     * through the file upload)
     *
     * Example value: file_type
     *
     * @link https://www.w3schools.com/tags/att_form_accept.asp
     *
     * @var string
     */
    private $accept;

    /**
     * Specifies the character encodings that are to be used for the form submission
     *
     * Examlple value: character_set
     *
     * @link https://www.w3schools.com/tags/att_form_accept_charset.asp
     *
     * @var string
     */
    private $acceptCharset;

    /**
     * Specifies where to send the form-data when a form is submitted
     *
     * Example value: URL
     *
     * @link https://www.w3schools.com/tags/att_form_action.asp
     *
     * @var string
     */
    private $action;

    /**
     * @html5
     *
     * Specifies whether a form should have autocomplete on or off
     *
     * Example values: on, off
     *
     * @link https://www.w3schools.com/tags/att_form_autocomplete.asp
     *
     * @var string
     */
    private $autocomplete;

    /**
     * Specifies how the form-data should be encoded when submitting it to the server (only for method="post")
     *
     * Example values: application/x-www-form-urlencoded, multipart/form-data, text/plain
     *
     * @link https://www.w3schools.com/tags/att_form_enctype.asp
     *
     * @var string
     */
    private $enctype;

    /**
     * Specifies the HTTP method to use when sending form-data
     *
     * Example values: get, post
     *
     * @link https://www.w3schools.com/tags/att_form_method.asp
     *
     * @var string
     */
    private $method;

    /**
     * Specifies the name of a form
     *
     * Example value: text
     *
     * @link https://www.w3schools.com/tags/att_form_name.asp
     *
     * @var string
     */
    private $name;

    /**
     * Specifies that the form should not be validated when submitted
     *
     * Example value: novalidate
     *
     * @link https://www.w3schools.com/tags/att_form_novalidate.asp
     *
     * @var string
     */
    private $novalidate;

    /**
     * Specifies where to display the response that is received after submitting the form
     *
     * Example values: _blank, _self, _parent, _top
     *
     * @link https://www.w3schools.com/tags/att_form_target.asp
     *
     * @var string
     */
    private $target;

    /**
     * @param string $method
     * @param string|null $action
     *
     * @return FormAttributes
     */
    public static function factory($method, $action = null)
    {
        $self = new self();

        $self->setMethod($method);
        $self->setAction($action);

        return $self;
    }

    /**
     * The <form> accept attribute is not supported in HTML5.
     *
     * The accept attribute specifies the types of files that the server accepts (that can be submitted through a file upload).
     *
     * Tip: Look at the <input> accept attribute instead.
     *
     * Tip: Do NOT use this attribute as a validation tool. File uploads should be validated on the server.
     *
     * @param string|array $file_type One or more file types that can be submitted/uploaded. To specify more than one file type, separate the types with a comma
     *
     * @return $this
     */
    public function setAccept($file_type)
    {
        if (is_array($file_type)) {
            $this->accept = implode(',', $file_type);
        } else if (is_string($file_type)) {
            $this->accept = $file_type;
        } else {
            throw new AttributeValueException(__FUNCTION__ . ' only accept array or string value.');
        }
        return $this;
    }

    /**
     * The accept-charset attribute specifies the character encodings that are to be used for the form submission.
     *
     * The default value is the reserved string "UNKNOWN" (indicates that the encoding equals the encoding of the document containing the <form> element).
     *
     * A space-separated list of one or more character encodings that are to be used for the form submission.
     *
     * Common values:
     *
     * UTF-8 - Character encoding for Unicode
     * ISO-8859-1 - Character encoding for the Latin alphabet
     *
     * In theory, any character encoding can be used, but no browser understands all of them. The more widely a character encoding is used, the better the chance that a browser will understand it.
     *
     * To view all available character encodings, go to our Character sets reference https://www.w3schools.com/tags/ref_charactersets.asp.
     *
     * @param string $character_set
     *
     * @return $this
     */
    public function setAcceptCharset($character_set)
    {
        $this->acceptCharset = $character_set;

        return $this;
    }

    /**
     * The action attribute specifies where to send the form-data when a form is submitted.
     *
     * Where to send the form-data when the form is submitted.
     *
     * Possible values:
     *
     * An absolute URL - points to another web site (like action="http://www.example.com/example.htm")
     * A relative URL - points to a file within a web site (like action="example.htm")
     *
     * @param string $action
     *
     * @return $this
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * The autocomplete attribute specifies whether a form should have autocomplete on or off.
     *
     * When autocomplete is on, the browser automatically complete values based on values that the user has entered before.
     *
     * Tip: It is possible to have autocomplete "on" for the form, and "off" for specific input fields, or vice versa.
     *
     * on: 	Default. The browser will automatically complete values based on values that the user has entered before
     * off: The user must enter a value into each field for every use. The browser does not automatically complete entries
     *
     * @param string $autocomplete
     *
     * @return $this
     */
    public function setAutocomplete($autocomplete)
    {
        $autocomplete = strtoupper($autocomplete);

        if ( ! in_array($autocomplete, ['ON', 'OFF'])) {
            throw new AttributeValueException(__FUNCTION__ . ' only accept "ON" or "OFF" parameter.');
        }

        $this->autocomplete = $autocomplete;

        return $this;
    }

    /**
     * The enctype attribute specifies how the form-data should be encoded when submitting it to the server.
     *
     * Note: The enctype attribute can be used only if method="post".
     *
     * application/x-www-form-urlencoded: Default. All characters are encoded before sent (spaces are converted to "+" symbols, and special characters are converted to ASCII HEX values)
     * multipart/form-data: No characters are encoded. This value is required when you are using forms that have a file upload control
     * text/plain: Spaces are converted to "+" symbols, but no special characters are encoded
     *
     * @param string $enctype
     *
     * @return $this
     */
    public function setEnctype($enctype)
    {
        $this->enctype = $enctype;

        return $this;
    }

    /**
     * The method attribute specifies how to send form-data (the form-data is sent to the page specified in the action attribute).
     *
     * The form-data can be sent as URL variables (with method="get") or as HTTP post transaction (with method="post").
     *
     * Notes on GET:
     *
     * Appends form-data into the URL in name/value pairs
     * The length of a URL is limited (about 3000 characters)
     * Never use GET to send sensitive data! (will be visible in the URL)
     * Useful for form submissions where a user want to bookmark the result
     * GET is better for non-secure data, like query strings in Google
     *
     * Notes on POST:
     *
     * Appends form-data inside the body of the HTTP request (data is not shown is in URL)
     * Has no size limitations
     * Form submissions with POST cannot be bookmarked
     *
     * get: Default. Appends the form-data to the URL in name/value pairs: URL?name=value&name=value
     * post: Sends the form-data as an HTTP post transaction
     *
     * @param string $method
     *
     * @return $this
     */
    public function setMethod($method)
    {
        $method = strtoupper($method);

        if ( ! in_array($method, ['GET', 'POST'])) {
            throw new AttributeValueException(__FUNCTION__ . ' only accept "GET" or "POST" parameter.');
        }

        $this->method = $method;

        return $this;
    }

    /**
     * The name attribute specifies the name of a form.
     *
     * The name attribute is used to reference elements in a JavaScript, or to reference form data after a form is submitted.
     *
     * @param string $name Specifies the name of the form
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * The novalidate attribute is a boolean attribute.
     *
     * When present, it specifies that the form-data (input) should not be validated when submitted.
     *
     * @param bool $novalidate
     *
     * @return $this
     */
    public function setNovalidate($novalidate)
    {
        $this->novalidate = $novalidate;

        return $this;
    }

    /**
     * The target attribute specifies a name or a keyword that indicates where to display the response that is received after submitting the form.
     *
     * The target attribute defines a name of, or keyword for, a browsing context (e.g. tab, window, or inline frame).
     *
     * The target attribute is supported in HTML5.
     *
     * The target attribute was deprecated in HTML 4.01.
     *
     * Note: Frames and framesets are not supported in HTML5, so the _parent, _top and framename values are now mostly used with iframes.
     *
     * Example values: _blank|_self|_parent|_top|framename
     *
     * _blank: The response is displayed in a new window or tab
     * _self: The response is displayed in the same frame (this is default)
     * _parent: The response is displayed in the parent frame
     * _top: The response is displayed in the full body of the window
     * framename: The response is displayed in a named iframe
     *
     * @param string $target
     *
     * @return $this
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * open form tag
     *
     * @return string
     */
    public function tag()
    {
        $items[] = '<form';

        if ( ! empty($this->accept)) {
            $items[] = 'accept="' . $this->accept . '"';
        }

        if ( ! empty($this->acceptCharset)) {
            $items[] = 'accept-charset="' . $this->acceptCharset . '"';
        }

        if ( ! empty($this->action)) {
            $items[] = 'action="' . $this->action . '"';
        }

        if ( ! empty($this->autocomplete)) {
            $items[] = 'autocomplete="' . $this->autocomplete . '"';
        }

        if ( ! empty($this->enctype)) {
            $items[] = 'enctype="' . $this->enctype . '"';
        }

        if ( ! empty($this->method)) {
            $items[] = 'method="' . $this->method . '"';
        }

        if ( ! empty($this->name)) {
            $items[] = 'name="' . $this->name . '"';
        }

        if ($this->novalidate === true) {
            $items[] = 'novalidate="novalidate"';
        }

        if ( ! empty($this->target)) {
            $items[] = 'target="' . $this->target . '"';
        }

        return implode(' ', $items) . '>' . "\n";
    }

    public function __toString()
    {
        return $this->tag();
    }
}