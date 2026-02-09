<?php
/**
 * Team Members Elementor Widget
 * 
 * @package mew
 */

class MEW_Team_Members_Widget extends \ELEMENTOR\Widget_Base {
    public function get_name() {
        'mew_team_members';
    }

    public function get_title()
    {
        return esc_html__( 'MEW Team Members', 'mew' );
    }

    public function get_icon()
    {
        return 'eicon-person';
    }

    public function get_categories()
    {
        return [ 'general' ];
    }

    public function get_keywords()
    {
        return [ 'team', 'mew', 'members' ];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Team Member Content', 'mew' ),
                'tab'  => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'member_image',
            [
                'label'   => esc_html__( 'Member Image', 'mew' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
            ]
        );

        $repeater->add_control(
            'member_name',
            [
                'label'  => esc_html__( 'Member Name', 'mew' ),
                'tab'    => \Elementor\Controls_Manager::TEXT,
                'defult' => 'Mokaddes Ali',
            ]
        );
    }
}
