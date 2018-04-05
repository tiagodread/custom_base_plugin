<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 03/04/2018
 * Time: 22:31
 */

Class Base_Config_Page
{


    function __construct()
    {
        add_action('admin_menu', array($this, 'base_config_page'), 10);
        add_action('admin_enqueue_scripts', array($this, 'register_plugin_styles'), 10);
        add_action( 'init',  array($this,'add_images'), 10 );
    }

    public function base_config_page()
    {
        add_options_page('Base Config', 'Base Config', 'manage_options', 'base-config', array($this, 'my_plugin_options'));
    }

    public function my_plugin_options()
    {
        if (!current_user_can('manage_options')) {
            wp_die(__('Sem permissões para acessar esta página.'));
        }

       // delete_option( 'images-size' );

        $images = get_option( 'images-size', array() );

        if(!$images){
            add_option( 'images-size', array() );
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['procurar']) && $_POST['procurar'] != null) {
                $args = $_POST['procurar'];
            }
        }

        require_once(plugin_dir_path(__FILE__) . "../View/image-size.php");

        if (isset($_POST['submit'])) {

            $images[ $_POST['nomeImagem']] = array('nome' => $_POST['nomeImagem'],'largura' =>$_POST['larguraSize'], 'altura' => $_POST['alturaSize'] );
            update_option( 'images-size', $images );
        }


        print '<pre>'; 
        print_r( $this->add_images() ); 
        print '</pre>';



    }

    public function register_plugin_styles()
    {
        $screen = get_current_screen();
        //if ($screen->base == "base-config") {
        wp_enqueue_style('bootstrap-css', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");

        wp_enqueue_script('base-config-page', plugins_url('../static/js/base-config-page.js', __FILE__), 'jquery', null, false);
        // wp_register_style('pousada-plugin-css', plugins_url() . '/base-plugin/static/css/custom-base-config-page.css');
        //  wp_enqueue_style('pousada-plugin-css');
        // }
    }


    public function add_images()
    {

        $images_size = get_option( 'images-size');
        global $_wp_additional_image_sizes;


        if($_wp_additional_image_sizes == null){
            $images = array_merge(array(), $images_size);
        }elseif (is_array($_wp_additional_image_sizes)) {
            $images = array_merge($_wp_additional_image_sizes, $images_size);
        }

        return $images;
    }

    


}