<?php
// SEE THE README FOR DOCUMENTATION
// Initialize the class objects, and add functionality

Class Member_Controller {

    public static $objPostType;
    public static $strPostType = 'member';
    public static $strPostTypePlural = 'members';
    public static $arrPostTypeBaseLabels = array(
        'member', // lowercase
        'Member', // singular
        'Members' // plural
    );

    public function __construct() {
        //static::createPostType();
        //static::createMetaBoxes();
    }

    /**
     * Registers the post type
     *
     */
    public static function createPostType() {
        // Arguments for the post type
        $arrPostTypeArgs = array(
            'public' => true,
            'has_archive' => true,
            'menu_position' => 34,
            'menu_icon' => 'dashicons-universal-access-alt',
            'supports' => array(
                'thumbnail',
                'title'
            ),
        );

        // Get the base labels
        $arrBaseLabels = static::$arrPostTypeBaseLabels;

        // Create the wordpress labels
        $arrPostLabels = array(
            'name'                  => sprintf( _x( '%s', 'taxonomy general name', 'cuztom' ), $arrBaseLabels[2] ),
            'singular_name'         => sprintf( _x( '%s', 'taxonomy singular name', 'cuztom' ), $arrBaseLabels[1] ),
            'search_items'          => sprintf( __( 'Search %s', 'cuztom' ), $arrBaseLabels[2] ),
            'all_items'             => sprintf( __( 'All %s', 'cuztom' ), $arrBaseLabels[2] ),
            'parent_item'           => sprintf( __( 'Parent %s', 'cuztom' ), $arrBaseLabels[1] ),
            'parent_item_colon'     => sprintf( __( 'Parent %s:', 'cuztom' ), $arrBaseLabels[1] ),
            'edit_item'             => sprintf( __( 'Edit %s', 'cuztom' ), $arrBaseLabels[1] ),
            'update_item'           => sprintf( __( 'Update %s', 'cuztom' ), $arrBaseLabels[1] ),
            'add_new_item'          => sprintf( __( 'Add New %s', 'cuztom' ), $arrBaseLabels[1] ),
            'new_item_name'         => sprintf( __( 'New %s Name', 'cuztom' ), $arrBaseLabels[1] ),
            'menu_name'             => sprintf( __( '%s', 'cuztom' ), $arrBaseLabels[2] )
        );

        // Post type object is created here
        static::$objPostType = new Cuztom_Post_Type(static::$strPostType, $arrPostTypeArgs, $arrPostLabels);
    }

    /**
     * Setup the Metaboxes
     *
     */
    public static function createMetaBoxes() {
        
        $arrMetaAccount = array(
            array(
                'name' => 'email',
                'label' => 'Email',
                'description' => 'Username',
                'type' => 'text',
            ),
            array(
                'name' => 'password',
                'label' => 'Password',
                'description' => 'User Password',
                'type' => 'text',
            ),
        );
        // Information fields
        $arrMetaInformation = array(
            array(
                'name' => 'first_name',
                'label' => 'First Name',
                'description' => '',
                'type' => 'text',
            ),
            array(
                'name' => 'last_name',
                'label' => 'Last Name',
                'description' => '',
                'type' => 'text',
            ),
            array(
                'name' => 'phone',
                'label' => 'Phone Number',
                'description' => '',
                'type' => 'text',
            ),
            array(
                'name' => 'website',
                'label' => 'Website',
                'description' => '',
                'type' => 'text',
            ),
            array(
                'name' => 'type',
                'label' => 'Type',
                'description' => 'Certfied or Candidate',
                'type' => 'select',
                'options' => array(
                    '' => 'Select Type',
                    'Certified' => 'Certified',
                    'Candidate' => 'Candidate'
                ),
            ),
            array(
                'name' => 'description',
                'label' => 'Description',
                'description' => '',
                'type' => 'wysiwyg',
            ),
        );

        // Create general info metabox
        static::$objPostType->add_meta_box(
            'meta_account',
            'Member Account',
            $arrMetaAccount,
            'normal',
            'default'
        );
        // Create general info metabox
        static::$objPostType->add_meta_box(
            'meta_information',
            'Member Details',
            $arrMetaInformation,
            'normal',
            'default'
        );

    }
}

$objMemberController = new Member_Controller();
