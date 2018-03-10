<?php

add_action('customize_register', function($wp_customize){
//  Sections
    $wp_customize->add_section(
        'main_section',
        array(
            'title' => 'Main',
            'description' => 'Global site settings',
            'priority' => 160,
        )
    );

//  Settings
    $wp_customize->add_setting( 'main_logo', array() );
    $wp_customize->add_setting( 'main_slogan', array() );
    $wp_customize->add_setting( 'main_img', array() );
    $wp_customize->add_setting( 'main_company_name', array() );
    $wp_customize->add_setting( 'main_company_desc', array() );
    $wp_customize->add_setting( 'main_address', array() );
    $wp_customize->add_setting( 'main_email', array() );
    $wp_customize->add_setting( 'main_phone_1', array() );
    $wp_customize->add_setting( 'main_phone_2', array() );
    $wp_customize->add_setting( 'main_copyright', array() );

//  Controls
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 'mail_logo', array(
                'label' => 'Upload logo',
                'section' => 'main_section',
                'settings' => 'main_logo'
            )
        )
    );
    $wp_customize->add_control(
        'main_slogan', array(
            'label' => 'Slogan for logo',
            'section' => 'main_section',
            'type' => 'main_slogan',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 'main_img', array(
                'label' => 'Main background image',
                'section' => 'main_section',
                'settings' => 'main_img'
            )
        )
    );
    $wp_customize->add_control(
        'main_company_name', array(
            'label' => 'Company name',
            'section' => 'main_section',
            'type' => 'main_company_name',
        )
    );
    $wp_customize->add_control(
        'main_company_desc', array(
            'label' => 'Company description',
            'section' => 'main_section'
        )
    );
    $wp_customize->add_control(
        'main_address', array(
            'label' => 'Address',
            'section' => 'main_section'
        )
    );
    $wp_customize->add_control(
        'main_email', array(
            'label' => 'E-mail',
            'section' => 'main_section'
        )
    );
    $wp_customize->add_control(
        'main_phone_1', array(
            'label' => 'Phone 1',
            'section' => 'main_section'
        )
    );
    $wp_customize->add_control(
        'main_phone_2', array(
            'label' => 'Phone 2',
            'section' => 'main_section'
        )
    );
    $wp_customize->add_control(
        'main_copyright', array(
            'label' => 'Copyright',
            'section' => 'main_section'
        )
    );



    /*
     *
     * ===== Blocks ======
     *
     */

    $wp_customize->add_panel('blocks_panel',array(
        'title' => 'Blocks',
        'description' => 'setting up different blocks on the site',
        'priority'=> 161,
    ));


        // About Us
        $wp_customize->add_section('about_us',array(
            'title' => 'About Us',
            'priority' => 10,
            'panel' => 'blocks_panel',
        ));

        $wp_customize->add_setting( 'about_us_show', array(
            'default' => true
        ) );
        $wp_customize->add_setting( 'about_us_heading', array() );
        $wp_customize->add_setting( 'about_us_img', array() );
        $wp_customize->add_setting( 'about_us_description', array() );
        $wp_customize->add_setting( 'about_us_button', array() );
        $wp_customize->add_setting( 'about_us_button_link', array() );
        $wp_customize->add_setting( 'about_us_bg_color', array() );

        $wp_customize->add_control(
            'about_us_show',
            array(
                'type' => 'checkbox',
                'label' => 'Show "About Us" block?',
                'section' => 'about_us',
                'settings' => 'about_us_show'
            )
        );
        $wp_customize->add_control(
            'about_us_heading', array(
                'label' => 'Block header',
                'section' => 'about_us'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize, 'about_us_img', array(
                    'label' => 'Block image',
                    'section' => 'about_us',
                    'settings' => 'about_us_img'
                )
            )
        );
        $wp_customize->add_control(
            'about_us_description', array(
                'type' => 'textarea',
                'label' => 'Block description',
                'section' => 'about_us'
            )
        );
        $wp_customize->add_control(
            'about_us_button', array(
                'label' => 'Button text',
                'section' => 'about_us'
            )
        );
        $wp_customize->add_control(
            'about_us_button_link', array(
                'label' => 'Button link',
                'section' => 'about_us'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'about_us_bg_color',
                array(
                    'label' => 'Background color of the block',
                    'section' => 'about_us'
                )
            )
        );

        // Games
        $wp_customize->add_section('our_games',array(
            'title' => 'Our Games',
            'priority' => 10,
            'panel' => 'blocks_panel',
        ));

        $wp_customize->add_setting( 'our_games_show', array(
            'default' => true
        ) );
        $wp_customize->add_setting( 'our_games_icon', array() );
        $wp_customize->add_setting( 'our_games_heading', array() );
        $wp_customize->add_setting( 'our_games_count', array() );
        $wp_customize->add_setting( 'our_games_button', array() );
        $wp_customize->add_setting( 'our_games_link', array() );
        $wp_customize->add_setting( 'our_games_bg_color', array() );

        $wp_customize->add_control(
            'our_games_show',
            array(
                'type' => 'checkbox',
                'label' => 'Show "Our Games" block?',
                'section' => 'our_games',
                'settings' => 'our_games_show'
            )
        );
        $wp_customize->add_control(
            'our_games_heading', array(
                'label' => 'Block header',
                'section' => 'our_games'
            )
        );
        $wp_customize->add_control(
            'our_games_icon', array(
                'label' => 'Block image',
                'section' => 'our_games'
            )
        );
        $wp_customize->add_control(
            'our_games_count', array(
                'label' => 'How many games to show?',
                'section' => 'our_games'
            )
        );
        $wp_customize->add_control(
            'our_games_button', array(
                'label' => 'Button text',
                'section' => 'our_games'
            )
        );
        $wp_customize->add_control(
            'our_games_link', array(
                'label' => 'Button link',
                'section' => 'our_games'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'our_games_bg_color',
                array(
                    'label' => 'Background color of the block',
                    'section' => 'our_games'
                )
            )
        );

        // News
        $wp_customize->add_section('news',array(
            'title' => 'Latest News',
            'priority' => 10,
            'panel' => 'blocks_panel',
        ));

        $wp_customize->add_setting( 'news_show', array(
            'default' => true
        ) );
        $wp_customize->add_setting( 'news_heading', array() );
        $wp_customize->add_setting( 'news_category', array() );
        $wp_customize->add_setting( 'news_count', array() );
        $wp_customize->add_setting( 'news_bg_color', array() );

        $wp_customize->add_control(
            'news_show',
            array(
                'type' => 'checkbox',
                'label' => 'Show "Latest News" block?',
                'section' => 'news',
                'settings' => 'news_show'
            )
        );
        $wp_customize->add_control(
            'news_heading', array(
                'label' => 'Block header',
                'section' => 'news'
            )
        );

        $categories = get_categories(array(
            'orderby' => 'name',
            'order' => 'ASC'
        ));
        foreach( $categories as $category ){
            $arrCategories[$category->term_id] = $category->name;
        }
        $wp_customize->add_control( 'news_category', array(
            'settings' => 'news_category',
            'label'   => 'Select category:',
            'section' => 'news',
            'type'    => 'select',
            'choices'    => $arrCategories
        ));
        $wp_customize->add_control(
            'news_count', array(
                'label' => 'How many news to show?',
                'section' => 'news'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'news_bg_color',
                array(
                    'label' => 'Background color of the block',
                    'section' => 'news'
                )
            )
        );

        // Subscribe
        $wp_customize->add_section('subscribe',array(
            'title' => 'Subscribe',
            'priority' => 10,
            'panel' => 'blocks_panel',
        ));

        $wp_customize->add_setting( 'subscribe_show', array(
            'default' => true
        ) );
        $wp_customize->add_setting( 'subscribe_heading', array() );
        $wp_customize->add_setting( 'subscribe_description', array() );
        $wp_customize->add_setting( 'subscribe_bg_color', array() );

        $wp_customize->add_control(
            'subscribe_show',
            array(
                'type' => 'checkbox',
                'label' => 'Show "Subscribe to our Newsletter" block?',
                'section' => 'subscribe',
                'settings' => 'subscribe_show'
            )
        );
        $wp_customize->add_control(
            'subscribe_heading', array(
                'label' => 'Block header',
                'section' => 'subscribe'
            )
        );
        $wp_customize->add_control(
            'subscribe_description', array(
                'type' => 'textarea',
                'label' => 'Block description',
                'section' => 'subscribe'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'subscribe_bg_color',
                array(
                    'label' => 'Background color of the block',
                    'section' => 'subscribe'
                )
            )
        );

});