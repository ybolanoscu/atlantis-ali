<?php
if (!function_exists('atlantis_get_option_defaults_values')):
    function atlantis_get_option_defaults_values()
    {
        global $atlantis_default_values;
        $atlantis_default_values = array(
            /* Top Slogan Icon*/
            'atlantis_top_slogan_icon' => esc_html__('fa fa-graduation-cap', 'atlantis'),
            'atlantis_top_slogan' => esc_html__('Your own slogan text', 'atlantis'),
            'atlantis_top_second_slogan_icon' => esc_html__('fa fa-phone', 'atlantis'),
            'atlantis_top_second_slogan' => esc_html__('+#-##-###-###', 'atlantis'),
            'atlantis_bottom_slogan' => esc_html__('&copy; {year} Atlantis University. All Rights Reserved #1442 Biscayne Boulevard - Miami, Florida 33132', 'atlantis'),
            'section_1_image' => '',
            'atlantis_bg_section_h1' => esc_html__('World Class Education, World Famous Destination', 'atlantis'),
            'atlantis_bg_section_h3' => esc_html__('Learn English at Atlantis Language Institute in Miami, Florida USA', 'atlantis'),
            'atlantis_section_4_slogan' => esc_html__('Type Your Slogan', 'atlantis'),
            'atlantis_section_5_map' => "!1m18!1m12!1m3!1d3592.4395730953247!2d-80.19181328501911!3d25.78906838362434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9b6a70f3b3f4d%3A0x13729fe0c9a43099!2s1442+Biscayne+Blvd%2C+Miami%2C+FL+33132%2C+USA!5e0!3m2!1sen!2sve!4v1509365118818",
        );
        return apply_filters('atlantis_get_option_defaults_values', $atlantis_default_values);
    }
endif;