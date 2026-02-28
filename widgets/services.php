<?php

/**
 * Service Widget
 * 
 * @package mea
 */

class MEA_Service_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'service_widget';
    }

    public function get_title()
    {
        return esc_html__('Services Section', 'mea');
    }

    public function get_icon()
    {
        return 'eicon-tools';
    }

    public function get_categories()
    {
        return ['general'];
    }

    public function get_keywords()
    {
        return ['service', 'elementor section'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'service_section',
            [
                'label' => esc_html__('Service Section', 'mea'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'service_list',
            [
                'label' => esc_html__('Services', 'mea'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'service_icon',
                        'label' => esc_html__('Icon', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fas fa-circle',
                            'library' => 'fa-solid',
                        ],
                        'recommended' => [
                            'fa-solid' => [
                                'circle',
                                'dot-circle',
                                'square-full',
                            ],
                            'fa-regular' => [
                                'circle',
                                'dot-circle',
                                'square-full',
                            ],
                        ],
                    ],
                    [
                        'name' => 'service_title',
                        'label' => esc_html__('Service Title', 'mea'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Service Title', 'mea'),
                    ],
                    [
                        'name' => 'service_desc',
                        'label' => esc_html__('Service Description', 'mea'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__('Service description goes here.', 'mea'),
                    ],
                ],
                'default' => [
                    [
                        'service_title' => esc_html__('Software Development', 'mea'),
                        'service_desc' => esc_html__('We provide high-quality software solutions.', 'mea'),
                    ],
                    [
                        'service_title' => esc_html__('Web Design', 'mea'),
                        'service_desc' => esc_html__('Creative and modern web designs.', 'mea'),
                    ],
                      [
                        'service_title' => esc_html__('Software Development', 'mea'),
                        'service_desc' => esc_html__('We provide high-quality software solutions.', 'mea'),
                    ],
                    [
                        'service_title' => esc_html__('Web Design', 'mea'),
                        'service_desc' => esc_html__('Creative and modern web designs.', 'mea'),
                    ],
                ],
                'title_field' => '{{{ service_title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        if (! empty($settings['service_list'])) {
?>
            <section class="service-section">
                <div class="container">
                    <div class="service-wrapper">
                        <!-- heading -->
                        <div class="service-heading">
                            <h1>Our Service <span></span></h1>
                        </div>
                        <!-- service cards -->
                        <div class="service-cards">
                            <?php foreach ($settings['service_list'] as $service) : ?>
                                <!-- single card -->
                                <div class="service-single-card">
                                    <i class="service-icon">
                                        <?php \Elementor\Icons_Manager::render_icon($service['service_icon'], ['aria-hidden' => 'true']); ?>
                                    </i>
                                    <h2><?php echo esc_html($service['service_title']); ?></h2>
                                    <p>
                                        <?php echo esc_html($service['service_desc']); ?>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
<?php
        }
    }
}
