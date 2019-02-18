<?php

namespace Vasar\Simplemde;

use Encore\Admin\Form\Field;

class Editor extends Field
{
    /**
     * @var string
     */
    protected $view = 'laravel-admin-simplemde::simplemde';

    /**
     * @var array
     */
    protected static $css = [
        'vendor/laravel-admin-ext/simplemde/dist/simplemde.min.css',
    ];

    /**
     * @var array
     */
    protected static $js = [
        'vendor/laravel-admin-ext/simplemde/dist/simplemde.min.js',
        'vendor/laravel-admin-ext/simplemde/dist/inline-attachment.min.js',
        'vendor/laravel-admin-ext/simplemde/dist/codemirror.inline-attachment.js',
    ];

    /**
     * @var int
     */
    protected $height = 300;

    /**
     * @param int $height
     * @return $this
     */
    public function height($height = 300)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        $this->addVariables([
            'height'     => $this->height,
            'scopeClass' => 'simplemde-'.uniqid()
        ]);

        $name = $this->formatName($this->column);

        $config = (array) Simplemde::config('config');

        $uplod_url = $config['upload'];
        $cs=csrf_token();

        $config = json_encode($config);

        $varName = 'simplemde_'.uniqid();

        $this->script = <<<EOT
        
var inlineAttachmentConfig = {
            uploadUrl: "$uplod_url",
            uploadFieldName: 'image',
            jsonFieldName: 'image',
            extraHeaders: {
                'X-CSRF-Token': '$cs'
            }
        };

var options = {element: $("#{$this->id}")[0]};

Object.assign(options, {$config});

var $varName = new SimpleMDE(options);

$varName.codemirror.on("change", function(){
	var html = $varName.value();
    $('input[name=$name]').val(html);
});

inlineAttachment.editors.codemirror4.attach($varName.codemirror, inlineAttachmentConfig);

EOT;
        return parent::render();
    }
}
