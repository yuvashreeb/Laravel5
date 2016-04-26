<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class TemplateController extends BaseController {

    public function index() {
        $template = new TemplateController;
        $template->Assign('username', 'yuva');
        $template->Assign('age', 20);
        $template->Assign('fav_food', 'biryani');
        $template->render('template');
        return view('layouts/external');
    }

    private $vars = array();

    public function assign($key, $value) {
        $this->vars[$key] = $value;
    }

    public function render($template_name) {
        $path = $template_name . '.blade.php';
        if (file::exists($path)) {
            $contents = file::get($path);
            foreach ($this->vars as $key => $value) {
                $contents = preg_replace('/\[' . $key . '\]/', $value, $contents);
            }
            $contents = preg_replace('/\<\!\-\- if(.*) \-\-\>/', '<?php if($1):?>', $contents);
            $contents = preg_replace('/\<\!\-\- else \-\-\>/', '<?php else:?>', $contents);
            $contents = preg_replace('/\<\!\-\- endif \-\-\>/', '<?php endif;?>', $contents);
            eval('?>' . $contents . '<?php');
        } else {
            exit('<h1>Template Error</h1>');
        }
    }

}
