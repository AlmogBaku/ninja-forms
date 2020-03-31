<?php

/**
 * Register blocks and there scripts
 */
add_action('init', function() {
    /**
     * Form Block
     */
    // automatically load dependencies and version
    $block_asset_file = include dirname(__DIR__,1) . '/build/form-block.asset.php';
    $block = (array)json_decode(file_get_contents( __DIR__ . '/form/block.json'),true);

    wp_register_script(
        'ninja-forms/form',
        plugins_url('../build/form-block.js', __FILE__),
        $block_asset_file['dependencies'],
        $block_asset_file['version']
    );

    register_block_type('ninja-forms/form', array_merge($block,[
        'title' => __( 'Ninja Form', 'ninja-form'),
        'render_callback' => function($atts){
            return ninja_forms_return_echo( 'ninja_forms_display_form', $atts['formId'] );
        },
        'editor_script' => 'ninja-forms/form'
    ]));


    /**
     * Views Block
     */
    $token = NinjaForms\Blocks\Authentication\TokenFactory::make();
    $publicKey = NinjaForms\Blocks\Authentication\KeyFactory::make();
 
    // automatically load dependencies and version
    $block_asset_file = include dirname(__DIR__,1) . '/build/sub-table-block.asset.php';

    wp_register_script(
        'ninja-forms/submissions-table/block',
        plugins_url('../build/sub-table-block.js', __FILE__),
        $block_asset_file['dependencies'],
        $block_asset_file['version']
    );

    wp_localize_script('ninja-forms/submissions-table/block', 'ninjaFormsViews', [
        'token' => $token->create($publicKey),
    ]);

    $render_asset_file = include dirname(__DIR__,1) . '/build/sub-table-render.asset.php';
    wp_register_script(
        'ninja-forms/submissions-table/render',
        plugins_url( '../build/sub-table-render.js', __FILE__ ),
        $render_asset_file['dependencies'],
        $render_asset_file['version']
    );

    wp_localize_script('ninja-forms/submissions-table/render', 'ninjaFormsViews', [
        'token' => $token->create( $publicKey ),
    ]);
    
    register_block_type( 'ninja-forms/submissions-table', array(
        'editor_script' => 'ninja-forms/submissions-table/block',
        'render_callback' => function( $attributes, $content ) {
            if( isset( $attributes['formId'] ) && $attributes['formId']) {
                wp_enqueue_script('ninja-forms/submissions-table/render');
                $className = 'ninja-forms-views-submissions-table';
                if(isset($attributes['alignment'])) $className .= ' align'.$attributes['alignment'];
                return sprintf("<div class='%s' data-attributes='%s'></div>", esc_attr($className), esc_attr(wp_json_encode($attributes)));
            }
        }
    ) );
 
});

/**
 * Localize data for blocks
 */
add_action( 'admin_enqueue_scripts', function (){
    //Get all forms, to base form selector on.
    $formsBuilder = (new NinjaForms\Blocks\DataBuilder\FormsBuilderFactory)->make();
    $forms = $formsBuilder->get();
    if( ! empty($forms)){
        //Escape for use in JavaScript
        foreach($forms as $key => $form ){
            $forms[$key] = [
                'formId' => absint($form['formId']),
                'formTitle' => esc_textarea($form['formTitle'])
            ];
        }
    }
   wp_localize_script('ninja-forms/form','nfFormsBlock',[
       'forms'=> $forms//array keys escaped above
   ]);
});

/**
 * Register REST API routes related to blocks
 */
add_action( 'rest_api_init', function () {

    $tokenAuthenticationCallback = function( WP_REST_Request $request ) {
        $token = NinjaForms\Blocks\Authentication\TokenFactory::make();
        return $token->validate( $request->get_header('X-NinjaFormsViews-Auth') );
    };

    register_rest_route( 'ninja-forms-views/', 'forms', array(
        'methods' => 'GET',
        'callback' => function( WP_REST_Request $request ) {
            $formsBuilder = (new NinjaForms\Blocks\DataBuilder\FormsBuilderFactory)->make();
            return $formsBuilder->get();
        },
        'permission_callback' => '__return_true',
    ));

    register_rest_route( 'ninja-forms-views/', 'forms/(?P<id>\d+)/fields', [
        'methods' => 'GET',
        'args' => [
            'id' => [
                'required'    => true,
                'description' => __( 'Unique identifier for the object.' ),
                'type'        => 'integer',
                'validate_callback' => 'rest_validate_request_arg',
            ],
        ],
        'callback' => function( WP_REST_Request $request ) {
            $fieldsBuilder = (new NinjaForms\Blocks\DataBuilder\FieldsBuilderFactory)->make( 
                $request->get_param( 'id' )
             );
            return $fieldsBuilder->get();
        },
        'permission_callback' => $tokenAuthenticationCallback,
    ]);

    register_rest_route( 'ninja-forms-views/', 'forms/(?P<id>\d+)/submissions', [
        'methods' => 'GET',
        'args' => [
            'id' => [
                'required'    => true,
                'description' => __( 'Unique identifier for the object.' ),
                'type'        => 'integer',
                'validate_callback' => 'rest_validate_request_arg',
            ],
            'perPage' => [
                'description'       => __( 'Maximum number of items to be returned in result set.' ),
                'type'              => 'integer',
				'minimum'           => 1,
				'maximum'           => 100,
				'sanitize_callback' => 'absint',
				'validate_callback' => 'rest_validate_request_arg',
            ],
            'page' => [
				'description'       => __( 'Current page of the collection.' ),
				'type'              => 'integer',
				'default'           => 1,
				'sanitize_callback' => 'absint',
				'validate_callback' => 'rest_validate_request_arg',
				'minimum'           => 1,
            ]
        ],
        'callback' => function( WP_REST_Request $request ) {
            $submissionsBuilder = (new NinjaForms\Blocks\DataBuilder\SubmissionsBuilderFactory)->make( 
                $request->get_param( 'id' ),
                $request->get_param( 'perPage' ),
                $request->get_param( 'page' )
            );
            return $submissionsBuilder->get();
        },
        'permission_callback' => $tokenAuthenticationCallback,
    ]);

} );
