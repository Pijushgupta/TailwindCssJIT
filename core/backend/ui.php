<?php 
namespace tailwindJIT\backend;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Ui{
    public static function activate(){
        if(!function_exists('wp_get_current_user')) { include(ABSPATH . "wp-includes/pluggable.php"); }
        if (current_user_can('manage_options')) {
			add_action('admin_menu', array('tailwindJIT\backend\Ui', 'create'));
            add_action('admin_enqueue_scripts', array('tailwindJIT\backend\Ui', 'addAssets'));
		}

    }

    public static function create(){
        add_menu_page(
			__('TailwindJIT'),
			__('Tailwind JIT'),
			'manage_options',
			'tailwindjit',
			array('tailwindJIT\backend\Ui', 'render'),
			'data:image/svg+xml;base64,' . base64_encode('<svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 512 512"  xml:space="preserve"> <style type="text/css"> <![CDATA[ .st0{fill:#000000;} ]]> </style> <g> <path class="st0" d="M489.089,223.04c0,0,3.172-4.438,5.938-9.563c22.969-42.734,22.625-94.672-1.016-137.125 c-3.797-6.797-9.734-14.484-9.734-14.484c-0.844-1.25-2.203-2.063-3.688-2.203c-1.5-0.156-3,0.391-4.063,1.453l-6.969,6.969 l-68.531,68.531c-1.969,1.969-1.969,5.172,0,7.125l73.984,74l6.219,6.219c1.094,1.094,2.625,1.625,4.156,1.438 C486.917,225.228,488.276,224.353,489.089,223.04z"/> <path class="st0" d="M454.698,248.415l-6.438-6.438l-16.063-16.063c-1.984-1.984-5.172-1.984-7.141-0.016l-32.906,32.906 c-2.969,2.969-7.766,2.969-10.719,0l-55.391-55.391c-2.953-2.953-2.953-7.75,0-10.703l32.906-32.906 c1.984-1.969,1.984-5.156,0-7.141l-9.641-9.641c-2.953-2.969-2.953-7.75,0-10.703l93.5-93.5l5.328-5.344 c1.078-1.078,1.609-2.563,1.453-4.063c-0.141-1.5-0.969-2.859-2.219-3.703c0,0-3.906-3-8.625-5.75 C383.995-12.101,312.526-4.647,265.589,42.29c-40.672,40.656-51.688,99.719-33.094,150.359L7.276,417.837 c-9.703,9.703-9.703,25.438,0,35.141l51.297,51.297c9.719,9.703,25.438,9.703,35.141,0l225.969-225.953 c41.969,14.547,89.391,8.969,127.203-16.766c4.078-2.781,7.313-5.547,7.313-5.547c1.141-0.891,1.875-2.234,1.969-3.672 C456.261,250.868,455.729,249.446,454.698,248.415z M57.448,454.103c-11.813-11.813-11.813-30.984,0-42.797s30.984-11.813,42.797,0 c11.828,11.813,11.828,30.984,0,42.797C88.433,465.931,69.261,465.931,57.448,454.103z"/> <path class="st0" d="M349.745,207.618c5.734,5.703,15,5.703,20.703,0l20.188-20.172c5.703-5.719,5.703-14.984,0-20.703 c-5.734-5.719-15-5.719-20.703,0l-20.188,20.172C344.026,192.634,344.026,201.899,349.745,207.618z"/> <path class="st0" d="M397.776,234.946l20.172-20.188c5.719-5.719,5.719-14.984,0-20.703s-14.984-5.719-20.703,0l-20.172,20.172 c-5.719,5.719-5.719,15,0,20.719C382.792,240.649,392.073,240.649,397.776,234.946z"/> </g> </svg>')
		);
    }

    public static function render(){
        $url = admin_url('admin-ajax.php');
		$toolkit_nonce = wp_create_nonce('toolkit_nonce');
		$dashboardLang = explode('_', get_locale())[0];
        printf('<script>
        var toolkit_ajax_path = "%1$s";
        var toolkit_nonce = "%2$s"; 
        var adminLocale = "%3$s";
        </script><div id="tailwindjit"></div>',$url, $toolkit_nonce, $dashboardLang);
    }

    public static function addAssets($hook){
        if ($hook != 'toplevel_page_' . 'tailwindjit') return;
        wp_enqueue_script('tailwind-vue-script', plugins_url('', __FILE__) . '/dist/app.js', array(), '1.0.0', true);
        wp_enqueue_style('tailwind-style', plugins_url('', __FILE__) . '/dist/app.css', array(), '1.0.0');
    }
}